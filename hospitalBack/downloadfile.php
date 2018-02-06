<?php 

// $isRight = $_GET['text'];

// $isRight = (bool)$isRight;

// if($isRight){


$filename="hospitalBackInfo.xls";//先定义一个excel文件
 header("Content-Type: application/vnd.ms-execl");
 header("Content-Type: application/vnd.ms-excel; charset=utf-8");
 header("Content-Disposition: attachment; filename=$filename");
 header("Pragma: no-cache"); header("Expires: 0");
 //我们先在excel输出表头，当然这不是必须的
 echo iconv("utf-8", "gb2312", "id")."\t";
 echo iconv("utf-8", "gb2312", "病人姓名")."\t";
 echo iconv("utf-8", "gb2312", "门诊号")."\t";
 echo iconv("utf-8", "gb2312", "是否复发（0否，1是")."\t";
 echo iconv("utf-8", "gb2312", "提交时间")."\t";
 echo iconv("utf-8", "gb2312", "微信号")."\t";
 echo iconv("utf-8", "gb2312", "备注")."\n";//注意这个要换行

 //导入数据库的参数
include_once("conn.php");


 mysql_query('set names utf8');
 //需要加这句，不知道为什么，不然导出的中文乱码，大家在使用的时候，如果utf8乱码，就改为GBK，反正也可以
 $sql="select id,uname,uid,isSick,utime,wechat,remark from tb_patient";
 $result=mysql_query($sql,$conn); //查询的表条件
 while($row =mysql_fetch_array($result)){
     echo iconv("utf-8", "gb2312", $row['id'])."\t";
     echo iconv("utf-8", "gb2312", $row['uname'])."\t";
     echo iconv("utf-8", "gb2312", $row['uid'])."\t";
     echo iconv("utf-8", "gb2312", $row['isSick'])."\t";
     echo iconv("utf-8", "gb2312", $row['utime'])."\t";  
     echo iconv("utf-8", "gb2312", $row['wechat'])."\t";  
     echo iconv("utf-8", "gb2312", $row['remark'])."\n"; 
 }




// }

 ?>