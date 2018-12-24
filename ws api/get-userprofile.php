<? 
  $response = [
      "name" => null,
      "point" => null
  ];
  $user_id = null;
  if (isset($_GET["user_id"])) {
      $user_id = $_GET["user_id"];
  }
  if (!is_null($user_id)) {
      $conn = new mysqli("localhost", "u344551662_1shot", "Teerapon4", "u344551662_1shot");
       if (!$conn->connect_error) {
          $sql = "SELECT User_Name, User_Surname, User_Point FROM User WHERE User_ID = " . $user_id . " LIMIT 1";
          $result = mysqli_query($conn, $sql);
          if ($result) {
              $fetch = mysqli_fetch_assoc($result);
              $name = $fetch["User_Name"];
              $surname = $fetch["User_Surname"];
              if (!is_null($name) && !is_null($surname)) {
                  $response["name"] = $name . ' ' . $surname;    
              }
              $response["point"] = $fetch["User_Point"];
          }
       }
      mysqli_close($conn);
  }
  echo json_encode($response);
?>
