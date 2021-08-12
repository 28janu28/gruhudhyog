<?php

// create connection
$conn = new mysqli("localhost", "root", "", "gruhudhyog_db");

$username = mysqli_real_escape_string($conn, $_REQUEST['unm']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$password = mysqli_real_escape_string($conn, $_REQUEST['psw']);
$hashed_password = md5($password);

$sql = "INSERT INTO user (name, email, password) values('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    // echo 'Done 6e...';
    header("Location: http://localhost/gruhudhyog/login.html?reg=success");
    exit();
} else {
    $conn->close();
    echo 'Locha paida...';
}

?>