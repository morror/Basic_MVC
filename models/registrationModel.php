<?php

class RegistrationModel{
	
	function __costruct(){
		//DBconnect::getConnect();
	}
	public function insert($email, $username, $password){
		DBconnect::getConnect();
		mysql_query("INSERT INTO `users` (id, email, username, password) VALUES (NULL,'{$email}','{$username}','{$password}')");
		
	}
	public function select($data){
		DBconnect::getConnect();
		$res = mysql_query ("SELECT * FROM `users` WHERE email='$data'");
		return $res;
	}
}