<?php
	require_once("object.php");
	require_once("language.php");
	require_once("mysql.php");

	class Crequest extends Cobject
	{
		public $mysql;
		public function __construct($sever_name="localhost",$user_name="patent",$user_psw="patent",$db_name="request",$lang="UTF8") 
		{
			$this->mysql=new  Cmysql($sever_name,$user_name,$user_psw,$db_name,$lang);
		}

	}

?>
