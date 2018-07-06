<?php

namespace App\Controllers;

use  App\Core\Controller;
use App\Models\Category;
use App\Models\CategoryList;
use App\Models\Pagination;

class homeController extends Controller
{


    public function index()
    {
        $user = new Category();
        $user->selectAll();

        $this->data['home'] = $user->getResult();
        $this->loadTemplate('home', $this->getData());
    }


    public function category($id)
    {


        $actual_link = "$_SERVER[REQUEST_URI]";
        $pattern = '/[0-9]/';
        if (preg_match($pattern, $actual_link, $matches)) {
            $page = $matches[0];
        } else {
            $page = 1;
        }


        $list = new CategoryList();


        if (!empty($id)) {

            $list->listCat($id, $page);

            if ($list->listCat($id, $page)) {
                $this->data['list_category'] = $list->getResult();
            }

            if ($list->recommendProduct($id)) {
                $this->data['recommend_product'] = $list->getResult();
            }


            $total = $list->getProductCount(array_shift($id));
            //$list-> SHOW_BY_DEFAULT;
            $pagination = new Pagination($total['count'], $page, 5, 'page-');
            $this->data['pag'] = $pagination->get();
            $this->loadTemplate('listCategory', $this->getData());

        }



    }



}