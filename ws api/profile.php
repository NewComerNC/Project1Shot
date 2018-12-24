<?php
    include 'connect_db.php';
    
    // return response header as application/json
    header('Content-Type: application/json');
    
    // receive data from request body
    $postdata = file_get_contents("php://input");
    
    // read body as JSON object
    $jsonBody =  json_decode($postdata);
    
    $response = array();
    
    
        
        $strSQL = "SELECT * FROM User WHERE BINARY User_ID = '".$user_id."' AND BINARY User_Name = '".$User_Name."'AND BINARY User_Surname = '".$User_Surname."'AND BINARY User_Point = '".$User_Point."'"; 
    	$objQuery = mysqli_query($conn,$strSQL);
    	$objResult = mysqli_fetch_array($objQuery);
		if($objResult) {
		    
		    $response['user_name'] = "$User_Name";
            $response['user_surname'] = "$User_Surname"; 
            $response['user_point'] = "$User_Point"; 
            

    	
    	}
    mysqli_close($conn); 
    
    // return as JSON object
    echo json_encode($response);
?>