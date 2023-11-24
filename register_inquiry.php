<?php
	echo '<html><body style="background-color:white;">';
	require_once("header.php");

	do{
			if(Clogin::is_admin()!=true) break;
			
			echo '<center></br></br>
			<div class="register_form_text">
				 <a  href="register_export.php" >Export to excel</a></br></br>
			</div>
			';

			$register= new Cregister();
			$register->inquiry();

	}while(0);

	echo '</br></br></center>';
	require_once("footer.php");
	echo '</body></html>';
?>