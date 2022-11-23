<?php
	session_start(); 
	include "./header.php";
	include "./permission.php";

	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$title = $_POST["title"];
		$content = $_POST["post_content"];
		$is_public = 0;
		if (isset($_POST["is_public"])) {
			$is_public = $_POST["is_public"];
		}
		
		$user_id = $_SESSION["user_id"];

		$sql = "INSERT INTO posts(title, content, user_id, is_public, createdate, updatedate ) VALUES ( '$title', '$content', '$user_id', '$is_public', now(), now())";
		// thực thi câu $sql với biến conn lấy từ file connection.php
		// mysqli_query($conn,$sql);
		$conn = mysqli_connect('127.0.0.1:3306', 'root', 'eldl', 'botstore');
		mysqli_query($conn,$sql);
		echo '<script language="javascript">alert("Đăng bài thành công!"); window.location="addposts-ck.php";</script>';
	}
?>
<body>
	<div class="posts">
		<form action="addposts-ck.php" method="POST">
				<table class="table table-bordered table-striped">
					<tr>
						<td colspan="2"><h3>Thêm bài viết mới</h3></td>
					</tr>	
					<tr>
						<td nowrap="nowrap">Tiêu đề bài viết :</td>
						<td><input type="text" id="title" name="title"></td>
					</tr>
					<tr>
						<td nowrap="nowrap">Nội dung :</td>
						<td><textarea name="post_content" id="post_content" rows="10" cols="150"></textarea></td>
					</tr>
					<tr>
						<td nowrap="nowrap">Public bài viết ?</td>
						<td><input type="checkbox" id="is_public" name="is_public" value="1"> Public</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Thêm bài viết"></td>
					</tr>

				</table>
		</form>
	</div>
</body>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'post_content' );
</script>
<?php include "./footer.php" ?>