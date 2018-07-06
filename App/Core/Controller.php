<?php

namespace App\Core;

class Controller
{
    protected $data = [];

    public function _construct()
    {

    }

    protected function getData(){
        return $this->data;
    }

    public function _call($name, $arguments)
    {
        $this->loadTemplate('error_404');
    }

    public function LoadView($viewName, $viewData = array())
    {
        extract($viewData);
        include 'App/Views/' . $viewName . '.php';
    }

    public function LoadTemplate($viewName, $viewData = array())
    {
        include 'App/Views/template.php';
    }

    public function LoadViewInTemplate($viewName, $viewData = array())
    {
        extract($viewData);
        include 'App/Views/' . $viewName . '.php';
    }

    public function AjaxSuccess($descricao, $titulo = "")
    {
        if ($titulo != ""):
            return ["alert, alert-success", "fa fa-check", $descricao, $titulo = ""];
        else:
            return ["alert, alert-success", "fa fa-check", "Sucesso", $titulo = ""];
        endif;
    }
}