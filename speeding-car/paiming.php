<?php
header("Content-type:text/html;charset=utf-8");
mysql_connect(SAE_MYSQL_HOST_M . ":" . SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
mysql_select_db(SAE_MYSQL_DB);
mysql_query("set names utf8");
?>
<?php	
	//$name=$_GET["name"];
	$openid = $_GET["openid"];
	//order by score desc:根据score进行降序排列
	$sql="select * from paim order by score desc";
	$result=mysql_query($sql);
	
	$sql1 = "select * from paim where openid='{$openid}'";
	$result1=mysql_query($sql1);
    $row1= mysql_fetch_assoc($result1);
	$score=$row1["score"];
    $a=0;
	while($row=mysql_fetch_row($result)){
	$a++;
	if ($row[2] == $score) {
		echo $a;
		break;
	}
?>
<?php } ?>