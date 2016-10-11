<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M . ":" . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");

$name = $_GET["name"];
$tel = $_GET["tel"];
$address = $_GET["address"];
$prize = $_GET["prize"];

$sql = "INSERT INTO `0301`.`new` (`name`, `tel`, `add`,`prize`) VALUES ('{$name}', '{$tel}', '{$address}','{$prize}')";
$result = mysql_query($sql); 
?>