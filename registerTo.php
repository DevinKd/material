<?php
	echo '<html><body style="background-color:white;">';
	require_once("header.php");

	echo '<center></br></br></br></br></br>';

	do
	{
		if($_POST['password']!=$_POST['con_password'])
		{
				echo '<div style="font-size:200%;color: red;" >
								Error: Two passwords do not match! Please retry.
						</div>';
			break;
		}

		if(Csecurity::is_mail_address($_POST['email'])==FALSE||strlen($_POST['email'])<5)
		{
				echo '<div style="font-size:200%;color: red;" >
								Error: Email address format error.
						</div>';
			break;
		}

		if(Csecurity::is_phone_number($_POST['phone'])==FALSE||strlen($_POST['phone'])<5)
		{
				echo '<div style="font-size:200%;color: red;" >
								Error: Phone number format error or too short.
						</div>';
			break;
		}

		if(strlen($_POST['password'])<5)
		{
				echo '<div style="font-size:200%;color: red;" >
								Error: Password too short (must be longer than 4).
						</div>';
			break;
		}

		$symbol=Csecurity::exist_quotes($_POST['uuid'],$_POST['username'],$_POST['organization'],$_POST['address'],$_POST['phone'],$_POST['email'],$_POST['password']);

		if(""!=$symbol)
		{
			echo '<div style="font-size:200%;color: red;" >
								Error: Invalid symbol \'  in : <font color=black> '.$symbol.' </font> Please retry.
			</div>';
			break;
		}

		$register= new Cregister();
		if($register->insert($_POST['uuid'],'title','profession','country',$_POST['username'],$_POST['organization'],$_POST['address'],$_POST['phone'],$_POST['email'],md5($_POST['password']),'action' ) )
		{
				echo '<div style="font-size:200%;color: green;" >Registration succeeded! </div>';			
		}
		else
		{
			echo '<div style="font-size:200%;color: red;" >Registration failed!  Please retry.</div>';				
		}

	}while(0);

	echo '</br></br></br></br></br></center>';
	require_once("footer.php");
	echo ' </body></html>';
?>
