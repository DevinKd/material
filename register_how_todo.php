<?php
	echo '<html><body style="background-color:white;">';
	require_once("header.php");

	echo '<center></br></br></br>

				<div class="register_form">
					<form action="registerTo.php" method="POST">

					<table class="register_table">

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> Country </div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="title2" required="required" value="China" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> Name</div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="username" required="required" value="Your Name" >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> Organization</div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="organization" required="required" value="Red-Arrow Intelligent Technology Co. Ltd">
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> Address</div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="address" required="required" value="SPST-8-302, No. 393 of Middle HuaXia Road, Pudong District, " >
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> Phone Number</div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="text" name="phone" required="required" value="86-21-20685547">
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> Email</div>
							</td>
							<td class="register_table_td">
								<input class="register_form_input" type="text" name="email"  required="required" value="hunter@red-arrows.cn">
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> Password</div>
							</td>

							<td class="register_table_td">
								<input  class="register_form_input" type="password" name="password" required="required" value="********">
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"> Confirm Password</div>
							</td>
							<td class="register_table_td">
								<input  class="register_form_input" type="password" name="con_password"  required="required"  value="********">
							</td>
						</tr>
						<tr><td></br></td><td></br></td></tr>

						<tr class="register_table_tr">
							<td class="register_table_td_text">
								<div class="register_form_text"></div>
							</td>

							<td class="register_table_td">
								<input class="register_form_input" type="hidden" name="uuid" value="51241cf1-44f7-4116-9997-efe3ab945eb9" required="required" >
							</td>
						</tr>

						<tr class="register_table_tr">
							<td class="register_table_td"></td>
							<td class="register_table_td">
							<div class="register_form_submit">
							</div>
							</td>

						</tr>

						</table>
				</form>	
			</div></br></br></br></center>';
	require_once("footer.php");
	echo ' </body></html>';
?>
