<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 02.07.2018
 * Time: 0:28
 */

namespace App\Models;


use App\Core\Model;

class Basket extends Model
{

    private $Result = null;

    public function getResult()
    {
        return $this->Result;
    }


    public static function basket()
    {

        if (!isset($_SESSION['basket'])) {
            $_SESSION['basket'] = array();
            $_SESSION['total_items'] = 0;
            $_SESSION['total_price'] = 0.00;
            return true;
        }
        if (($_SESSION['basket']) == false) {

            return true;
        } else {

            return true;
        }

    }


    public static function add_to_basket($id)
    {
        if (isset($_SESSION['basket'][$id])) {
            $_SESSION['basket'][$id]++;

            return true;
        } else {
            $_SESSION['basket'][$id] = 1;

            return true;
        }

    }

    public static function total_items()
    {
        $num_items = 0;
        foreach ($_SESSION['basket'] as $id => $qty) {
            $num_items += $qty;
        }
        $_SESSION['total_items'] = $num_items;

        echo "<br><br>Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>";
        return $num_items;
    }

    public function total_price()
    {
        $price13 = 1;
        $price = 0.00;
        if (is_array($_SESSION['basket'])) {
            foreach ($_SESSION['basket'] as $id => $qty) {
                $prod = $this->db->prepare("SELECT price FROM product WHERE ID=" . $this->db->quote($id));
                if (isset($prod)) {
                    $prod->execute();
                    $this->Result=$prod->fetch(\PDO::FETCH_ASSOC);

                    $prod_p = $this->Result['price'];
                    //////////////////////////////////////////////////////
                    $p_price = ("<br> Ціна:" . $prod_p);
                    $price += $prod_p * $qty;

                }
            }
        }
        $_SESSION['total_price'] = $price;
        //  echo $t_price = ("Cумма:" . $_SESSION['total_price'] . ".грн");
        echo("Сумма:" . $_SESSION['total_price'] . ".грн");
        //  echo $t_price;
        // echo $sign_in_basket = "<br><a href='user_busket.html'>Увійти в корзину</a><br>";
        echo "<br><a href='/basket/view'>Увійти в корзину</a><br>";
        return $price;
    }



    public function subtract_total_items($id)
    {
        $subtract_items = 0;
        $_SESSION['basket'][$id]--;
        foreach ($_SESSION['basket'] as $id => $qty) {
            $subtract_items += $qty;
            if ($_SESSION['basket'][$id] == 0) {
                unset($_SESSION['basket'][$id]);
            }
        }
        $_SESSION['total_items'] = $subtract_items;

        echo "<br><br>Загальна кількість:" . ($_SESSION['total_items']) . ".шт<br>";
        return $subtract_items;
    }

    public function subtract_total_price($id)
    {
        $price = 0.00;
        if (is_array($_SESSION['basket'])) {
            foreach ($_SESSION['basket'] as $id => $qty) {
                $prod = $this->db->prepare("SELECT price FROM product WHERE ID=" . $this->db->quote($id));
                if (isset($prod)) {
                    $prod->execute();
                    $this->Result=$prod->fetch(\PDO::FETCH_ASSOC);
                    $prod_p = $this->Result['price'];
                    $p_price = ("<br> Ціна:" . $prod_p);
                    $price += $prod_p * $qty;
                }
            }
        }
        $_SESSION['total_price'] = $price;
        echo("Сумма:" . $_SESSION['total_price'] . ".грн");
        echo "<br><a href='/basket/view'>Увійти в корзину</a><br>";
        return $price;
    }

    function remove_from_basket($id)
    {
        if (isset($_SESSION['basket'])) {
            unset($_SESSION['basket'][$id]);
            unset($_SESSION['total_items'][$id]);
            echo $false_basket = ("<br>корзина пуста<br>");
            print_r($_SESSION['busket'] . "<br>");
            echo $t_itm = "Загальна кількість:0.шт<br>";
            echo $t_p = "Загальна ціна:0.грн<br>";
            echo $sign_in_basket = "<a href='user_busket.html'>Увійти в корзину</a><br>";
            if (($_SESSION['basket']) == true) {
                echo $true_basket = ("В корзині щось є");
                print_r($_SESSION['basket'] . "<br>");
                echo $t_itm = "Загальна кількість:" . ($_SESSION['total_items'][$id]) . ".шт<br>";
                echo $t_p = "Загальна ціна:" . ($_SESSION['total_price'][$id]) . ".грн<br>";
                echo $sign_in_basket = "<a href='/basket/view'>Увійти в корзину</a><br>";
                return true;
            }
            return true;
        } else {
            echo $false_basket = ("корзина пуста<br>");
            print_r($_SESSION['basket'] . "<br>");
            echo $t_itm = "Загальна кількість:" . ($_SESSION['total_items'][$id]) . ".шт<br>";
            echo $t_p = "Загальна ціна:" . ($_SESSION['total_price'][$id]) . ".грн<br>";
            echo $sign_in_basket = "<a href='/basket/view'>Увійти в корзину</a><br>";
            return true;
        }
        return false;
    }

    function remove_from_basket_all()
    {
        unset($_SESSION['basket']);

        return true;

    }

}
