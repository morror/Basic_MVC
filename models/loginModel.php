<?php

class LoginModel{
	
	function __costruct(){
		DBconnect::getConnect();
	}
	public function select($data){
		DBconnect::getConnect();
		$res = mysql_query ("SELECT * FROM `users` WHERE email='$data'");
		return $res;
	}
}
