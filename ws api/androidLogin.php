<?php
    include 'connect_db.php';
    
    // return response header as application/json
    header('Content-Type: application/json');
    
    // receive data from request body
    $postdata = file_get_contents("php://input");
    
    // read body as JSON object
    $jsonBody =  json_decode($postdata);
    
    $response = array();
    
    // check valus is exist on JSON object
    if(isset($jsonBody->username) && isset($jsonBody->password)) {
        
        $userName = $jsonBody->username;
        $password = $jsonBody->password;
        
        $strSQL = "SELECT * FROM User WHERE BINARY User_ID = '".$userName."' AND BINARY User_Password = '".$password."'"; 
    	$objQuery = mysqli_query($conn,$strSQL);
    	$objResult = mysqli_fetch_array($objQuery);
		if($objResult) {
		    
		    $response['status'] = "SUCCESS";
            $response['description'] = "Successful login.";  

    	} else {
    	    
    	    $response['status'] = "FAILED";
            $response['description'] = "Username or password is incorrect.";
            
    	}
    mysqli_close($conn); 
    	
    }
    // Value is not exist on JSON object response as error
    else {
        $response['status'] = "FAILED";
        $response['description'] = "Can't find username and password in JSON request body.";
    }
    
    // return as JSON object
    echo json_encode($response);
?>