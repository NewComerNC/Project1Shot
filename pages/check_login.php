<?php 
include 'connect_db.php';
session_start();
$strSQL = "SELECT * FROM Admin WHERE admin_user = '".mysqli_real_escape_string($conn,$_POST['ad_name'])."' 
and admin_pass = '".mysqli_real_escape_string($conn,$_POST['ad_pass'])."'";
$objQuery = mysqli_query($conn,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
			if(!$objResult)
			{
				header( "location: login.php?error_message=Username or Password is invalid!");
				exit(0);
			}
	else
	{
			$_SESSION["admin_user"] = $objResult["admin_user"];
			$_SESSION["status"] = $objResult["status"];
			$_SESSION["Problem_type"] = $objResult["Problem_type"];

			session_write_close();
			
			if($objResult["status"] == "ADMIN" or $objResult["status"] == "HEADADMIN")
			{
				header("location:admin_page.php");
			}
			
	}
	mysqli_close($objCon);
?>
	<!--if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
            $_SESSION["admin_user"] = $objResult["admin_user"];
			$_SESSION["status"] = $objResult["status"];

			session_write_close();
			
			if($objResult["status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
	}
	mysqli_close($conn); */ -->
	
