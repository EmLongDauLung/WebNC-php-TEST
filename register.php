<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <script type="text/javascript" language="javascript" src="./main.js"></script>
    <link rel="stylesheet" href="./assets/fontawesome-free-6.1.1/css/all.min.css">
    <link rel="icon" href="./assets/img/small_logo.png">
    <title>BOT STORE</title>
</head>
    <!-- body -->
<body id="body">
    <div class="body_container">
        <div class="body_left">
            <a href="./index.php" class="body_left-linkhome">
                <img src="./assets/img/small_logo1.png" alt="">
                <img src="./assets/img/Logo.png" alt="Ảnh Logo" class="body_left-imgLogo">
            </a>
        </div>
        <div class="body_right">
            <div>
                <form action="register.php" method="POST">
                    <input type="text" name="username" placeholder="Tên Tài Khoản" class="body_right-inputlogin">
                    <input type="password" name="password" placeholder="Mật Khẩu" class="body_right-inputlogin">
                    <input type="password" placeholder="Nhập lại mật khẩu" class="body_right-inputlogin">
                    <input type="submit" name="dangky" class="body_right-btnlogin" value="Đăng ký"></input>
                    <div class="body_right-policy">
                        Bằng việc đăng kí, bạn đã đồng ý với BOT STORE về 
                        <a href="#" class="body_right-policy-item">Điều khoản dịch vụ</a>
                        & 
                        <a href="#" class="body_right-policy-item">Chính sách bảo mật </a>
                    </div>
                    <?php require 'xulyregister.php'; ?>
                </form>
            </div>
            <hr class="body_right-decoration">
            <div>
                <a href="login.php" class="body_right-btncreateacc-login">Quay lại</a>
            </div>
        </div>
    </div>
</body>
    <!-- end body -->
</html>