<?php
//error_reporting(0);

set_include_path(get_include_path()
				.PATH_SEPARATOR.'controllers'
				.PATH_SEPARATOR.'models'
				.PATH_SEPARATOR.'views');


function __autoload($className){
	require_once $className.'.php';
    /*$fname = str_replace('_', '/', $className) . '.php';
    $result = include_once($fname);
    return $result;*/
}

include 'header.html';
/*$router = new Router();*/
$router = Router::getInstance();
$router->route();
//echo $router->getBody();
include 'footer.html';
