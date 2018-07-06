<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 30.06.2018
 * Time: 2:27
 */

namespace App\Models;

use App\Core\Model;

class CategoryList extends Model
{

    const SHOW_BY_DEFAULT = 5;

    protected $id;
    protected $page;



    private $Result = null;

    public function getResult()
    {
        return $this->Result;
    }


    public function getCategoriesList()
    {

        $category = $this->db->prepare("SELECT*FROM category");

        $category->execute();
        $result = $category->fetchAll(\PDO::FETCH_ASSOC);


        if ($result) {

            $this->Result = $result;

        }
    }


    public function listCat($id, $page = 1)
    {


        //$db = Db::dbConnect();

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // echo SHOW_BY_DEFAULT;
        // echo $offset;
        $products = $this->db->prepare("SELECT list_products.ID,list_products.name,product.price,product.specifications
               ,product.image,product.is_new 
               FROM list_products,product 
               WHERE list_products.ID=product.ID 
               AND list_products.category_ID=" . $this->db->quote(array_shift($id)) . " 
               ORDER BY list_products.ID ASC
           LIMIT " . self::SHOW_BY_DEFAULT .
            " OFFSET " . $offset);

        $products->execute();


        $this->Result = $products->fetchAll(\PDO::FETCH_ASSOC);


        return true;
        //  return $rez;
    }

    public function recommendProduct($id)
    {
        $recommend = $this->db->prepare("SELECT list_products.ID,list_products.name,product.price,product.specifications,product.image
               FROM list_products,product
               WHERE list_products.ID=product.ID
               AND list_products.category_ID=" . $this->db->quote(array_shift($id)) . "
               AND is_recommended>=10");

        $recommend->execute();

        if (!empty($recommend)) {
            $this->Result = $recommend->fetchAll(\PDO::FETCH_ASSOC);

        }
        return true;
    }

    public function getProductCount($id)
    {

        $result = $this->db->prepare("SELECT count(ID) AS count FROM list_products WHERE category_ID=" . $this->db->quote($id));
        $result->execute();
        $row = $result->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }


}
