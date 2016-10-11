<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M . ":" . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");

$logo=array();
$sql = "select * from paim order by score desc limit 0,8";
$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
	$arr[] = $row;
}
while ($row1 = mysql_fetch_row($result)) {
	array_push($logo, $row[6]);
}
echo json_encode($arr);
?>

