<?php
//取参数
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	//创建数据库对象
	$mysqli = new mysqli("localhost","root","","blog","3306");
	if($mysqli->connect_errno){
		die($mysqli->error);			//die()函数输入一条信息，并推出当前脚本
	}
	
	//防止出现乱码
	$mysqli->query("set names utf8");		//注意utf8，不需要加-
	
	$sql = "SELECT * FROM bloger WHERE username = '$username'";
	
	//获取服务器的时间
	date_default_timezone_set("Asia/Shanghai");
	$rtime = $_SERVER["REQUEST_TIME"];
	
	$result = $mysqli->query($sql);
	if($result->num_rows > 0){
		echo "用户名已存在，请更换其他用户名进行注册";
	}else{
		if($username != "" && $password != ""){
			$sql2 = "INSERT INTO bloger(username,password,rtime,Idete) VALUE ('$username','$password','$rtime','2')";
			$result2 = $mysqli->query($sql2);
			var_dump($result2);
			if($result2){
				echo "注册成功";
			}
		}
		else{
			echo "请输入有效用户名";
		}
	}

?>