<?php
	echo '<html><body style="background-color:white;">';
	require_once("header.php");

	echo '<center></br></br></br>
	<div class="register_form_text">
		 <a  href="register_how_todo.php" >Registration Reference Sample</a></br></br>
	</div>

	';
	$register= new Cregister();
	$register->register_form();

	echo '</br></br></br></center>';
	require_once("footer.php");
	echo ' </body></html>';
?>