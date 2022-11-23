<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <!-- <link rel="stylesheet" href="./assets/bootstrap-5.2.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap-5.2.2-dist/js/bootstrap.js"> -->

    <style type="text/css">
        .btn{
            margin: 0px 0 16px 0px;
        }
        .icon_option{
            color: #72af5c;
            font-size: 18px;
        }
        .icon_option:hover{
            color: #397224;
        }

        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 16px;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <?php include "header.php" ?>
    <div class="container">
        <div class="page-header">
            <h2 class="pull-left">Người dùng</h2>
            <a href="create.php" class="btn btn-success pull-right">Thêm người dùng</a>
        </div>
        <?php
            include("dbConnection.php");
            $dbConnection = new dbConnection();
            $conn = $dbConnection->getConnection();
            $sql = "SELECT * FROM users";
            $query = mysqli_query($conn,$sql);
        ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Fullname</td>
                    <td>Email</td>
                    <td>Is_Block</td>
                    <td>Permision</td>
                    <td>Option</td>
                <tr>
            </thead>
            <tbody>
            <?php 
                while ( $data = mysqli_fetch_array($query) ) {
                    $i = 1;
                    $id = $data['id'];
            ?>
                <tr>
                    <!-- <td><?php echo $i; ?></td> -->
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><?php echo $data['fullname']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo ($data['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
                    <td><?php echo ($data['permision'] == 0) ? "Thành viên thường" : "Admin"; ?></td>
                    <td>
                        <a href="chinh-sua-thanh-vien.php?id=<?php echo $id;?>"><i class='fa-solid fa-wrench icon_option'></i></a>
                        <a href="quan-ly-thanh-vien.php?id_delete=<?php echo $id;?>"><i class='fa-solid fa-trash icon_option'></i></a>
                    </td>
                </tr>
            <?php 
                    $i++;
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
<?php include "footer.php" ?>