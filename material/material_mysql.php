<?php 

	require_once("material_include.php");

	class Cmaterial_mysql
	{
		public $mysql;
		public function __construct($sever_name="127.0.0.1",$user_name="material",$user_psw="material",$db_name="material",$lang="UTF8") 
		{
			$this->mysql=new  Cmysql($sever_name,$user_name,$user_psw,$db_name,$lang);
		}

	}

?>