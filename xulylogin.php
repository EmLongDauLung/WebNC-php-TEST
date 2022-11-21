<?php
session_start();
require_once("functions.php");

$username = getValue("username", "POST", "str", "");
$password = getValue("password", "POST", "str", "");
$action = getValue("action", "POST", "str", "");


// var_dump($_POST);
// var_dump($username);
// var_dump($password);
// var_dump($action);

$errorMsg = "";

$Message = $ErrorUname = $ErrorPass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = check_input($_POST["username"]);

        if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            $ErrorUname = "Space and special characters not allowed but you can use underscore(_).";
        } else {
            $fusername = $username;
        }

        $fpassword = check_input($_POST["password"]);

        if ($ErrorUname != "") {
            $Message = "Login failed! Errors found";
        } else {
            include("dbConnection.php");
            $dbConnection = new dbConnection();
            $conn = $dbConnection->getConnection();
            $query = mysqli_query($conn, "select * from member where username='$fusername' && password='$fpassword'");
            $num_rows = mysqli_num_rows($query);
            $row = mysqli_fetch_array($query);
        }
    }

    function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>