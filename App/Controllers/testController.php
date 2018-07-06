<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 08.06.2018
 * Time: 10:03
 */


namespace App\Controllers;


use  App\Core\Controller,
    App\Models\User;

class testController extends Controller
{
    public function index()
    {
        $user = new User();
        $user->selectAll();

        $this->data['user'] = $user->getResult();
        $this->loadTemplate('test', $this->getData());
    }


}