<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 30.06.2018
 * Time: 12:27
 */

namespace App\Models;


use App\Core\Model;

class Product extends Model
{

    protected $id;


    private $Result = null;

    public function getResult()
    {
        return $this->Result;
    }


    public function getProductId($id)
    {

        $product = $this->db->prepare("SELECT*FROM product WHERE ID=" . $this->db->quote(array_shift($id)));
        $product->execute();
        if ($product) {
            $result = $product->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                if ($row['is_new'] == 1) {
                    $name_new = "Так";
                } else {
                    $name_new = "Ні";
                }
                if ($row['status'] == 1) {
                    $name_status = "Опублікувати";
                } else {
                    $name_status = "Приховати";
                }
                $rez[] = array('ID' => $row['ID'], 'name' => $row['name'], 'description' => $row['description'],
                    'price' => $row['price'], 'specifications' => $row['specifications'], 'ID_product' => $row['ID_product']
                , 'image' => $row['image'], 'new' => $row['is_new'], 'status' => $row['status']
                , 'count' => $row['count'], 'name_status' => $name_status, 'name_new' => $name_new);
                // }
                $this->Result = $rez;


            }

        } else {
            echo "<br> ID товара не знайдено в базі данних";
        }


    }


    public function addProduct($category, $id_product, $name, $name_image, $description,
                               $specifications, $price, $new, $status, $count)
    {

        $path = "/image/";
        $add_list_products = $this->db->prepare("INSERT INTO list_products (`name`,`category_ID`) 
VALUES (" . $this->db->quote($name) . "," . $this->db->quote($category) . ")");
        $add_list_products->execute();
        $add_product = $this->db->prepare("INSERT INTO product (`name`,`description`,`price`,`specifications`,`id_product`,
            `image`,`is_new`,`is_recommended`,`status`,`count`)
VALUES (" . $this->db->quote($name) . "," . $this->db->quote($description) . "," . $this->db->quote($price) . ",
        " . $this->db->quote($specifications) . "," . $this->db->quote($id_product) . "," . $this->db->quote($path . $name_image) .
            "," . $this->db->quote($new) . "," . $this->db->quote(0) . "," . $this->db->quote($status) . "," . $this->db->quote($count) . ")");

        $add_product->execute();

    }


    public function checkNameProduct($name)
    {
        if (strlen($name) != 0) {
            return true;
        }
        return false;
    }

    public function checkArticle($id_product)
    {
        if (strlen($id_product) != 0) {
            return true;
        }
        return false;
    }

    public function checkCategory($category)
    {
        if ($category != 'Вибрати категорію') {
            return true;
        }
        return false;
    }

}