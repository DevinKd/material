<?php

$ICP="苏ICP备17058219号";
if (isset($_SERVER["SERVER_NAME"])&&strstr($_SERVER["SERVER_NAME"],"ailao.site")) 
{
	$ICP="苏ICP备19057189号-1";
}

if (isset($_SERVER["SERVER_NAME"])&&strstr($_SERVER["SERVER_NAME"],"198381.com")) 
{
	$ICP="苏ICP备17058219号-2";
}

if (isset($_SERVER["SERVER_NAME"])&&strstr($_SERVER["SERVER_NAME"],"198382.com")) 
{
	$ICP="苏ICP备17058219号-1";
}

if (isset($_SERVER["SERVER_NAME"])&&strstr($_SERVER["SERVER_NAME"],"red-arrows.com.cn")) 
{
	$ICP="苏ICP备17058219号-2";
}

if (isset($_SERVER["SERVER_NAME"])&&strstr($_SERVER["SERVER_NAME"],"red-arrows.cn")) 
{
	$ICP="苏ICP备17058219号-2";
}

if (isset($_SERVER["SERVER_NAME"])&&strstr($_SERVER["SERVER_NAME"],"19871231.com")) 
{
	$ICP="苏ICP备17058219号-2";
}

echo '
<div class="main"></div>
<footer><center>

<div  style="font-size:100%;background-color:#686868;";>
</br>
	Copyright (C)  2018/06/22 - Present , <a href="https://github.com/red-arrows">
	<font color="white"> Red-Arrow </font></a><font color="white">Intelligent Technology Co. Ltd. </font>
	<a href="https://beian.miit.gov.cn/" target="_blank" class="text"><font color="white">'.$ICP.'</font><br></a>
</br>
</div>

</center></footer>';

?>

