<?php
// $conn=mysqli_connect("localhost","root","");
// mysqli_select_db($conn,"gruhudhyog_db");
$conn = new mysqli("localhost", "root", "", "gruhudhyog_db");
if ($conn->connect_errno) {
    echo "Error: " . $conn->connect_error;
}
?>