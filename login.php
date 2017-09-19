<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	//连接数据库
	$mysqli = new mysqli("localhost","root","","blog","3306");
	//判断是否连接正确
	if($mysqli->connect_errno){
		die($mysqli->error);
	}

	//防止出现乱码
	$mysqli->query("set names utf8");
	
	$sql = "SELECT * FROM bloger WHERE username='$username' and password='$password'";
	$result = $mysqli->query($sql);
	
	if($result->num_rows>0){
		echo "登录成功";
//		echo '{"error":0,"msg":"登录成功"}';			//JSON字符串必须用单引号括起来，里面用双引号
	}else{
		echo "登录失败(请输入正确的用户名或密码)";
//		echo '{"error":1,"msg":"登录失败"}';
	}

?>