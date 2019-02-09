<?php
$servername = "localhost";
$username = "id8216725_rajesh";
$password = "gupta@123";
$dbname = "id8216725_api";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if($conn){
    $user_name = $_POST['user_name'];
    $user_pass = $_POST['password'];

    $mysql_qry ="select * from employee_data where username like '$user_name' and password like '$user_pass'";
    $result = $conn->query($mysql_qry);

    if ($result->num_rows > 0) {
        echo "Loging successfully";
    } else {
        echo "Login fails";
    }
    $conn->close();
}else{
    echo "fails";   
}?>