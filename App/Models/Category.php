<?php


namespace App\Models;


use App\Core\Model;

class Category extends Model
{


    private $Result = null;

    public function getResult()
    {
        return $this->Result;
    }

    public function selectAll()
    {
        $sql = $this->db->prepare("SELECT*FROM category");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $this->Result = $sql->fetchAll(\PDO::FETCH_ASSOC);


        }
    }
}



