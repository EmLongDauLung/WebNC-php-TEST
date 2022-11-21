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
        $query = mysqli_query($conn, "select * from users where username='$fusername' && password='$fpassword'");
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./assets/css/login.css"> -->
    <link rel="stylesheet" href="./assets/css/login_register.css">
    <script type="text/javascript" language="javascript" src="./main.js"></script>
    <link rel="stylesheet" href="./assets/fontawesome-free-6.1.1/css/all.min.css">
    <link rel="icon" href="./assets/img/small_logo.png">
    <title>BOT STORE</title>
</head>
<!-- body -->

<body id="body">
    <div class="body_container">
        <div class="body_left">
            <a href="index.php" class="body_left-linkhome">
                <img src="./assets/img/small_logo1.png" alt="">
                <img src="./assets/img/Logo.png" alt="Ảnh Logo" class="body_left-imgLogo">
            </a>
        </div>
        <div class="body_right">
            <div>
                <form method="POST">
                    <?php
                    if ($action == "login") {
                        if ($num_rows > 0) {
                            $_SESSION["logged"] = 1;
                            header("Location: dashboard.php");
                            // header("Location: index.php");
                        } else {
                            echo ('<span style="color: red;">*Login Fail</span>');
                        }
                    }
                    ?>
                    <div class="form__input">
                        <input type="text" name="username" placeholder="Tên Tài Khoản" class="body_right-inputlogin">
                        <span class="bar"></span>
                    </div>
                    <div class="form__input">
                        <input type="password" name="password" required="required" placeholder="Mật Khẩu" class="body_right-inputlogin">
                        <span class="bar"></span>
                    </div>
                    <!-- <input type="text" name="username" required="required" placeholder="Tên Tài Khoản" class="body_right-inputlogin">
                    <input type="password" name="password" required="required" placeholder="Mật Khẩu" class="body_right-inputlogin"> -->
                    <input type="hidden" id="action" name="action" value="login" />
                    <div class="body_right-login">
                        <button type="submit" class="form__button" name="dangnhap">Đăng Nhập</button>
                        <a href="#" class="body_right-forgotpass">Forgotten Password ?</a>
                    </div>
                </form>
            </div>
            <hr class="body_right-decoration">
            <div class="body_right__back">
                <a href="register.php" class="body_right-btncreateacc-login">Tạo tài khoản</a>
            </div>
        </div>
    </div>
</body>
<!-- end body -->

</html>