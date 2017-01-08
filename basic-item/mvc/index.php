<?php
//index.php
// get runtime controller prefix
$c_str = isset($_GET['c'])?$_GET['c']:"";
// the full name of controller
$c_name = $c_str.'controller';
// the path of controller
$c_path = 'controller/'.$c_name.'.php';
// get runtime action
$method = isset($_GET['a'])?$_GET['a']:"index";
// get runtime parameter
$param = isset($_GET['param'])?$_GET['param']:"welcome";;
// load controller file
require($c_path);
// instantiate controller
$controller = new $c_name;
// run the controller  method
$controller->$method($param);
// End of index.php

//index.php?c=xxxxx&a=xxxxx&param=xxxxx