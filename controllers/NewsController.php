<?php

class NewsController implements IController{
	public function indexAction(){
		$fc = Router::getInstance();
		$params = $fc->getParams();
		$view = new View();
		$result = $view->render('../views/news.tpl');
		//$fc->setBody($result);
		echo $result;
	}
}
