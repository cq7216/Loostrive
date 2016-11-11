<?php
$host="115.28.138.228";
$db_user="root"; //用户名
$db_pass="1qaz@wsx,."; //密码
$db_name="no16street"; //数据库名
$timezone="Asia/Shanghai";

$link=mysql_connect($host,$db_user,$db_pass);
mysql_select_db($db_name,$link);
mysql_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间
?>
