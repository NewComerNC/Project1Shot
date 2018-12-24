<? 
    $response = [];
    $user_id = null;
    if (isset($_GET["user_id"])) {
        $user_id = $_GET["user_id"];
    }
    if (!is_null($user_id)) {
        $conn = new mysqli("localhost", "u344551662_1shot", "Teerapon4", "u344551662_1shot");
        if (!$conn->connect_error) {
            $sql = "SELECT Problem_type, Problem_detail, Location, Date_Time, statusp FROM Problem WHERE User_ID = " . $user_id;
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $index = 0;
                while ($row = $result->fetch_assoc()) {
                    $date_format = "d-m-Y";
                    $item = [
                        "problem_type" => $row["Problem_type"],
                        "problem_detail" => $row["Problem_detail"], 
                        "location" => $row["Location"],
                        "date_time" => date($date_format, strtotime($row["Date_Time"])), 
                        "statusp" => $row["statusp"]
                    ];
                    $response[$index] = $item;
                    $index += 1;
                }
            }
            mysqli_close($conn);
        }
    }
    echo json_encode($response);
?>
