<?php

class DBconnect {
	
	static $connect = NULL;
	
	private function __construct(){
		$db = mysql_connect ("localhost","root","");
		mysql_select_db ("users", $db);
	}
	
	public static function getConnect(){
		if(self::$connect == NULL){
			self::$connect = new self();
		}
		return self::$connect;
	}
}
 