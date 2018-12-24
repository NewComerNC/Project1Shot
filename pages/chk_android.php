<?php
	$objConnect = mysql_connect("localhost","root","root");
	$objDB = mysql_select_db("mydatabase");

	//$_POST["strUser"] = "weerachai"; // for Sample
	//$_POST["strUser"] = "weerachai@1";  // for Sample

	$strUsername = $_POST["strUser"];
	$strPassword = $_POST["strPass"];
	$strSQL = "SELECT * FROM member WHERE 1 
		AND Username = '".$strUsername."'  
		AND Password = '".$strPassword."'  
		";
?>