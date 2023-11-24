<?php
	require_once("object.php");
	require_once("language.php");
	require_once("mysql.php");

	class Csecurity extends Cobject
	{
		public $mysql;
		public function __construct($sever_name="localhost",$user_name="patent",$user_psw="patent",$db_name="status",$lang="UTF8") 
		{
			$this->mysql=new  Cmysql($sever_name,$user_name,$user_psw,$db_name,$lang);
		}

		public function test() 
		{
			echo "Csecurity.test()";
		}		

		public static function is_mail_address($mail)
		{
			$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
			if ( preg_match( $pattern, $mail ) )
			{
				return TRUE;
			}
			return FALSE;
		}

		public static function is_token($name)
		{
			$pattern = "^[0-9a-zA-Z_]{1,}$";
			if ( preg_match( $pattern, $name ) )
			{
				return TRUE;
			}
			return FALSE;
		}

		public static function is_phone_number($number)
		{
			/*
			$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
			if ( preg_match( $pattern, $number ) )
			{
				return TRUE;
			}
			return FALSE;
			*/
			return TRUE;
		}

		public static function exist_quotes(...$string)
		{
			foreach ($string as $n) 
			{
				if(strstr($n,"'"))
				{						
					return $n;
				}
			}
			return "";
		}


	}

?>