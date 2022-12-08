<?php include "header.php" ?>
<?php 
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    if(isset($_GET['action'])){
        function update_cart($add = false) {
            foreach ($_POST['quantity'] as $id => $quantity){
                if($quantity == 0){
                    unset($_SESSION['cart'][$id]);
                }
                else{
                    if($add){
                        $_SESSION['cart'][$id] += $quantity;
                    }
                    else{
                        $_SESSION['cart'][$id] = $quantity;
                    }
                }
            }
        }
        switch($_GET['action']){
            case "add":
                foreach ($_POST['quantity'] as $id => $quantity){
                        $_SESSION['cart'][$id] = $quantity;
                }
                break;
            case "delete":
                if(isset($_GET['id'])){
                    unset($_SESSION['cart'][$_GET['id']]);
                }
                break;
            case "submit":
                if(isset($_POST['update__totalmoney'])){
                    update_cart();
                }
                elseif(isset($_POST['btn__order'])){

                }
                break;
        }
    }
    if(!empty($_SESSION['cart'])){
        $sql_cart = "SELECT * FROM products WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")";
        $products = mysqli_query($conn, $sql_cart);
    }
?>
<body class="body">
    <div class="cart_container">
        <div class="cart_title">Giỏ hàng</div>
        <form action="cart.php?action=submit" method="POST">
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>STT</th>
                        <th scope='col'>Tên sản phẩm</th>
                        <th scope='col'>Ảnh sản phẩm</th>
                        <th scope='col'>Số lượng</th>
                        <th scope='col'>Giá</th>
                        <th scope='col'>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        $num = 1;
                        if(mysqli_num_rows($products) == 0){
                            echo"Bạn chưa chọn sản phẩm nào";
                        }
                        else{
                            while ($row = mysqli_fetch_array($products)){
                                echo "
                                <tr>
                                    <td scope='col'>$num</td>
                                    <td scope='col'>{$row['title']}</td>
                                    <td scope='col'><img src='./assets/img/{$row['image']}'' style ='width: 130px; height: auto;'></td>
                                    <td scope='col'><input type='text' value='{$_SESSION['cart'][$row['product_id']]}' name='quantity[{$row['product_id']}]' size='2' style ='text-align: center;'></td>
                                    <td scope='col'>{$row['price']}</td>
                                    <td scope='col'><a href='cart.php?action=delete&id={$row['product_id']}' style='color:#72af5c;'><i class='fa-solid fa-trash'></i></a></td>
                                </tr>
                                ";
                                $num++;    
                            }   
                        }
                        ?>
                    <tr>
                        <td scope='col'>&nbsp;</td>
                        <td scope='col'>Tổng tiền</td>
                        <td scope='col'>&nbsp;</td>
                        <td scope='col'>&nbsp;</td>
                        <td scope='col'>10000</td>
                        <td scope='col'>&nbsp;</td>
                    </tr>
                    <?php

                    ?>
                </tbody>
            </table>
            <div class="text-center">
                <input type="submit" name="update__totalmoney" value="Cập nhật" class="btn__submit__money-order">
                <input type="submit" name="btn__order" value="Đặt hàng" class="btn__submit__money-order">
            </div>
        </form>
    </div>
</body>
<?php include "footer.php" ?>