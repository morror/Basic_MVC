<?php

class RegistrationController implements IController{
	public function indexAction(){
		$fc = Router::getInstance();
		$params = $fc->getParams();
		$view = new View();
		$result = $view->render('../views/registration.tpl');
		//$fc->setBody($result);
		echo $result;
		
	}
	
	public function submitAction(){
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$errors = array();
			$log = new RegistrationModel();
			
			if(!$_POST['email'] || !preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $_POST['email'])){
			$errors['email'] = 'Please fill in a valid email!';
			};
			if(!$_POST['username']){
				$errors['username'] =  'Username field is empty';
			};
			if($_POST['password'] <> $_POST['password2']){
				$errors['password'] = 'Password mismatch';
			};
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			$write = mysql_fetch_assoc ($log->select($email));
			if($write['email']){
				$errors['email'] = 'Email already exists';
			}
			if(count($errors)){
				var_dump($errors);
				//echo "errors";
				$msg = implode("<br/>", $errors);
				$this->indexAction();
				include './views/error.html';
			}else{
				$res = $log->insert($email, $username, $password);
				header('Location: /index/index/'.$username);
			}
		};
	}
}
