<?php
    // include("dbConnection.php");
    // $dbConnection = new dbConnection();
    // $conn = $dbConnection->getConnection();
    include("header.php");
	// Lấy 8 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
	$sql = "select * from posts where is_public = 1 order by createdate desc limit 8";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
?>  
    <style>
        .container_posts{
            margin: 50px;
        }
        .container_posts__add-link{
            text-decoration: none;
            color: white;
            width: 200px;
            height: auto;
            padding: 12px;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            background-color: #72af5c;
            border-radius: 8px;
        }
        .container_posts__add-link:hover{
            background-color: #397224;
            color: white;
        }
        .container_posts__add{
            margin-top: 40px;
        }
    </style>
    <main>
        <div class="container_posts">
            <table class="table table-bordered table-striped">
                
                <?php
                    // Khởi tạo biến đếm $i = 0
                    $i = 0;
                    // Lặp dữ liệu lấy data từ cơ sở dữ liệu
                    while ( $data = mysqli_fetch_array($query) ) {
                        // Nếu biến đếm $i = 4, tức là vòng lặp chạy tới bài viết thứ tư thì ta thực hiện xuống hàng cho bài viết kế tiếp
                        // Vì mỗi dòng hiển thị, ta chỉ hiển thị 4 bài viết
                        if ($i == 4) {
                            echo "</tr>";
                            $i = 0;
                        }
                ?>
                    <td >
                        <b><?php echo $data["title"];// In ra title bài viết ?></b>
                        <p><?php echo substr($data["content"], 0, 100)." ...";// In ra nội dung bài viết lấy chỉ 100 ký tự ?></p>
                        <a href="showposts.php?id=<?php echo $data["posts_id"]; // Tạo liên kết đến trang display.php và truyền vào id bài viết ?>"> Xem thêm</a>
                    </td>
                
                <?php
                        $i++;
                    }
                ?>
            </table>	
            <div class="container_posts__add">
                <a href="./addposts-ck.php" class="container_posts__add-link">Thêm bài viết</a>
            </div>
        </div>
        
    </main>
<?php include "footer.php" ?>