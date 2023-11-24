<?php
	require_once("session/session_start.php");
	require_once("code.string.php");
	require_once("function/function.php");
	require_once("class/uuid.php");
	require_once("class/mysql.php");
	require_once("class/database.php");
	require_once("class/code.php");
	require_once("class/bill.php");
	require_once("class/register.php");
	require_once("class/user.php");
	require_once("class/login.php");
	require_once("class/text.php");
	require_once("class/security.php");
	
echo '<html>
		<head>
			<meta charset="utf-8" >
		</head>
		<body>
	';

	header("content-type:application/msexcel");
	header("content-disposition:filename=register.xls");
	$register= new Cregister();
	$register->inquiry();

	echo '
		</body>
		</html>
	';
?>