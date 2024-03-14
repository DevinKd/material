<?php 
	echo '<html><body>';
	 require_once("header.php");
	 echo '
		 <center>
		 	 <div><img border="0" src="img/table.jpg" width="120" height="120"/><br />	</div>

			<form action="table_buildTo.php" method="POST" target="_blank">
				<table>
					<tr>
						<td>'.$TABLE.'</td>
						<td>
							<select name="tablename">';
								require("user/connectMySQL.php"); 

								$mysqli->select_db("table");
								$mysqli->query("SET NAMES UTF8;");	

								$query= "SELECT `what`,`type`,`url` FROM table.url;";
								if ($result = $mysqli->query($query)) 
								{	
									while ($row = $result->fetch_row()) //fetch object array 
									{
										printf ("<option value=\"%s\">%s</option>",$row[0],$row[0]);
										//printf ("%s\n", $row[0]);
									}
									$result->close();// free result set 
								}
	echo '
							</select>
						</td>
					</tr>
					<tr>
						<td>Type</td>
						<td>
							<select name="type">';

								$query= "SELECT `name` FROM table.type;";
								if ($result = $mysqli->query($query)) 
								{	
									while ($row = $result->fetch_row()) //fetch object array 
									{
										printf ("<option value=\"%s\">%s</option>",$row[0],$row[0]);
										//printf ("%s\n", $row[0]);
									}
									$result->close();// free result set 
								}
								require("user/closeMySQL.php");
	echo '
							</select>
						</td>
					</tr>

					<tr>
						<td>'.$DATABASE.'</td>
						<td><input type="text" name="db_name" style="width:300px" required="required" value=""></td>
					</tr>
					
					<tr>
						<td></td>
						 <td><input type="submit" name="table_build" value="'.$SUBMIT.'"style="width:150px"></td>
					</tr>

				</table>
			</form>	
		</center>
	</body></html>';
?>