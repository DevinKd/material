<?php 
	echo '<html>';
	require_once("head.php");
	echo '<body>';

	require_once("header.php");

	if(Clogin::is_admin()!=true) exit();
	
	//output("<center><p> <h1>tableBuildTo</h1></p></center>");
	output("<center>");
	output("tablename:", $_POST['tablename'],"<br />");
	output("type:", $_POST['type'],"<br />");
	output("db_name:", $_POST['db_name'],"<br />");	
	output("</center>");

	$db = new Cdatabase();
	$db->build($_POST['db_name'], $_POST['tablename'],$_POST['type']);

	echo '</body></html>';
?>
