<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 02.07.2018
 * Time: 0:39
 */

namespace App\Models;


use App\Core\Model;

class UserBasket extends Model
{


    private $Result = null;

    public function getResult()
    {
        return $this->Result;
    }


    public function getListOrder()
    {

        $price = 0.00;

        if ($_SESSION['basket']) {

            foreach ($_SESSION['basket'] as $id => $qty) {

                //echo $qty;

                $usersBasket = $this->db->prepare("
                 SELECT ID,name,price,ID_product,count
                 FROM product
                 WHERE ID=" . $this->db->quote($id));

                $usersBasket->execute();
                $row = $usersBasket->fetch(\PDO::FETCH_ASSOC);
                

                if ($qty <= $row['count']) {
                    $warning_p = true;
                    $class_warning = "true";
                    $warning = "Достатня зазначена кількість на складі";
                } else {
                    $warning_p = false;
                    $class_warning = "false";
                    $warning = "Відсутня зазначена кількість на складі";
                }
                $rez[] = array('ID' => $id, 'ID_product' => $row['ID_product'], 'name' => $row['name']
                , 'price' => $row['price'], 'qty' => $qty, 'warning' => $warning, 'class_warning' => $class_warning,
                    'warning_p' => $warning_p);

                $this->Result = $rez;
            }

        } else {
            echo '<h1>Корзина пуста,виберіть товар</h1>';
        }

    }

    public static function remove_from_order_basket($id)
    {
        if (isset($_SESSION['basket'])) {
            unset($_SESSION['basket'][array_shift($id)]);
            unset($_SESSION['total_items'][array_shift($id)]);
        }
        return true;
    }

    public function addOrder()
    {
        $today = date("Y-m-d H:i:s");
        $ID_user = $_SESSION['user_ID'];
        $price = 0.00;
        //  echo "<br>".$today;
        //  echo "<br>".$ID_user;
        foreach ($_SESSION['basket'] as $arr_id => $arr_count) {

            $prod = $this->db->prepare("SELECT ID,price FROM product WHERE ID=" . $this->db->quote($arr_id));
            $prod->execute();
            $result = $prod->fetch(\PDO::FETCH_ASSOC);
            if (isset($result['price']) && isset($result['ID'])) {
                $prod_p = $result['price'];
                $ID = $result['ID'];

                $p_price = ("<br> Ціна:" . $prod_p);

                $price = $prod_p * $arr_count;

            }
            $add_list_order = $this->db->prepare("INSERT INTO `order1` (`ID_user`, `ID_product`, `data`, `state`, `amount_product`, `amount_price`) 
              VALUES (" . $this->db->quote($ID_user) . ", " . $this->db->quote($arr_id) . "," . $this->db->quote($today) . ", '1',
               " . $this->db->quote($arr_count) . ", " . $this->db->quote($price) . ")");

            $add_list_order->execute();

            $is_recommended = $this->db->prepare("SELECT is_recommended,count FROM product WHERE ID=" . $this->db->quote($arr_id));

            $is_recommended->execute();
            $row = $is_recommended->fetch(\PDO::FETCH_ASSOC);


            $update_product = $this->db->prepare("UPDATE product SET is_recommended=" . $this->db->quote($row['is_recommended'] + $arr_count) . " WHERE ID=" . $this->db->quote($arr_id));
            $update_product->execute();

            $orderCount = $this->db->prepare("UPDATE product SET count=" . $this->db->quote($row['count'] - $arr_count) . " WHERE ID=" . $this->db->quote($arr_id));
            $orderCount->execute();

        }

    }

    public function remove_item($id, $count)
    {
        $_SESSION['basket'][$id] = $count;
        
    }

    public function clean_basket()
    {
        $_SESSION['basket'] = array();
        $_SESSION['total_items'] = 0;
        $_SESSION['total_price'] = 0.00;
    }

    public function checking_product($id, $count)
    {

        $result = $this->db->prepare("SELECT count FROM product WHERE ID=" . $this->db->quote($id));
        $result->execute();
        $row = $result->fetch(\PDO::FETCH_ASSOC);


        if (1 <= $count && $count <= $row['count']) {
            
            echo "<span class='warning_true'>Достатня зазначена кількість на складі</span>";
        }
        if (1 < $count && $count >= $row['count']) {
           
            echo "<span class='warning_false'>Відсутня зазначена кількість на складі</span>";
        }
        if ($count == 0 || $row['count'] == 0) {
           
            echo $warning = false;
            echo "<span class='warning_false'>Введіть кількість більше 0</span>";
        }
        return true;
    }

}