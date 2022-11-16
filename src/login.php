<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <script type="text/javascript" language="javascript" src="../main.js"></script>
    <link rel="stylesheet" href="../assets/fontawesome-free-6.1.1/css/all.min.css">
    <link rel="icon" href="../assets/img/small_logo.png">
    <title>BOT STORE</title>
</head>
    <!-- body -->
<body id="body">
    <div class="body_container">
        <div class="body_left">
            <a href="../index.php" class="body_left-linkhome">
                <img src="../assets/img/small_logo1.png" alt="">
                <img src="../assets/img/Logo.png" alt="Ảnh Logo" class="body_left-imgLogo">
            </a>
        </div>
        <div class="body_right">
            <div>
                <form action="login.php" method="POST">
                    <input type="text" name="username" required="required" placeholder="Email hoặc Số Điện Thoại" class="body_right-inputlogin">
                    <input type="password" name="password" required="required" placeholder="Mật Khẩu" class="body_right-inputlogin">
                    <div class="body_right-login" id="login">
                        <button class="body_right-btnlogin" name="dangnhap">Đăng Nhập</button> <br>
                        <a href="#" class="body_right-forgotpass">Forgotten Password ?</a>
                    </div>
                    <?php require 'xulylogin.php'; ?>
                </form>
            </div>
            <hr class="body_right-decoration">
            <div>
                <a href="./register.php" class="body_right-btncreateacc-login">Tạo tài khoản</a>
            </div>
        </div>
    </div>
</body>
    <!-- end body -->
</html>