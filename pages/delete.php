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
    // ลบคะแนน user 
     $findUserSql = "SELECT * FROM User WHERE User_ID = '".$userID."'";
    
    $user = mysqli_query($conn, $findUserSql);
    
    while ($fieldinfo = mysqli_fetch_object($user)) {
        $userPoint = $fieldinfo->User_Point;
    }
    
    mysqli_free_result($user);
    
    $userPoint = $userPoint - 3;
    
    $updateUserSql = "UPDATE User SET User_Point = ".$userPoint." WHERE User_ID = '".$userID."'";
    
    $query = mysqli_query($conn, $updateUserSql);
    
// sql to delete a record    
$sql = "DELETE FROM Problem WHERE Problem_ID ='$strProbID' ";
$query = mysqli_query($conn,$sql);

	if($query) {
		header( "Location: ../pages/admin_page.php" );
	} else {
	    echo 'error' .mysqli_error($conn);
	}
mysqli_close($conn);
?>