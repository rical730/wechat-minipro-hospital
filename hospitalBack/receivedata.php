<?php 
/*
功能：Get接收参数，存入数据表中，若数据库中没有表格，就新建一个表格
参数：复旦大学附属中山医院胸外科病人术后随访
	病人姓名（请输入姓名）：uname
	病人ID（门诊号或住院号）:uid
	复发转移：是 否 : isSick
	留言（您有其他留言吗）：remark
返回值：
	1200：新记录插入数据库失败
	1201：成功插入
	1202：数据不完整
创建：2018-02-04
作者：lkj
 */


include_once("conn.php");
// echo "hello</br>";


// echo $tem;

//https://446763803.mylightsite.com/hospitalBack/receivedata.php?a=liming&b=12323&c=0&d=hello&e=mywechat

$uname = $_GET["a"];
$uid = $_GET["b"];
$isSick = $_GET["c"];
$remark = $_GET["d"];
$wechat = $_GET["e"];
// echo "收到: ".$uname.$uid.$isSick.date('Y-m-d H:i:s').$remark."</br>";

//检查非空状态
if ($uname != '' && $uid != '' && $isSick != '') {
	// mysql_query("set names utf8");
	mysql_select_db($DB_NAME, $conn);

	$sql = "INSERT INTO `tb_patient` (`id`, `uname`, `uid`, `isSick`, `utime`, `wechat`, `remark`) VALUES (NULL, '$uname', $uid, $isSick, CURRENT_TIMESTAMP, '$wechat', '$remark')";

	if(!mysql_query($sql, $conn)) {
		echo "1200";
		// echo mysql_error();
	}else {
		echo "1201";
		// echo "成功插入一条记录: ".$uname.$uid.$isSick.date('Y-m-d H:i:s').$remark;
	}
	
}else {
	echo "1202";
}




mysql_close();

 ?>