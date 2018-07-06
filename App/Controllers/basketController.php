<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 02.07.2018
 * Time: 0:21
 */

namespace App\Controllers;


use App\Core\Controller;
use App\Models\Basket;
use App\Models\Cabinet;
use App\Models\UserBasket;

class basketController extends Controller
{



    public function view()
    {
        $listOrder=new UserBasket();

        if ($_SESSION['basket']) {
            $listOrder->getListOrder();

        }
        $this->data=$listOrder->getResult();

        $this->loadTemplate('basketUser', $this->getData());


    }
    public function confirmOrder()
    {
//echo '1';
        if (isset($_SESSION['user_ID'])) {
            $confirm=new UserBasket();
            $confirm->addOrder();
            $confirm->clean_basket();

            require_once($_SERVER['DOCUMENT_ROOT']  . '/App/Views/layouts/form/basket_confirm_form.php');
        } else {

            require_once($_SERVER['DOCUMENT_ROOT'] . '/App/Views/registerLogin.php');
        }
        return true;
    }
    public function remove($id)
    {

        $basket=new UserBasket();
        $basket->remove_from_order_basket($id);
        $basket->getListOrder();

    }
    public function updateCount()
    {
        $basket=new UserBasket();
        $id = $_POST['ID'];
        $count = $_POST['count'];

        $basket->remove_item($id, $count);
        $basket->checking_product($id, $count);

    }
    public function LoginBeforeOrder()
    {
        if (isset($_POST['user_name']) && isset($_POST['pass'])) {
            $user = $_POST['user_name'];
            $pass = $_POST['pass'];
            header("Location: /cabinet/view");
            $result=new Cabinet();
            $result->getUserID($user, $pass);
        }
        return true;
    }


}