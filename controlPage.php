<?php

	$mysqli = new mysqli("localhost","root","","blog","3306");
	if($mysqli->connect_errno){
		die($mysqli->connect_error);
	}
	$mysqli->query("set names utf8");
	
	$sql = "SELECT COUNT (*) AS count FROM bloger WHERE Idete = 0";
	
	$result = $mysqli->query($sql);
	$row = $result->fetch_assoc();
	$jsonStr = json_encode($row);
	echo $jsonStr;
	
	$mysqli->close();
	
?>