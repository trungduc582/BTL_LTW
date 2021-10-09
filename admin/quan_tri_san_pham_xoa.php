<?php
    include './header.php'; include '../config.php';?>
<!DOCTYPE html>
<html>

<head>
    <title>Thực hiện xoa sản phẩm</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<?php
		// 1. KẾT NỐI ĐẾN CSDL

		// 2. Lấy ID của san pham cần xóa
		$id = $_GET["id"];

		// echo $id_tin_tuc; exit();
		// 3. Viết câu lệnh SQL để xóa san pham có id thu được ở trên
		$sql = "
			DELETE FROM `tbl_san_pham` WHERE `tbl_san_pham`.`ma_san_pham` = '".$id."'
		";

		// echo $sql; exit();
		// 4. Thực hiện truy vấn để xóa san pham
		$result = mysqli_query($con, $sql);

		// 5. Thông báo việc xóa san pham thành công & đẩy người dùng quay về trang quan trị san pham
		if ($result) {
			
			echo 
			"
				<script type='text/javascript'>
					window.location.href='./quan_tri_san_pham.php'
				</script>
			";
		} else {
			echo 
			"
				<script type='text/javascript'>
					window.alert('Bạn đã xóa sản phẩm thất bại!');
				</script>
			";
			echo 
			"
				<script type='text/javascript'>
					window.location.href='./quan_tri_san_pham.php'
				</script>
			";
		}
		
	;?>
</body>
</html>