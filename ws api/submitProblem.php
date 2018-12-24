<?php
    include 'connect_db.php';
    
    // return response header as application/json
    header('Content-Type: application/json');
    
    // receive data from request body
    $postdata = file_get_contents("php://input");
    
    // read body as JSON object
    $jsonBody =  json_decode($postdata);
    
    $response = array();
    
    // check valus is exist on JSON object s
    if(isset($jsonBody->studentCode) 
    && isset($jsonBody->problemTitle) 
    && isset($jsonBody->problemDetail)
    && isset($jsonBody->building)
    && isset($jsonBody->locationDetail)
    && isset($jsonBody->problemImage)) {
        
        $studentCode = $jsonBody->studentCode;
        $problemTitle = $jsonBody->problemTitle;
        $problemDetail = $jsonBody->problemDetail;
        $building = $jsonBody->building;
        $locationDetail= $jsonBody->locationDetail;
        $problemImage = $jsonBody->problemImage;
        
        $strSQL = "INSERT INTO Problem (User_ID,Problem_type,Problem_detail,Location,Location_detail,Date_Time,Pic,statusp) VALUE ('".$studentCode."','".$problemTitle."','".$problemDetail."','".$building."','".$locationDetail."','".$date = date("Y-m-d H:i:s")."','".$problemImage."','0')";
    	$objQuery = mysqli_query($conn,$strSQL);
        if($objQuery) {
            $response['status'] = "SUCCESS";
            $response['description'] = "Successful";  
        } else {
            $response['status'] = "FAILED";
            $response['description'] = "";
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