<?php include './config.php';
	// 1. Đọc dữ liệu từ trang ĐĂNG Ký gửi sang
	$ten = $_POST["txtname"];
	$ten_dang_nhap = $_POST["txttendn"];
	$sdt = $_POST["txtSDT"];
	$re_mat_khau = $_POST["re_password"];
	$mat_khau = $_POST["password"];

	echo "Tài khoản: ".$ten_dang_nhap." ; Mật khẩu: ".$mat_khau;

	// 2. KẾT NỐI ĐẾN CSDL

	// 3. So sánh dữ liệu nhập vào có khớp với dữ liệu lưu trong CSDL hay không?
	if ($ten == NULL || $ten_dang_nhap == NULL || $sdt == NULL || $mat_khau == NULL || $re_mat_khau == NULL)
	{
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn nhập thiếu thông tin!');
			</script>
		";
		echo 
		"
			<script type='text/javascript'>
				window.location.href='dang_ky.php'
			</script>
		";
	}
	if ($re_mat_khau == $mat_khau && $ten != NULL && $ten_dang_nhap != NULL && $mat_khau != NULL && $re_mat_khau != NULL && $sdt != NULL)
	{
		$sql_sdt = "SELECT so_dien_thoai FROM tbl_nguoi_dung WHERE so_dien_thoai = '".$sdt."'";
		$nguoi_dung = mysqli_query($con, $sql_sdt);
		$so_nguoi_dung = mysqli_num_rows($nguoi_dung);
		if ($so_nguoi_dung == 0)
		{
			$sql = "
			INSERT INTO `tbl_nguoi_dung` (`ma_nguoi_dung`, `ten_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `so_dien_thoai`) VALUES ('', '".$ten."', '".$ten_dang_nhap."', '".$mat_khau."', '".$sdt."');
			";
			mysqli_query($con, $sql);

			echo 
			"
			<script type='text/javascript'>
				window.alert('Đăng ký tài khoản thành công! Mời bạn đăng nhập tài khoản của mình!');
			</script>
			";
			echo 
			"
			<script type='text/javascript'>
				window.location.href='./dang_ky.php'
			</script>
			";
		}
		else
		{
			echo "
			<script type='text/javascript'>
			window.alert('Số điện thoại này đã được đăng ký tài khoản, mời bạn đăng ký bằng số điện thoại khác hoặc đăng nhập!');
			</script>
			";
			echo 
			"
			<script type='text/javascript'>
				window.location.href='./dang_ky.php'
			</script>
			";
		}
		
	}
	else
	{
		echo 
		"
			<script type='text/javascript'>
				window.alert('Mật khẩu không khớp!');
			</script>
		";
		echo 
		"
			<script type='text/javascript'>
				window.location.href='dang_ky.php'
			</script>
		";
	}

;?>