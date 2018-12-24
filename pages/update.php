<?php
include 'connect_db.php';
ini_set('display_errors', 1);
error_reporting(~0);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
    } 

    $strProbID = $_GET['Problem_ID'];
    
    $selectProblemSql = "SELECT * FROM Problem WHERE Problem_ID = ".$strProbID;
    
    $problem = mysqli_query($conn, $selectProblemSql);
    
    while ($fieldinfo = mysqli_fetch_object($problem)) {
        $userID = $fieldinfo->User_ID;
    }

    mysqli_free_result($problem);

    //เปลื่ยนสเตตัสเป็น 1
    $upstatus = "UPDATE Problem SET statusp = 1 WHERE Problem_ID = $strProbID";
    mysqli_query($conn,$upstatus);
    // บวกคะแนนให้ user
    
    $findUserSql = "SELECT * FROM User WHERE User_ID = '".$userID."'";
    
    $user = mysqli_query($conn, $findUserSql);
    
    while ($fieldinfo = mysqli_fetch_object($user)) {
        $userPoint = $fieldinfo->User_Point;
    }
    
    mysqli_free_result($user);
    
    $userPoint = $userPoint + 1;
    
    $updateUserSql = "UPDATE User SET User_Point = ".$userPoint." WHERE User_ID = '".$userID."'";
    
    $query = mysqli_query($conn, $updateUserSql);
    
    $enpic = "SELECT * FROM Problem WHERE Pic = '".$pic_base64."'";
    $base64 = base64_encode($enpic);
    
    //ย้ายข้อมูลไปลง table Problem_History
  //  $insert = "INSERT INTO Problem_History (User_ID,Problem_type,Problem_detail,Location,Location_detail//,Date_Time,Pic,status) SELECT User_ID,Problem_type,Problem_detail,Location,Location_detail,Date_Time//,Pic,status FROM Problem WHERE Problem_ID = $strProbID";
    
	//$objQuery = mysqli_query($conn,$insert);
    
  //  $delete = "DELETE FROM Problem WHERE Problem_ID = $strProbID";
//    $query = mysqli_query($conn,$delete);
    
	if($query) {
		header( "Location: ../pages/admin_page.php" );
	} else {
	    echo 'error' .mysqli_error($conn);
	}
    
    mysqli_close($conn);
      	
?>
























<!--
    $sql = "UPDATE Problem_History SET
            Problem_ID = '".$_POST["txtName"]."' ,
			WHERE User_ID = '".$_POST["txtEmail"]."' ,
			Problem_type = '".$_POST["txtCountryCode"]."' ,
			Problem_detail = '".$_POST["txtBudget"]."' ,
			Location = '".$_POST["txtUsed"]."'
			Location_detail = '".$_POST["txtCustomerID"]."' 
			Date_Time = '".$_POST["txtCustomerID"]."'
			Pic = '".$_POST["txtCustomerID"]."' 
			status = '".$_POST["txtCustomerID"]."' ";
			
	$query = mysqli_query($conn,$sql);
	if($query) {
	 echo "Record update successfully";
	}



body = $POST["JSON body"]

submitData(body.userCode, body.problem, body.locationDetail);

function submitData(userCode, problem ,locationDetail) {
  
  saveProblem()
      
  User user = selectUser("SELECT * FROM USER WHERE id = userCode");
  
  point = user.point + 1;
  
  if(user != null) {
     
      updatePoint("UPDATE USER SET POINT = point");
      
     
      
    }
  
  saveNewTable("INSERT INTO NEW_TABLE VALUES ()");
  
  deleteProblem("DELETE PROBLEM WHERE ")
  
      
 
}
-->