<?php
session_start();
	//đọc dữ liệu từ trang đăng nhập gửi sang
	include '../config.php';
	$ten_dang_nhap=$_POST["txtTaiKhoan"];
	$mat_khau=$_POST["txtMatKhau"];

	//echo "Tài khoản: ".$ten_dang_nhap." ; Mật khẩu: ".$mat_khau;
			
	// kết nối CSDL

	//so sánh xem có khớp với dl trong csdl không
	$sql="
		SELECT * 
		FROM tbl_admin
		WHERE ten_dang_nhap='".$ten_dang_nhap."' and mat_khau='".$mat_khau."'
	";
	$nguoi_dung=mysqli_query($con,$sql);
	$so_luong_nguoi_dung=mysqli_num_rows($nguoi_dung);

	if($so_luong_nguoi_dung==0)
	{
		echo 
		"
			<script types='text/javascript'>
			window.alert('Thông tin đăng nhập sai')
			</script>	
		";
		echo 
		"
			<script types='text/javascript'>
			window.location.href='./dang_nhap_admin.php'
			</script>	
		";

	}
	else
	{
		//khởi tạo phiên làm việc cho người đăng nhập thành công
		session_start();
		$_SESSION['da_dang_nhap_admin']=1;
		echo 
		"
			<script types='text/javascript'>
			window.location.href='./quan_tri_he_thong.php'
			</script>	
		";
	}
;?>

