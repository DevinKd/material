<?php
	echo '<html><body>';

	require_once("header.php");

	echo '<center></br></br></br>';

	do{
		$login= new Clogin();
		$role="null";
		$group="null";
		if($login->login($_POST['email'],$_POST['password'],$role,$group))
		{
				Cobject::session_start();
				$_SESSION["sess_username"] = $_POST['email'];
				$_SESSION["loginStatus"] = true;	
				$_SESSION["user_role"] = $role;	
				$_SESSION["user_group"] = $group;
				//print_r($_SESSION);//test ok
				if($_POST['success_callback']!="")
				{
					Cobject::goto($_POST['success_callback']);
				}
				else
				{
			   		echo '<center>
			   			<div><h2><font color=#000000><br /><br />Login Success!</br></font></h2></div>
			   			</br>
						<div class="register_form_text">
							 <a  href="change_password.php" >Change Password ?</a></br></br>
						</div>
			   		</center>'
			   		;

				}

			    break;
		}

		if($_POST['failure_callback']!="")
		{
				Cobject::goto($_POST['failure_callback']);
		}
		else
		{
				echo '<h2><font color=#FF0000><br /><br />Login Fail!<br /></font></h2></br>
						<div class="register_form_text">
							 <a  href="forget_password.php" >Forget Password ?</a></br></br>
						</div>
				';
		}

	}while (0);

	echo '</br></br></br></center>';
	require_once("footer.php");
	echo ' </body></html>';
?>