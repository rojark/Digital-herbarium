<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die("Error");
}
$db="herbarium_db";
$db_con=mysql_select_db($db,$con);
if(!$db_con)
{
	die("DB not Connected");
}
?>