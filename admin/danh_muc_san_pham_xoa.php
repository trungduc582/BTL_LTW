<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thực hiện xóa</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<?php 
		$ma_sp=$_GET["id"];
		
			$sql="DELETE FROM `tbl_loai_san_pham` WHERE `tbl_loai_san_pham`.`ma_loai_san_pham` = '".$ma_sp."'";
			mysqli_query($con,$sql);
		
		//thực hiện truy vấn để thêm mới tin tức
		

		//thông báo thêm mới thành công và về trang tin tức
		echo 
		"
			<script types='text/javascript'>
					window.location.href='./danh_muc_san_pham.php'
			</script>	
		";
		;?>
</body>
</html>