<?php
    include("../../dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    session_start(); 

	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$password = $_POST["password"];
		$name = $_POST["fullname"];
		$email = $_POST["email"];
		$permission = $_POST["permission"];
		$is_block = 0;
		if (isset($_POST["is_block"])) {
			$is_block = $_POST["is_block"];
		}

		if ($username == "" || $password == "" || $name == "" || $permission == "") {
			echo "Bạn cần điền đầy đủ thông tin !";
		}else{
			// Viết câu lệnh thêm thông tin người dùng
			$sql = "INSERT INTO users (username, password, fullname, permision, is_block, createdate) VALUES ('$username', '$password', '$name', '$permission', '$is_block', now())";
			// thực thi câu $sql với biến conn lấy từ file connection.php
			$result = mysqli_query($conn,$sql);
			if (!$result) {
				echo "Người dùng đã tồn tại vui lòng không trùng username!";
			}else{
				header('Location: dashboard-fix.php');
			}
			
		}
		
	}
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
    <link rel="stylesheet" href="../../assets/css/manageruser.css">
    <link rel="icon" href="../../assets/img/small_logo.png">
</head>

<body>
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
	<div class="add__user">
		<form method="POST" action="">
            <table class="table">
                <thead>
                    <tr>
                        <td class="user__new__title">Username</td>
                        <td class="user__new__title">Password</td>
                        <td class="user__new__title">Fullname</td>
                        <td class="user__new__title">Is_Block</td>
                        <td class="user__new__title">Permision</td>
                    <tr>
                </thead>
                <tbody>
                    <tr>
                        <td  class="user__new__title">
                            <input type="text" class="user__new" name="username" id="username">
                        </td>
                        <td  class="user__new__title">
                            <input type="password" class="user__new" name="password" id="password">
                        </td>
                        <td  class="user__new__title">
                            <input type="text" class="user__new" name="fullname" id="fullname">
                        </td>
                        <td  class="user__new__title">
                            <input type="checkbox" class="user__new" name="is_block" value="1">
                        </td>
                        <td  class="user__new__title">
                        <select id="permission" name="permission">
                            <option value="0">Thành viên thường</option>
                            <option value="1">Admin cấp 1</option>
                            <option value="2">Admin cấp 2</option>
                        </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="btn__add__user">Thêm Thành Viên</div>
		</form>
	
	</div>
</body>