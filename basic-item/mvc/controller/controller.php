<?php

class Controller
{

    public function index($param)
    {
        //echo 'hello world';die;
        require('view/index.php');
        require('model/model.php');
        $model = new Model();
        $data = $model->getData($param);
        $view = new Index();
        $view->display(isset($data)?$data:"");
    }
}