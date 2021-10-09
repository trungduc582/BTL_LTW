<?php
session_start();
 include './config.php';
	//đọc dữ liệu từ trang đăng nhập gửi sang
	$sdt=$_POST["txtSDT"];
	$mat_khau=$_POST["txtMatKhau"];

	//echo "Tài khoản: ".$ten_dang_nhap." ; Mật khẩu: ".$mat_khau;
			
	// kết nối CSDL

	//so sánh xem có khớp với dl trong csdl không
	if($sdt == '' || $mat_khau == '')
	{
		echo
		"
			<script types='text/javascript'>
			window.alert('Bạn nhập thiếu thông tin!')
			</script>	
		";
		echo 
		"
			<script types='text/javascript'>
			window.location.href='./dang_ky.php'
			</script>	
		";
	}
	else
	{
		$sql="
		SELECT * 
		FROM tbl_nguoi_dung
		WHERE so_dien_thoai='".$sdt."' and mat_khau='".$mat_khau."'
		";
		$nguoi_dung=mysqli_query($con,$sql);
		$so_luong_nguoi_dung=mysqli_num_rows($nguoi_dung);

		if($so_luong_nguoi_dung==0)
		{
			echo 
			"
				<script types='text/javascript'>
				window.alert('Thông tin đăng nhập sai!')
				</script>	
			";
			echo 
			"
				<script types='text/javascript'>
				window.location.href='./dang_ky.php'
				</script>	
			";

		}
		else
		{
			//khởi tạo phiên làm việc cho người đăng nhập thành công
			$_SESSION['da_dang_nhap']=1;
			$_SESSION['sdt'] = $sdt;
			echo 
			"
				<script types='text/javascript'>
				window.alert('Bạn đã đăng nhập thành công!')
				</script>	
			";
			echo 
			"
				<script types='text/javascript'>
				window.location.href='./index.php'
				</script>	
			";
		}
	}
;?>

