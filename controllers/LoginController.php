<?php

class LoginController implements IController{
	public function indexAction(){
		$fc = Router::getInstance();
		$params = $fc->getParams();
		$view = new View();
		//$view->name = 'Jhon';
		//$view->name = $params['name'];
		$result = $view->render('../views/login.tpl');
		//$fc->setBody($result);
		echo $result;
		
	}
	
	public function submitAction(){
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$log = new LoginModel();
			$data = $_POST['email'];
			$res = $log->select($data);
			$write = mysql_fetch_assoc ($res);
			if($_POST['password'] == $write['password']){
				$params = $write['username'];
				header('Location: /index/index/'.$params);
			}else {
				header('Location: /login/error/');
			}
		};
	}
	public function errorAction(){
		$this->indexAction();
		$msg = "WRONG EMAIL OR PASSWORD";
		include './views/error.html';
		/*echo "<div class='error'><?= $msg; ?></div>";*/
		
	}
}
