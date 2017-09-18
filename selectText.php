<?php
//取参数
	$pageNumber = $_GET["pageNumber"];
	$pageSize = $_GET["pageSize"];
//
	$start = $pageNumber * $pageSize;
	
	//连接数据库
	$mysqli = new mysqli("localhost","root","","blog","3306");
	if($mysqli->connect_errno){
		die($mysqli->connect_error);
	}
	
	//防止乱码
	$mysqli->query("set names utf8");	
	
	//设置主要语句
	
	$sql = "SELECT * FROM bloger WHERE Idete = 0 ORDER BY id DESC LIMIT $start,$pageSize";
//	$sql = "SELECT * FROM bloger WHERE Idete = 0 ORDER BY id DESC";
	
	$result = $mysqli->query($sql);
	$arr = array();
	while ($row = $result->fetch_assoc()) {
		array_push($arr,$row);
	}
	$jsonStr = json_encode($arr);
	echo $jsonStr;
	
	//关闭数据库
	$mysqli->close();
	
?>