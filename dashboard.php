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
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table class='table table-bordered table-striped'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Password</th>";
                    echo "<th>Full Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Is_Block</th>";
                    echo "<th>Permision</th>";
                    echo "<th>Option</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['fullname'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . ($row['is_block'] == 1) ? "Bị khóa" : "Không bị khóa";  "</td>";
                        echo "<td>" . ($row['permision'] == 0) ? "Thành viên thường" : "Admin"; "</td>";
                        echo "<td>";
                        echo "<a href='update.php?id=" . $row['id'] . "' title='Update Record' <i class='fa-solid fa-wrench icon_option'></i></a>";
                        echo "<a href='delete.php?id=" . $row['id'] . "' title='Delete Record' <i class='fa-solid fa-trash icon_option'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    // Giải phóng bộ nhớ
                    mysqli_free_result($result);
                } else {
                    echo "<p class='lead'><em>Không tìm thấy bản ghi.</em></p>";
                }
            } else {
                echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn);
            }
        ?>
    </div>
    <?php include "footer.php" ?>
</body>

</html>