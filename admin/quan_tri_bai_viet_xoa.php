<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Xóa bài viết</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<?php 
		$ma_bai_viet=$_GET["id"];

		$sql="DELETE FROM `tbl_bai_viet` WHERE `tbl_bai_viet`.`ma_bai_viet` = '".$ma_bai_viet."'";
		//thực hiện truy vấn để thêm mới tin tức
		mysqli_query($con,$sql);

		//thông báo thêm mới thành công và về trang tin tức
		echo 
		"
			<script types='text/javascript'>
			window.location.href='./quan_tri_blog.php'
			</script>	
		";
		;?>
</body>
</html>