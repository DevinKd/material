<?php

class Cpage
{
	function main_page($img="",$pagefile="",$link="",$href="",$text="",$width=110,$height=110,$footer="footer.php",$header="header.php")
	{
		echo '<html><body><div class="main">';

		if($link!="") echo $link;
		if($header!="") require_once($header);
		
		if($img!="") echo '<center><br /> <img border="0" src="'.$img.'" width="'.$width.'" height="'.$height.'"/><br />';
		else echo '<center><br />';

		if($href!="") echo $href;
		if($text!="") echo $text;

		if($pagefile!="") require_once($pagefile);

		echo '</center></div><footer>';
		if($footer!="")  require_once($footer);
		echo ' </footer></body></html>';

	}

	function add_page($img,$actionpage,$footer="footer.php")
	{
		echo '<html><body><div class="main">';
		require_once("header.php");
		$url = new Curl();
		$url->add_form($img,$actionpage,$TITLE,$URL,$LOGO,$TYPE,$STATUS,$REMARK,$AUTHOR,$PRIORITY,$SUBMIT);
		echo '</div><footer>';
		require_once($footer);
		echo ' </footer></body></html>';
	}

	function checkpoint_add_page($img,$actionpage,$footer="footer.php")
	{
		echo '<html><body><div class="main">';
		require_once("header.php");
		$chk = new Ccheckpoint();
		$chk->add_form($img,$actionpage,$ITEM,$INFO,$TYPE,$SCOPES,$OWNER,$STATUS,$REMARK,$AUTHOR,$PRIORITY,$SUBMIT);
		echo '</div><footer>';
		require_once($footer);
		echo ' </footer></body></html>';
	}

	function message_add_page($img,$actionpage,$footer="footer.php")
	{
		echo '<html><body><div class="main">';
		require_once("header.php");
		$mesg = new Cmessage();	
		$mesg->add_form($img,$actionpage);
		echo '</div><footer>';
		require_once($footer);
		echo ' </footer></body></html>';
	}

	function url_inquiry_page($db,$img_w=80,$img_h=80,$div=6,$td_w=100,$td_h=100,$logo=TRUE)
	{
		echo '<html><body><center> ';
		require_once("header.php");
		$url = new Curl();
		$url->inquiry($db,$img_w,$img_h,$div,$td_w,$td_h,$logo);
		echo '</center></body></html>';
	}

	function checkpoint_inquiry_page($db)
	{
		echo '<html><body><center> ';
		require_once("header.php");
		$chk = new Ccheckpoint();
		$chk->inquiry($db);
		echo '</center></body></html>';
	}
	
	function message_inquiry_page($db)
	{
		echo '<html><body><center> ';
		require_once("header.php");
		$mes = new Cmessage();
		$mes->inquiry($db);
		echo '</center></body></html>';
	}

	function people_add_page($img,$actionpage,$footer="footer.php")
	{
		echo '<html><body><div class="main">';
		require_once("header.php");
		$people = new Cpeople();	
		$people->add_form($img,$actionpage);
		echo '</div><footer>';
		require_once($footer);
		echo ' </footer></body></html>';
	}

	function people_inquiry_page($db)
	{
		echo '<html><body><center> ';
		require_once("header.php");
		$people = new Cpeople();
		$people->inquiry($db);
		echo '</center></body></html>';
	}
}

?>
