<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <script type="text/javascript" language="javascript" src="./assets/js/main.js"></script>
    <link rel="stylesheet" href="./assets/fontawesome-free-6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/posts.css">
    <!-- <script src="https://localhost/Webdemo/assets/ckeditor5-build-decoupled-document/ckeditor.js"></script> -->
    <script src="./assets/ckeditor/ckeditor.js"></script>
    <!-- <link rel="stylesheet" href="../bootstrap-5.2.2-dist/css/bootstrap-grid.css"> -->
    <link rel="stylesheet" href="./assets/bootstrap-5.2.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap-5.2.2-dist/js/bootstrap.js">
    <link rel="icon" href="./assets/img/small_logo.png">
    <title>BOT STORE</title>
</head>

<body>
    <!-- header -->
    <div id="header">
        <!-- header top -->
        <div class="header_top">
            <div class="header_top-intro">
                <div class="header_top-intro-support">
                    <div class="sp-child hotline">
                        <i class="fa-solid fa-phone icon-sup"></i>
                        <span>+84 969420123</span>
                    </div>
                    <div class="sp-child email">
                        <i class="fa-solid fa-at icon-sup"></i>
                        <span>botstore.vn@gmail.com</span>
                    </div>
                    <div class="sp-child question">
                        <i class="fa-solid fa-headset icon-sup"></i>
                        <span>Hỗ trợ trực tuyến 24/7</span>
                    </div>
                </div>
                <div class="header_top-intro-language">
                    Language
                    <i class="fa-solid fa-chevron-down icon_arrowdown"></i>
                    <ul class="language-child">
                        <li class="language_item">
                            <img src="./assets/img/flagVN.jpg" class="language-item_child flag">
                            <span class="language-item_child ">VietNam</span>
                        </li>
                        <li class="language_item">
                            <img src="./assets/img/la-co-vuong-quoc-anh.jpg" class="language-item_child flag">
                            <span class="language-item_child ">English</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end header top -->
        <!-- header mid -->
        <div class="header_mid">
            <!-- header mid top -->
            <div class="mid-top">
                <div class="logo">
                    <a href="./index.php">
                        <img src="./assets/img/Logo.png" alt="Logo" id="img_logo">
                    </a>
                </div>
                <div class="search">
                    <input type="text" placeholder="Tìm Kiếm..." class="input_search">
                    <div class="search-item">
                        <i class="fa-solid fa-magnifying-glass icon-search"></i>
                    </div>
                </div>
                <div class="login__cart__logout">
                    <div class="login__cart__logout-item login">
                        <?php
                            session_start();
                            include("dbConnection.php");
                            $dbConnection = new dbConnection();
                            $conn = $dbConnection->getConnection();
                            if($_SESSION['user_id'] == NULL){
                                echo"
                                    <a href='login.php' class='login_cart-item-link'>
                                        <div class='login-cart_item'>
                                            <i class='fa-solid fa-user'></i>
                                        </div>
                                    </a>
                                ";
                            }
                            else{
                                echo"
                                    <a href='profile.php' class='login_cart-item-link'>
                                        <div class='login-cart_item'>
                                            <i class='fa-solid fa-user'></i>
                                        </div>
                                    </a>
                                ";
                                echo "<span class='login__usersname'>{$_SESSION['fullname']}</span>";
                            }
                        ?>
                    </div>
                    <div class="login__cart__logout-item cart">
                        <a href="#" class="login_cart-item-link">
                            <div class="login-cart_item">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>
                        </a>
                    </div>
                    <?php
                        if($_SESSION['user_id'] != NULL)
                        {
                            echo"
                                <div class='login__cart__logout-item logout'>
                                    <a href='logout.php' class='login_cart-item-link'>
                                        <div class='login-cart_item'>
                                            <i class='fa-solid fa-right-from-bracket'></i>
                                        </div>
                                    </a>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
            <!-- end header mid top -->
            <!-- header mid bot -->
            <div class="mid-bot">
                <!-- menu left -->
                <button class="menu_left">
                    <i class="fa-solid fa-bars icon_list"></i>
                    Danh mục sản phẩm
                    <div class="menu_left-child">
                        <ul class="p-0">
                            <li class="menu_left-item">
                                Mô hình xe hơi
                            </li>
                            <li class="menu_left-item">
                                Mô hình Lego
                            </li>
                            <li class="menu_left-item">
                                <div class="menu_left-item-title">
                                    <div class="menu_left-item-title-child">Mô hình phim</div>
                                    <i class="fa-solid fa-angle-right icon_arrow-menulv2"></i>
                                </div>
                                <div class="menu_left-item-lv2">
                                    <ul class="p-0">
                                        <li class="menu_left-item-child">Marvel</li>
                                        <li class="menu_left-item-child">DC</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu_left-item">
                                Mô hình Transformer
                            </li>
                            <li class="menu_left-item">
                                <div class="menu_left-item-title">
                                    <div class="menu_left-item-title-child">Mô hình anime</div>
                                    <i class="fa-solid fa-angle-right icon_arrow-menulv2"></i>
                                </div>
                                <div class="menu_left-item-lv2">
                                    <ul class="p-0">
                                        <li class="menu_left-item-child">Naruto</li>
                                        <li class="menu_left-item-child">One Piece</li>
                                        <li class="menu_left-item-child">Dragon Ball</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu_left-item">
                                Mô hình Figger
                            </li>
                            <li class="menu_left-item">
                                <div class="menu_left-item-title">
                                    <div class="menu_left-item-title-child">Mô hình khác</div>
                                    <i class="fa-solid fa-angle-right icon_arrow-menulv2"></i>
                                </div>
                                <div class="menu_left-item-lv2">
                                    <ul class="p-0">
                                        <li class="menu_left-item-child">Mô hình cây mini</li>
                                        <li class="menu_left-item-child">Mô hình trang trí</li>
                                        <li class="menu_left-item-child">Mô hình PC</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </button>
                <!-- end menu left -->
                <!-- menu right -->
                <ul class="menu_right">
                    <li class="menu_right-item">
                        <a class="link_decor_remover hover-link" href="./index.php">Trang chủ</a>
                    </li>
                    <li class="menu_right-item">
                        <a class="link_decor_remover hover-link" href="./posts.php">Blog</a>
                    </li>
                    <li class="menu_right-item">
                        <a class="link_decor_remover hover-link" href="#">Thương hiệu</a>
                    </li>
                    <li class="menu_right-item">
                        <a class="link_decor_remover hover-link" href="#">Đơn hàng</a>
                    </li>
                    <li class="menu_right-item">
                        <a class="link_decor_remover hover-link" href="#">Trang cá nhân</a>
                    </li>
                </ul>
                <!-- end menu right -->
            </div>
            <!-- end header mid bot -->
        </div>
        <!-- end mid -->
        <!-- bot -->
        <!-- <div class="header_bot">
            <div class="header_bot-review">
                <img src="./assets/img/lego1.jpg" , alt="" id="img__bgreview">
                <div class="arrow_slide arrow_slide-left">
                    <i class="fa-solid fa-chevron-left icon_arrow-slide" onclick="prev()"></i>
                </div>
                <div class="arrow_slide arrow_slide-right">
                    <i class="fa-solid fa-chevron-right icon_arrow-slide" onclick="next()"></i>
                </div>
            </div>
        </div> -->
        <!-- end bot -->
    </div>
    <!-- end header -->
</body>