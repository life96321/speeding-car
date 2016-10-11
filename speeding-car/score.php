<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M . ":" . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");

$name = $_GET["name"];
$email = $_GET["email"];
$pass = $_GET["pass"];
$score = $_GET["score"];
$openid = $_GET["openid"];
$logo = $_GET["logo"];

$sql = "select * from paim where openid ='{$openid}'";
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
	//玩过
	//还需要判断当前分数和之前分数的比较
	$row = mysql_fetch_assoc($result);
	//如果原来的分数小于当前的分数，修改数据库中的分数
	if ($row["score"] < $score) {
		$sql = "update paim set score='{$score}' where openid ='{$openid}'";
		mysql_query($sql);
		if (mysql_affected_rows() > 0) {
			echo $score;
		} else {
			echo $row["score"];
		}
	} else {
		echo $row["score"];
	}
} else {
	//没玩过
	$sql = "insert into paim(name,score,email,pass,openid,logo) values('{$name}','{$score}','{$email}','{$pass}','{$openid}','{$logo}')";
	mysql_query($sql);
	if (mysql_insert_id() > 0) {
		echo $score;
	}
}
?>