<?php
	
	$id = $_GET["id"];
	
	$mysqli = new mysqli("localhost","root","","blog","3306");
	if($mysqli -> connect_errno){		
		die($mysqli -> connect_error);		
	}

//删除一个数据表，并不是真正意义上删除，只是不显示，但还保存在数据库中，可看做是修改这个数据字段让它不显示。	
	$sql = "UPDATE bloger SET Idete=1 WHERE id = $id";		
	
	$mysqli->query("set names utf8");	
	
	$result = $mysqli->query($sql);
	if($result){
		echo "删除成功";
	}
	
	//关闭数据库
	$mysqli->close();

?>




















