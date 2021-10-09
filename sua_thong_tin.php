

<!DOCTYPE html>
<html>
<head>
	<title>Thực hiện cập nhật thông tin</title>
</head>
<body>
	<?php
		// 1. KẾT NỐI ĐẾN CSDL
	include './config.php';

		// 2. Lấy ra dữ liệu thu được từ FORM trước chuyển sang
		$ma = $_POST["txtMa"];
		$name = $_POST["txtname"];
		$sdt=$_POST["txtSDT"];
		$ten_dang_nhap = $_POST["txttendn"];
		$mat_khau = $_POST["re_password"];
		
			$sql="
				UPDATE `tbl_nguoi_dung`
				SET `ten_nguoi_dung` = '".$name."', 
					`ten_dang_nhap` = '".$ten_dang_nhap."', 
					`mat_khau` = '".$mat_khau."', 
					`so_dien_thoai` = '".$sdt."' 
				WHERE `tbl_nguoi_dung`.`ma_nguoi_dung` = ".$ma.";

			";

		// echo $sql; exit();

		// 4. Thực hiện truy vấn để thêm mới tin tức
		mysqli_query($con, $sql);

		// 5. Thông báo việc thêm mới tin tức thành công & đẩy người dùng quay về trang quan trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật thành công!');
			</script>
		";
		echo 
		"
			<script type='text/javascript'>
				window.history.back();
			</script>
		";
	;?>
</body>
</html> 