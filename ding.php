<?php

	$addcount = $_GET["addcount"];
	$id = $_GET["id"];
	
	$mysqli = new mysqli("localhost","root","","blog","3306");
	if($mysqli->connect_errno){
		die($mysqli->connect_error);
	}
	$mysqli->query("set names utf8");
	
	$sql = "UPDATE bloger SET addcount = $addcount WHERE id = $id";
	
	$result = $mysqli->query($sql);
	if($result){
		echo "success";
	}
	
	$mysqli->close();




?>