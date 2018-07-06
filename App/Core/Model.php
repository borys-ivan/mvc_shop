<?php

namespace App\Core;

use PDO;

class Model
{

    protected $db;

    public function __construct()
    {
        global $config;
        $option = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"];
        //$this->db = new PDO("mysqli::dbname=" . $config['dbname'] . ";host=" . $config['host'],
        $this->db = new PDO("mysql:host=localhost;dbname=shop",'root','', $option);
        $this->db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }



}


