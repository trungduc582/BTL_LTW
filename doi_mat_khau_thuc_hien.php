<?php include './config.php';
	// 1. Đọc dữ liệu từ trang ĐĂNG Ký gửi sang
	$sdt = $_POST["txtSDT"];
	$re_mat_khau = $_POST["re_password"];
	$mat_khau = $_POST["password"];

	// 2. KẾT NỐI ĐẾN CSDL

	// 3. So sánh dữ liệu nhập vào có khớp với dữ liệu lưu trong CSDL hay không?
	if ($sdt == NULL || $mat_khau == NULL || $re_mat_khau == NULL)
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
				window.location.href='./doi_mat_khau.php'
			</script>
		";
	}
	if ($re_mat_khau == $mat_khau && $mat_khau != NULL && $re_mat_khau != NULL && $sdt != NULL)
	{
		$sql_sdt = "SELECT so_dien_thoai FROM tbl_nguoi_dung WHERE so_dien_thoai = '".$sdt."'";
		$nguoi_dung = mysqli_query($con, $sql_sdt);
		$so_nguoi_dung = mysqli_num_rows($nguoi_dung);
		if ($so_nguoi_dung == 1)
		{
			$sql = "
			UPDATE tbl_nguoi_dung
			SET mat_khau = '".$mat_khau."' WHERE so_dien_thoai = '".$sdt."'
			";
			mysqli_query($con, $sql);

			echo 
			"
			<script type='text/javascript'>
				window.alert('Bạn đã đổi mật khẩu thành công! Xin mời bạn đăng nhập!');
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
			window.alert('Số điện thoại này chưa đăng ký tài khoản, mời bạn đăng ký tài khoản!');
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