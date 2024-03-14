<?php
	require_once("object.php");

	class Cdatabase extends Cobject
	{
		
		public $mysql;
		public function __construct($sever_name="localhost",$user_name="patent",$user_psw="patent",$db_name="table",$lang="UTF8") 
		{
			$this->mysql=new  Cmysql($sever_name,$user_name,$user_psw,$db_name,$lang);
		}		

		public function build($db_name,$tab_name,$type,$html=TRUE)
		{
			$error=1;
			$filename="";
			$sql_str='SELECT `url`,`what`,`type` FROM `table`.`url` where type="'.$type.'" && what="'.$tab_name.'";';
			//echo $sql_str;//test

			if($result = $this->mysql->transaction($sql_str))
			{
				while ($row = $result->fetch_row()) //fetch object array 
				{
					$error=0;//clear error flag
					$filename=$row[0];//'url'
					printf ("$row[0]",$row[0]);//test ok
				}
				$result->close();// free result set 
			}
			else {
				return FALSE;
			}
			$error=1;//set error flag
			//echo $filename;
			$handle = fopen($filename, "r");
			$contents = fread($handle, filesize($filename));
			fclose($handle);

			$sql_str='CREATE DATABASE  IF NOT EXISTS `'.$db_name.'` DEFAULT CHARACTER SET utf8 ;';

			if($this->mysql->mysqli->query($sql_str)=== TRUE)
			{
				//echo"<center><p> <h2><font color=#009933>create (".$db_name.") "."<br />","</font></h2></p></center>";
				if($this->mysql->mysqli->select_db($db_name)===TRUE) echo"<center><p> <h2><font color=#009933>select (".$db_name.") "."<br />","</font></h2></p></center>";
				//echo $contents;
				if($this->mysql->mysqli->query($contents)=== TRUE)//run contents sql
				{
					$error=0;//clear error flag
				 	echo"<center><p> <h2><font color=#009933>success create (".$db_name.") "."<br />","</font></h2></p></center>";
				}
			}	

			if($error>0&&($html===TRUE)) echo "<center><p> <h2><font color=#FF0000>error:create (".$db_name.") "."<br />","</font></h2></p></center>";
			
			if ($result = $this->mysql->mysqli->query("SHOW DATABASES;")) 
			{	
				$n=0;
				echo '<center> <table>';				
				while ($row = $result->fetch_row()) //fetch object array 
				{
					echo '<tr><td>'.$n++.'</td><td>'.$row[0].'</td></tr>';//test ok
				}
				echo '</table></center>';
				$result->close();// free result set 
			}

			if($error>0) return FALSE;
			else  return TRUE;
		}

	}

?>