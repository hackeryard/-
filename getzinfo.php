<?php
header("Content-Type:text/html;charset=utf-8");
session_start();

if(isset($_SESSION["username"]) && $_SESSION["username"] === "admin"){
	mysql_connect("localhost","root","12345678");
	mysql_select_db("bike");
	mysql_query("set names 'gbk'");

	$lid=$_GET["zone"];

	$sql = "select tid,username,bikeid,transfee from trans where lid='$lid' ";
	// $sql = "insert into bike(passwd, flag, typeid, xpos, ypos) values('112233','1','09',67,34)";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);

	if($num){
		$response = array();

		for($i = 0; $i < $num; $i++){
			$row = mysql_fetch_array($result);
			array_push($response, $row);
			// $response = $response . "bikeid:".$row[0]." xpos: ".$row[1]." ypos: ".$row[2];
			// $response = $response .$row[0].$row[1].$row[2];
			
		}
		$response = json_encode($response);
	}else{
		$response = json_encode($response);
	}
	echo $response;
}else{
	header("Location: ./login.html");
}
?>