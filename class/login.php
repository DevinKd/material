<?php
	require_once("object.php");
	require_once("language.php");
	require_once("mysql.php");

	class Clogin extends Cobject
	{
		public $mysql;
		public function __construct($sever_name="localhost",$user_name="patent",$user_psw="patent",$db_name="status",$lang="UTF8") 
		{
			$this->mysql=new  Cmysql($sever_name,$user_name,$user_psw,$db_name,$lang);
		}

		public static function exit()
		{
			Cobject::unset_session("loginStatus","sess_username","user_role","user_group");
		}

		public static function is_login() 
		{
			if(isset($_SESSION["loginStatus"]) && $_SESSION["loginStatus"] == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public static function is_admin() 
		{
			if(isset($_SESSION["loginStatus"]) ==FALSE || $_SESSION["loginStatus"] != true) return false;

			if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "admin")
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	
		public function login($email,$password,&$role,&$group,$db="register")
		{	
			$sql_s="SELECT  `mail`, `password`,`role`,`group` FROM  `".$db."`.`register` where `mail`='".$email."';";
			if($result = $this->mysql->transaction($sql_s))
			{
				$row =  $result->fetch_row ();
				if($row[0]===$email&&md5($password)===$row[1])
				{
					$role=$row[2]	;
					$group=$row[3];
					return TRUE;	
				}
			}

			return FALSE;
		}

		public  function login_form($action="loginTo.php",$success_callback="",$failure_callback="") 
		{
			echo '
				<div class="login_form">
					<form action="'.$action.'" method="POST">

					<table class="login_table">


						<tr class="login_table_tr">
							<td class="login_table_td_text">
								<div class="login_form_text"> '.Clanguage::$EMAIL.' </div>
							</td>
							<td class="login_table_td">
								<input class="login_form_input" type="text" name="email"  required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="login_table_tr">
							<td class="login_table_td_text">
								<div class="login_form_text"> '.Clanguage::$PASSWORD.'</div>
							</td>

							<td class="login_table_td">
								<input  class="login_form_input" type="password" name="password" required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="login_table_tr">
							<td class="login_table_td_text">
							</td>

							<td class="login_table_td">
							<input class="register_form_input" type="hidden" name="success_callback" value="'.$success_callback .'" required="required" >
							</td>
						</tr>

						<tr class="login_table_tr">
							<td class="login_table_td_text">
							</td>

							<td class="login_table_td">
							<input class="register_form_input" type="hidden" name="failure_callback" value="'.$failure_callback .'" required="required" >
							</td>
						</tr>

						<tr class="login_table_tr">
							<td class="login_table_td"></td>
							<td class="login_table_td">
							<div class="login_form_submit">
								<input class="login_form_input_submit" type="submit" name="submit" value= "'.Clanguage::$LOGIN.'">
							</div>
							</td>

						</tr>

						</table>
				</form>	
			</div>';
		}

	}
?>