<?php 
/*
数据库变量，需要提前在服务器中安装好MySQl数据库
创建：2018-02-04
作者：lkj
 */




$DB_HOST = "localhost";
$DB_USER = "webuser";
$DB_PASS = "yourpassword";  //需要修改成你设置的密码！！！！！！！！！！！！！！
$DB_NAME = "webuser";

date_default_timezone_set("UTC");
$conn=mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
if (!$conn)
{
	die('Could not connect database: ' . mysql_error()."  无法连接Mysql数据库，请联系管理员");
}
$db_selected = mysql_select_db($DB_NAME,$conn);
if (!$db_selected)
{
    // die ("Can\'t use databese DMace : " . mysql_error()."  无法连接pku-ds数据库，请联系管理员");
    // echo "<script>alert(hello);</script>";
    // include_once("firstlogin.php"); 
    // 首次登陆系统
	die("数据库不存在");
}
mysql_query("set names utf8");


//echo "连接数据库成功";

mysql_select_db($DB_NAME, $conn);
$result = mysql_query("SELECT * FROM tb_patient");
if(!$result){
    echo "该表不存在,准备创建表格:tb_patient";
    $sql = <<<EOT
    CREATE TABLE `webuser`.`tb_patient` ( 
    `id` INT(6) NOT NULL AUTO_INCREMENT , 
    `uname` VARCHAR(30) NOT NULL COMMENT '病人姓名' , 
    `uid` INT(6) NOT NULL COMMENT '门诊号或者住院号' , 
    `isSick` INT(1) NOT NULL COMMENT '是否复发转移：0否，1是' , 
    `utime` TIMESTAMP NOT NULL COMMENT '提交时间' , 
    `wechat` VARCHAR(30) NOT NULL COMMENT '微信号' , 
    `remark` TEXT COMMENT '留言' ,
    PRIMARY KEY (`id`)) CHARACTER SET utf8 COLLATE utf8_general_ci
EOT;

	    echo "<mark>";

	if (mysql_query($sql, $conn)) {
	    echo "数据表 tb_patient 创建成功";
	} else {
	    echo "创建数据表错误: " . mysql_error($conn);
	}   echo "</mark>";
}else{
	//echo "表存在！";
}

// mysql_close();
 ?>