<?php
namespace App\Controllers;

use  App\Core\Controller;

class errorController extends Controller
{
    public function index(){
        $data=array();

        echo "controller:error<br>";

        $this->loadTemplate('error_404',$data);
    }

}