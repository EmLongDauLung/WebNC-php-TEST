<?php
$servername = "localhost";
$database = "users";
$username = "root";
$password = "eldl";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($connect);
?>