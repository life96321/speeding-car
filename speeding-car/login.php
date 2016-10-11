<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M . ":" . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");


$gamename = $_GET["gamename"];
$email = $_GET["email"];
$pass = $_GET["pass"];
//$sql = "select * from paim where name ='{$name}'";
//$result = mysql_query($sql);
//if (mysql_num_rows($result) > 0) {
//	var_dump("此人信息已存在");
//}else{
	$sql = "INSERT INTO `0301`.`paim` (`name`, `email`, `pass`) VALUES ('{$gamename}', '{$email}', '{$pass}')";
	$result = mysql_query($sql); 
//}
?>