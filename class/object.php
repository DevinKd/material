<?php

	class Cobject
	{
			public function __construct() 
			{

			}

			public function __destruct()
			{

			}

			public static function output(...$string) 
			{
				foreach ($string as $n) 
				{
					printf( "%s",$n);
				}
			}

			public static function is_empty_str(...$string) 
			{
				foreach ($string as $n) 
				{
					if(strlen($n)<1) return TRUE;
				}
				return FALSE;
			}

			public static function trim(&$string) 
			{
					$string=trim($string);
			}

			public static function goto($extra)
			{
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				header("Location: http://$host$uri/$extra");
				exit;
			}

			public static	function  is_session_started()
			{
			    if ( php_sapi_name() !== 'cli' ) {
			        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
			            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			        } else {
			            return session_id() === '' ? FALSE : TRUE;
			        }
			    }
			    return FALSE;
			}

			public static function get_session($key)
			{
				if(isset($_SESSION[$key])) return $_SESSION[$key];
				return "";
			}

			public static function session_start()
			{
				if ( Cobject::is_session_started() === FALSE ) return session_start();
				return TRUE;
			}

			public static function unset_session(...$key) 
			{
				if ( Cobject::is_session_started() === FALSE ) session_start();

				foreach ($key as $k) 
				{
					if(strlen($k)<1) continue;
					if(isset($_SESSION[$k])) unset($_SESSION[$k]);
				}
				session_destroy();
			}

	}
?>