<?php
    include("dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    include("header.php");
	// Lấy 16 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
	$sql = "select * from posts where is_public = 1 order by createdate desc limit 8";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
?>  
    <style>
        .innertube{
            margin: 50px;
        }
    </style>
    <main>
        <div class="innertube">
            <table class="table table-bordered table-striped">
                <tr>
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
                        <a href="showposts.php?id=<?php echo $data["id"]; // Tạo liên kết đến trang display.php và truyền vào id bài viết ?>"> Xem thêm</a>
                    </td>
                
                <?php
                        $i++;
                    }
                ?>
            </table>	
        </div>
    </main>
<?php include "footer.php" ?>