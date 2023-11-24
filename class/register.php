<?php
	require_once("object.php");
	require_once("language.php");
	require_once("mysql.php");

	class Cregister extends Cobject
	{
		public $mysql;
		public function __construct($sever_name="localhost",$user_name="patent",$user_psw="patent",$db_name="status",$lang="UTF8") 
		{
			$this->mysql=new  Cmysql($sever_name,$user_name,$user_psw,$db_name,$lang);
		}

		public  function register_form($action="registerTo.php") 
		{
			$v4uuid = UUID::v4();
			echo '
				<div class="register_form">
					<form action="'.$action.'" method="POST">

					<table class="register_table">

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> '.Clanguage::$NAME.'</div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="username" required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> '.Clanguage::$ORGANIZATION.'</div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="organization" required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> '.Clanguage::$ADDRESS.'</div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="address" required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> '.Clanguage::$PHONE_NUMBER.'</div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="phone" required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> '.Clanguage::$EMAIL.' Address</div>
							</td>
							<td class="register_table_td">
								<input class="register_form_input" type="text" name="email"  required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> '.Clanguage::$PASSWORD.' <br></div>
							</td>

							<td class="register_table_td">
								<input  class="register_form_input" type="password" name="password" required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> '.Clanguage::$CONFIRM_PASSWORD.'</div>
							</td>
							<td class="register_table_td">
								<input  class="register_form_input" type="password" name="con_password"  required="required" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"></div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="hidden" name="uuid" value="'.$v4uuid .'" required="required" >
							</td>
						</tr>

						<tr class="register_table_tr">
							<td class="register_table_td"></td>
							<td class="register_table_td">
							<div class="register_form_submit">
								<input class="register_form_input_submit" type="submit" name="submit" value= "'.Clanguage::$REGISTRATION.'">
							</div>
							</td>

						</tr>

						</table>
				</form>	
			</div>';
		}

		public  function insert($uuid,$title,$profession,$country,$name,$organization,$contact,$telephone,$mail,$password,$action,$db="register") 
		{
			if($this->mysql->is_exist($db,"register","uuid",$uuid)) return TRUE;

			$sql="INSERT IGNORE INTO `".$db."`.`register` (`uuid`, `title`,`profession`,`country`,`name`, `organization`,`contact`, `telephone`, `mail`, `password`, `action` ) VALUES ('".$uuid."', '".$title."', '".$profession."', '".$country."', '".$name."', '".$organization."', '".$contact."', '".$telephone."', '".$mail."', '".$password."', '".$action."');";
			//echo $sql;//test
			if($this->mysql->transaction($sql))
			{
					return TRUE;
			}
			return FALSE;
		}

		public function inquiry($db="register",$where="",$order_by=" order by `action` ")
		{
			$count=0;

			$sql_s="SELECT   `title`,`profession`,`country`,`name`, `organization`,  `contact`, `telephone`, `mail`, `action`  FROM ".$db.".`register` ";
			if(strlen($where)>10) $sql_s= $sql_s.$where;
			 $sql_s .= $order_by;
			//echo $sql_s;//test ok
			if($result = $this->mysql->transaction($sql_s))
			{
			    echo '<table  class="register_inquiry_table" border=1 >  
			    <tr><th>NO.</th><th>Title1</th><th>Title2</th><th>Country</th><th>Name</th><th>Organization</th><th>Address</th><th>Telephone</th><th>Mail</th><th>Banquet</th></tr>';
				while($row = $result->fetch_row())
				{
					$count++;

					echo '<tr align="center" >
						<td>'.$count.'</td>
						<td>'.$row[0].'</td>
						<td>'.$row[1].'</td>
						<td>'.$row[2].'</td>
						<td>'.$row[3].'</td>
						<td>'.$row[4].'</td>
						<td>'.$row[5].'</td>
						<td>'.$row[6].'</td>
						<td>'.$row[7].'</td>
						<td>'.$row[8].'</td>											
					</tr>';
				}
				$result->close();
				echo "</table>";
			}

		 }

		public function test() 
		{
			echo "Cregister.test()";
		}		

	}

?>
