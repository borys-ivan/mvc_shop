<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 30.06.2018
 * Time: 12:36
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\Basket;
use App\Models\Product;

class productController extends Controller
{

    public function view($id)
    {


        $product = new Product();


        if (isset($id)) {

            $product->getProductId($id);

        }

        $this->data['product'] = $product->getResult();
        $this->loadTemplate('product', $this->getData());


    }

    public function Basket($id)
    {
        $basket=new Basket();



        $basket->add_to_basket(array_shift($id));

        $basket->total_items();
        $basket->total_price();
        return true;
    }
    public function remove($id)
    {
        $remove=new Basket();
        $remove->subtract_total_items(array_shift($id));
        $remove->subtract_total_price(array_shift($id));
        return true;
    }

}