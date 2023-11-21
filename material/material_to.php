<?php 
	echo '<html><body>';
	require_once("header.php");
	$url = new Curl();
	$url->insert("material",$_POST['author'],$_POST['what_title'],$_POST['what_type'],$_POST['where_url'],$_POST['logo'],$_POST['status'],$_POST['remark'],$_POST['priority']);
	require_once("material_inquiry.php");
	echo '</body></html>';
?>