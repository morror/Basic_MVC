<?php

class IndexController implements IController{
	public function indexAction(){
		$fc = Router::getInstance();
		$params = $fc->getParams();
		$view = new View();
		//$view->name = 'Jhon';
		$view->name = $params[0];
		$result = $view->render('../views/index.tpl');
		//$fc->setBody($result);
		echo $result;
	}
}
