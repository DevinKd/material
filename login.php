<?php
	echo '<html><body>';
	require_once("header.php");

	echo '<center></br></br></br>';
	
	Clogin::exit();

	$login= new Clogin();
	$login->login_form();

	echo '</br></br></br></center>';
	require_once("footer.php");
	echo ' </body></html>';
?>