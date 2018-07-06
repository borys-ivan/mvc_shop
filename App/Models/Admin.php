<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 04.07.2018
 * Time: 23:09
 */

namespace App\Models;


use App\Core\Model;

class Admin extends Model
{
    const SHOW_BY_DEFAULT = 10;
    private $Result = null;

    public function getResult()
    {
        return $this->Result;
    }


    public function getListProduct($page = 1)
    {


        $page = intval($page);
        $offset = ($page - 1) * 10;
        $admin_list_prod = $this->db->prepare("SELECT*FROM product ORDER BY ID ASC LIMIT "
            . self::SHOW_BY_DEFAULT . " OFFSET " . $offset);

        $admin_list_prod->execute();
        $result=$admin_list_prod->fetchAll(\PDO::FETCH_ASSOC);

        if ($result) {
            $this->Result=$result;
            }

        }

    public function getUsersList($page = 1)
    {

        $page = intval($page);
        $offset = ($page - 1) * 10;
        $admin_list_user = $this->db->prepare("SELECT*FROM user ORDER BY ID ASC LIMIT "
            . self::SHOW_BY_DEFAULT . " OFFSET " . $offset);
        $admin_list_user->execute();
        $result=$admin_list_user->fetchAll(\PDO::FETCH_ASSOC);

        if ($result) {

            $this->Result=$result;

        }
    }
    public function getOrderList($page=1)
    {

        $page = intval($page);

        $offset = ($page - 1) * 10;
        $orders_list = $this->db->prepare("SELECT order1.ID, user.user_name,user.email,user.number,user.name, product.ID_product, product.name, 
                   order1.data, order1.state, order1.amount_product, order1.amount_price
                   FROM user, order1
                   RIGHT JOIN product ON product.ID = order1.ID_product
                   WHERE user.ID = order1.ID_user ORDER BY ID ASC LIMIT "
            . self::SHOW_BY_DEFAULT . " OFFSET " . $offset);



        $orders_list->execute();
        $result=$orders_list->fetchAll(\PDO::FETCH_ASSOC);

        if ($result) {
            $this->Result=$result;

            }

        }

    public function edit($id, $id_product, $name, $description, $specifications, $price,$new,
                                $status, $count)
    {

        $result=$this->db->prepare("UPDATE product SET name=" . $this->db->quote($name) . ",description=" . $this->db->quote($description) . ",
        price=" . $this->db->quote($price) . ",specifications=" . $this->db->quote($specifications) . ",
        ID_product=" . $this->db->quote($id_product) . ",is_new=".$this->db->quote($new).",status=".$this->db->quote($status).",
        count=".$this->db->quote($count)." WHERE ID=" . $this->db->quote($id));
        $result->execute();
    }
    public function image($name_image, $temp_name)
    {

        $uploaddir = 'App/image/';
        $uploadfile = $uploaddir . basename($name_image);
        move_uploaded_file($temp_name, $uploadfile);
        /* echo '<pre>';
         if (move_uploaded_file($temp_name, $uploadfile)) {
             echo "Файл корректен и был успешно загружен.\n";
         } else {
             echo "Возможная атака с помощью файловой загрузки!\n";
         }
         echo 'Некоторая отладочная информация:';
         print_r($_FILES);
         print "</pre>";*/
    }
    public function getListProductsCount()
    {

        $result = $this->db->prepare("SELECT count(ID) AS count FROM product ");
        $result->execute();
        $row=$result->fetch(\PDO::FETCH_ASSOC);
        return $row['count'];
    }
    public function getListUsersCount()
    {

        $result = $this->db->prepare("SELECT count(ID) AS count FROM user ");
        $result->execute();
        $row=$result->fetch(\PDO::FETCH_ASSOC);
        return $row['count'];
    }
    public function getListOrdersCount()
    {

        $result = $this->db->prepare("SELECT count(ID) AS count FROM order1 ");
        $result->execute();
        $row=$result->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }
    public function deleteProduct($id)
    {

        $delete_product = $this->db->prepare("DELETE FROM product WHERE ID=" . $this->db->quote($id));
        $delete_product->execute();

        //return true;
    }
    public function getOrder($id)
    {

        $orders_list = $this->db->prepare("SELECT order1.ID, user.user_name, product.ID_product, product.name, 
                   order1.data, order1.state, order1.amount_product, order1.amount_price
                   FROM user, order1
                   RIGHT JOIN product ON product.ID = order1.ID_product
                   WHERE user.ID = order1.ID_user AND order1.ID=" . $this->db->quote(array_shift($id)));

        $orders_list->execute();
        $result=$orders_list->fetchAll(\PDO::FETCH_ASSOC);

        if ($result) {

            $this->Result=$result;
         /*   foreach ($orders_list as $order) {
                $rez[] = array('ID' => $order['ID'], 'user_name' => $order['user_name'], 'name' => $order['name'], 'data' => $order['data'],
                    'amount_product' => $order['amount_product'], 'amount_price' => $order['amount_price']);*/
            }
            //return $rez;
        }

    public function updateOrder($id,$name, $date, $amount, $amount_price)
    {

        $row=$this->db->prepare("SELECT ID FROM product WHERE name=".$this->db->quote($name));
        $row->execute();
        $rez=$row->fetch(\PDO::FETCH_ASSOC);

        $update=$this->db->prepare("UPDATE order1 SET ID_product=" . $this->db->quote($rez['ID']) . ",data=" . $this->db->quote($date) . "
        ,amount_product=" . $this->db->quote($amount) . ",amount_price=" . $this->db->quote($amount_price) . "
         WHERE ID=" . $this->db->quote($id));

        $update->execute();

      //  return true;
    }
    public function listProduct()
    {

        $list_product = $this->db->prepare("SELECT ID,name FROM product");
        $list_product->execute();
        $result=$list_product->fetchAll(\PDO::FETCH_ASSOC);
        if ($result) {
            $this->Result=$result;
            }


        }

    /*   public static function checkNameExists($id,$name)
       {
           // Соединение с БД
           $db = Db::dbConnect();
           $check_product_name=$db->query("SELECT * FROM product WHERE ID=".$db->escape($id)."
            AND name='".$db->escape($name)."'");
           if($check_product_name){
               return true;
           }
           return false;
       }*/

}