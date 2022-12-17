<?php
    include("../../dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/fontawesome-free-6.1.1/css/all.min.css">
    <link rel="icon" href="../../assets/img/small_logo.png">
    <style type="text/css">
        .btn {
            margin: 0px 0 16px 0px;
        }

        .icon_option {
            color: #72af5c;
            font-size: 18px;
        }

        .icon_option:hover {
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
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid ">
            <a class="navbar-brand text-white" href="#">ADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white navlinks" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white navlinks" href="#">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white navlinks" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white navlinks" href="dashboard-fix.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white navlinks" href="../../index.php">Return to shop</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h2 class="pull-left">Người dùng</h2>
            <a href="adduser.php" class="btn btn-success pull-right">Thêm người dùng</a>
        </div>
        <?php
        $sql = "SELECT * FROM users";
        $query = mysqli_query($conn, $sql);
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
                while ($data = mysqli_fetch_array($query)) {
                    $i = 1;
                    $id = $data['user_id'];
                ?>
                    <tr>
                        <!-- <td><?php echo $i; ?></td> -->
                        <td><?php echo $data['user_id']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['password']; ?></td>
                        <td><?php echo $data['fullname']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo ($data['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
                        <td><?php echo ($data['permision'] == 0) ? "Thành viên thường" : "Admin"; ?></td>
                        <td>
                            <a href="chinh-sua-thanh-vien.php?id=<?php echo $id; ?>"><i class='fa-solid fa-wrench icon_option'></i></a>
                            <a href="quan-ly-thanh-vien.php?id_delete=<?php echo $id; ?>"><i class='fa-solid fa-trash icon_option'></i></a>
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
