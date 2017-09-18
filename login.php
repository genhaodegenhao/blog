<?php
//取参数
	$username = $_GET["username"];
	$password = $_GET["password"];
	
	//连接数据库
	$mysqli = new mysqli("localhost","root","","blog","3306");
	if($mysqli->connect_errno){
		die($mysqli->connect_error);
	}
	//防止乱码
	$mysqli->query("set names utf8");	
	
	//设置主要语句
	
	$sql = "SELECT * FROM bloger WHERE username='$username' and password='$password'";
	
	$result = $mysqli->query($sql);
    $row=mysqli_num_rows($result);
	
	if($row > 0){
       echo "OK";
    }
	
	//关闭数据库
	$mysqli->close();
	
?>	