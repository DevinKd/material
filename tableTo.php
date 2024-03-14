<?php 
	echo '<html><body>';
	require_once("header.php");
	if(Clogin::is_admin()!=true) exit();
	$url = new Curl();
	$url->insert("table",$_POST['author'],$_POST['what_title'],$_POST['what_type'],$_POST['where_url'],$_POST['logo'],$_POST['status'],$_POST['remark'],$_POST['priority']);
	require_once("table_inquiry.php");
	echo '</body></html>';
?>