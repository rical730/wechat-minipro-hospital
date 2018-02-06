<?php 
/*
下载数据库资料到excel
需要通过密码验证才能下载
密码：wuyulunbi

创建：2018-02-04
作者：lkj

 */



 ?>
<input type="password" id="pwd" />
<button>下载</button>


<script src="https://cdn.bootcss.com/jquery/1.8.1/jquery.js"></script>

 <script type="text/javascript">

$('button').click(function(){
	var pwd =  $("#pwd").val();
	console.log(pwd)
	if(pwd == "wuyulunbi"){
		console.log("right");
		// $.ajax({
		// 	type:'GET',
		// 	url:"downloadfile.php",
		// 	data:{text:1},
		// 	success: function(data){
		// 		alert("下载成功，页面即将关闭");
		// 		console.log(data);
		// 		window.close();
		// 	}
		// }); 
		window.location.replace("downloadfile.php");
	}else{
		alert("密码输入错误");
	}
	
	return false;
});



 </script>