
<?php
	//require_once("../function/function.php");
	class Cmysql
	{
		public $mysqli;//this for user useed 

		public function __construct($sever_name="localhost",$user_name="patent",$user_psw="patent",$db_name="test",$lang="UTF8") 
		{
			$this->init($sever_name,$user_name,$user_psw,$db_name,$lang);
		}

		public function __destruct()
		{
			if($this->mysqli) $this->mysqli->close();
		}

		public function init($sever_name,$user_name,$user_psw,$db_name,$lang="UTF8")
		{
			$this->mysqli = new mysqli($sever_name, $user_name, $user_psw, $db_name);
			if ($this->mysqli->connect_error) {
				die('Connect Error (' . $this->mysqli->connect_errno . ') '. $this->mysqli->connect_error);
				exit(-1);
			}
			$this->mysqli->select_db($db_name);
			$this->mysqli->query("SET NAMES ".$lang.";");			
		}

		public function transaction(...$sql_str)
		{
			if(!$this->mysqli->query("BEGIN;")) return FALSE;

			foreach ($sql_str as $n) 
			{
				//printf( "%s",$n);
				$result =$this->mysqli->query($n);
				if(!$result) break;
			}

			if($result)
			{
				if($this->mysqli->query("COMMIT;")) return $result;
			}
			else
			{
				$this->mysqli->query("ROLLBACK;");
			}
			return FALSE;
		}

		public function inquiry_uuid($db,$name="")
		{
			$count=1;

			$sql_s="SELECT `uuid`,`name`,`class`,`where`,`author`,`status`,`priority` FROM ".$db.".uuid order by priority desc;";

			echo "<center>";
			if(strlen($name)>0)
			{
				$sql_s="SELECT `uuid`,`name`,`class`,`where`,`author`,`status`,`priority` FROM ".$db.".uuid where `name`='".$name."' order by priority;";
				echo '</br></br><h3>'.$name.'</h3></br></br>';
			} 

			//echo $sql_s;//test ok
			if($result = $this->transaction($sql_s))
			{
				echo '<table  border=1>  <tr><th>UUID</th><th>Name</th><th>Class</th><th>Where</th><th>Author</th><th>Status</th><th>Priority</th></tr>';
				while($row = $result->fetch_row())
				{
					echo ' 
					<td>'.$row[0].'</td>
					<td>'.$row[1].'</td>
					<td>'.$row[2].'</td>
					<td>'.$row[3].'</td>
					<td>'.$row[4].'</td>
					<td>'.$row[5].'</td>
					<td>'.$row[6].'</td>
					</tr>';
					$count++;
				}
				$result->close();
				if($count<1) echo "<h3>No record!<br/>";	
				echo "</table></center>";
			}
		}

		public function insert_uuid($db,$uuid,$name,$class,$where="cn",$author="hunter",$status="normal",$priority="0")
		{
			if(Cobject::is_empty_str($db,$uuid,$name,$class)) 	return FALSE;	

			$sql_str="SELECT `name` FROM `".$db."`.`uuid`  where `name`='".$name."';";
			if($result = $this->transaction($sql_str)) 
			{
				while($row = $result->fetch_row())	if($row[0]==$name) return TRUE;
			}

			$sql_s="INSERT IGNORE INTO `".$db."`.`uuid` (`uuid`, `name`, `class`, `where`, `author`, `status`, `priority`) VALUES ('".$uuid."', '".$name."', '".$class."', '".$where."', '".$author."', '".$status."', '".$priority."');";

			//echo $sql_s;//test
			if($this->transaction($sql_s)) return TRUE;

			echo "<center>".$sql_s."<br /><p> <h2><font color=#FF0000>insert_uuid error:the '".$name."'  is existed "."<br />"."</font></h2></p></center>";
			return FALSE;
		}

		public function build_select($db="status",$select_name="status",$attr=' ',$default="",$tab="status",$col="name",$sql_s="")
		{
				echo '<select name="'.$select_name.'"  '.$attr.' required="required"  >';
				printf ("\t\t\t<option value=\"%s\">%s</option>\n",$default,$default);

				if($sql_s=="") $sql_s= "SELECT `".$col."` FROM `".$db."`.`".$tab."`  order by `".$col."`  ;";
				//echo $sql_s;//test
				if ($result = $this->transaction($sql_s)) 
				{	
					while ($row = $result->fetch_row()) //fetch object array 
					{
						if($default!=$row[0]){
							printf ("\t\t\t<option value=\"%s\">%s</option>\n",$row[0],$row[0]);
						}
					}
				}
				echo'</select>';
		  }

		  public function build_select_db($select_name="db_sel",$attr="",$default="")
		  {
		  		$this->build_select("",$select_name,$attr,$default,"","","SHOW DATABASES;");
		  }

		  public function update($db,$table,$column,$value,$key_column,$key_value)
		  {
		  		$sql_s= "UPDATE `".$db."`.`".$table."` SET `".$column."` = '".$value."' WHERE (`".$key_column."` = '".$key_value."') ;";
		  		//echo $sql_s."</br>";//test ok
		  		return $this->transaction($sql_s);
		  }

		  public function is_exist($db,$tab,$col,$data)
		  {
		  	$sql_str="SELECT `".$col."` FROM `".$db."`.`".$tab."`  where `".$col."`='".$data."';";
			if($result = $this->transaction($sql_str)) 
			{
				while($row = $result->fetch_row())
				{
					if($row[0]==$data) return TRUE;
				}
			}
			return FALSE;			
		  }


		public function sum($db,$tab,$col,$where="")
		{
			$sql_s="SELECT SUM(".$col.") as \"".$col."\" FROM `".$db."`.`".$tab."` ";
			if(strlen($where)>10) $sql_s+=$where;

			if($result = $this->transaction($sql_s))
			{
				while($row = $result->fetch_row())
				{
					return $row[0];
				}
			}
		}

	}
?>