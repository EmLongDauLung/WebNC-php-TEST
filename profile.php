<?php include("./header.php") ?>
    <style>
        .container__body{
            width: 100%;
            height: auto;
        }
        .container__profile{
            width:  80%;
            height: auto;
            margin: 50px auto;
        }
        .container__profile__title{
            width: fit-content;
            height: auto;
            padding: 4px 15px;
            margin: 0 0 18px 0;
            background-color: #397224;
            color: white;
            border-radius: 12px;
            font-size: 20px;
            font-weight: 700;
        }
    </style>
<body class="container__body">
    <div class="container__profile">
        <div class="container__profile__title">Bài viết của bạn</div>
        <?php 
        	// Lấy ra nội dung bài viết theo điều kiện id
            $sql = "select * from posts where user_id = '{$_SESSION['user_id']}'";
            // Thực hiện truy vấn data thông qua hàm mysqli_query
            $query = mysqli_query($conn,$sql);
            while ( $data = mysqli_fetch_array($query) ) {
                echo"
                <table class='table table-bordered table-striped'>
                    <td>
                        <h3>{$data['title']}</h3> </br>
                        <i> Ngày tạo: {$data['createdate']}</i>
                        <p>{$data['content']}</p>
                        <a href='showposts.php?id={$data['posts_id']}'> Xem thêm</a>
                    </td>
                </table>    
                ";
            }
        ?>
    </div>
</body>
<?php include("./footer.php") ?>