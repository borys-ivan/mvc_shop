<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 04.07.2018
 * Time: 23:06
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryList;
use App\Models\Pagination;
use App\Models\Product;

class adminController extends Controller
{

    public function view()
    {

        $actual_link = "$_SERVER[REQUEST_URI]";
        $pattern = '/[0-9]/';
        if (preg_match($pattern, $actual_link, $matches)) {
            $page = $matches[0];
        } else {
            $page = 1;
        }

        //print_r( $page);
        $ListOrders = new Admin();

        $ListOrders->getOrderList($page);
        $total = $ListOrders->getListOrdersCount();
        $pagination_list_orders = new Pagination($total['count'], $page, 10, 'page-');


        $this->data['list_order'] = $ListOrders->getResult();

        $this->data['pag'] = $pagination_list_orders->get();

        $this->loadTemplate('viewOrders', $this->getData());


    }

    public function users()
    {

        $actual_link = "$_SERVER[REQUEST_URI]";
        $pattern = '/[0-9]/';
        if (preg_match($pattern, $actual_link, $matches)) {
            $page = $matches[0];
        } else {
            $page = 1;
        }

        $ListUsers = new Admin();

        $ListUsers->getUsersList($page);
        $total = $ListUsers->getListUsersCount();
        $pagination_list_users = new Pagination($total, $page, 10, 'page-');

        $this->data['list_users'] = $ListUsers->getResult();
        $this->data['pag'] = $pagination_list_users->get();

        $this->loadTemplate('viewUsers', $this->getData());
    }

    public function products()
    {

        $actual_link = "$_SERVER[REQUEST_URI]";
        $pattern = '/[0-9]/';
        if (preg_match($pattern, $actual_link, $matches)) {
            $page = $matches[0];
        } else {
            $page = 1;
        }

        $ListProduct = new Admin();
        $ListProduct->getListProduct($page);
        $total = $ListProduct->getListProductsCount();

        $paginationList = new Pagination($total, $page, 10, 'page-');


        $this->data['list_products'] = $ListProduct->getResult();

        $this->data['pag'] = $paginationList->get();

        $this->loadTemplate('viewProducts', $this->getData());

    }

    public function updateProduct($id)
    {
        $productID = new Product();
        $productID->getProductId($id);

        $edit = new Admin();

        if (isset($_POST['submit'])) {
            $id_product = $_POST['id_product'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $specifications = $_POST['specifications'];
            $price = $_POST['price'];
            $new = $_POST['new'];
            $status = $_POST['status'];
            $count = $_POST['count'];
            $errors = false;


            $edit->edit(array_shift($id), $id_product, $name, $description, $specifications, $price, $new,
                $status, $count);
            header("Location: /admin/products");

        }

        $this->data['productID'] = $productID->getResult();

        $this->loadTemplate('updateProductForm', $this->getData());

    }

    public function AddProduct()
    {
        $categories=new CategoryList();
        $product=new Product();
        $addImage=new Admin();


        $categories->getCategoriesList();




        if (isset($_POST['submit'])) {
            $category = $_POST['category'];
            $id_product = $_POST['id_product'];
            $name = $_POST['name'];
            //$image = $_FILES['image']['name'];
            $description = $_POST['description'];
            $specifications = $_POST['specifications'];
            $price = $_POST['price'];
            $name_image = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name'];
            $new = $_POST['new'];
            $status = $_POST['status'];
            $count = $_POST['count'];
            $errors = false;
            // Валидация полей
            if (!$product->checkNameProduct($name)) {
                $errors[] = 'Введіть найменування товару';
            }
            if (!$product->checkCategory($category)) {
                $errors[] = 'Виберіть категорію';
            }
            if (!$product->checkArticle($id_product)) {
                $errors[] = 'Введіть артикил товару';
            }
            if ($errors == false) {

                $addImage->image($name_image, $temp_name);
                $product->addProduct($category, $id_product, $name, $name_image, $description,
                    $specifications, $price, $new, $status, $count);
                header("Location: /admin/products");
            }
        }


        $this->data['category']=$categories->getResult();

        $this->loadTemplate('addProductForm', $this->getData());

        return true;
    }

    public function deleteProduct($id)
    {
        $delete=new Admin();
        $delete->deleteProduct($id);
        header("Location: /admin/products_list");
        return true;
    }

    public function deleteOrder($id)
    {

        $delete = new Admin();

        $delete->deleteOrder($id);
        header("Location: /admin/view");
        return true;
    }

    public function updateOrder($id)
    {
        //print_r($id);
        $ListUpdateOrders = new Admin();
        $order = new Admin();
        $order->getOrder($id);
        $ListUpdateOrders->listProduct();
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $amount = $_POST['count'];
            $amount_price = $_POST['sum'];
            $ListUpdateOrders->updateOrder(array_shift($id), $name, $date, $amount, $amount_price);
            header("Location: /admin/view");
        }

        $this->data['order'] = $order->getResult();
        $this->data['list_product'] = $ListUpdateOrders->getResult();


        $this->loadTemplate('updateOrderForm', $this->getData());

    }


}