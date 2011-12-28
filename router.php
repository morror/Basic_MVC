<?php 

class Router{
	
	protected $_controller, $_action,  $_body;
	protected $_params = array();
	static $_instance;
	
	public static function getInstance(){
		if (!(self::$_instance instanceOf self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/* get and parse url */
	private function __construct(){
		$request = $_SERVER['REQUEST_URI'];
		//echo 'request '.$request.' , ';
		$splits = explode('/', trim($request, '/'));
		$this->_controller = !empty($splits[0])?ucfirst($splits[0]).'Controller':'IndexController';
		//echo 'controller '.$this->_controller.' , ';
		$this->_action = !empty($splits[1])?$splits[1].'Action':'indexAction';
		//echo 'method '.$this->_action.' , ';
		if(!empty($splits[2])){
			for($i=2, $cnt=count($splits); $i<$cnt; $i++){
				$this->_params[] = $splits[$i];
			}
		}
	}
	
	/* create controllers and run methods*/
	public function route(){
		//
		/*if(class_exists($this->getController())){
			$rc = new ReflectionClass($this->getController());
				if($rc->hasMethod($this->getAction())){
					$controller = $rc->newInstance();
					$method = $rc->getMethod($this->getAction());
					$method->invoke($controller); 
				}else{
					throw new Exception("Wrong Action");
		}else {
			throw new Exception("Wrong Controller");
		}*/
		if(class_exists($this->getController())){
			$cont = $this->getController();
			$controller = new $cont;
			$method = $this->getAction();
			$params = $this->getParams();
			if(method_exists($controller, $method)){
					$controller->$method();
					//call_user_func_array(array($controller, $method), $params);
					return;
				}else{
					throw new Exception("Wrong Action");
				}
		}else {
			throw new Exception("Wrong Controller");
		}
	}
	
	function getParams(){
		return $this->_params;
	}
	function getController(){
		return $this->_controller;
	}
	function getAction(){
		return $this->_action;
	}
	function getBody(){
		return $this->_body;
	}
	function setBody($body){
		$this->_body = $body;
	}
}
