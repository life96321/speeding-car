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
		$sql2 = "SELECT count(id) FROM paim";
		$result2 = mysql_query($sql2);
		while ($arr = mysql_fetch_array($result2)) {
			//echo $arr[0];
			$max = $arr[0];	
			echo intval(100-100*$a/$max).'%';
		}
		break;
	}
?>
<?php } ?>

