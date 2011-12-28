<?php

class HelpController implements IController{
	public function indexAction(){
		$fc = Router::getInstance();
		$params = $fc->getParams();
		$view = new View();
		$result = $view->render('../views/help.tpl');
		//$fc->setBody($result);
		echo $result;
		
	}
}
