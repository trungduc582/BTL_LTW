<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản trị phản hồi thực hiện</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
		$ten_nguoi_phan_hoi=$_POST["txtTen"];
		$email=$_POST["txtEmail"];
		$noi_dung_phan_hoi=$_POST["txtNoiDung"];

		$sql="INSERT INTO `tbl_phan_hoi` (`ma_phan_hoi`, `ten_nguoi_phan_hoi`, `email`, `noi_dung_phan_hoi`) 
				VALUES (NULL, '".$ten_nguoi_phan_hoi."', '".$email."', '".$noi_dung_phan_hoi."');  ";

		//thực hiện truy vấn để thêm mới tin tức
		mysqli_query($con,$sql);

		//thông báo thêm mới thành công và về trang tin tức
		
		echo 
		"
			<script types='text/javascript'>
			window.alert('Cảm ơn bạn đã gửi phản hồi cho chúng tôi!')
			</script>	
		";
		echo 
		"
			<script types='text/javascript'>
			window.location.href='../contact.php'
			</script>	
		";
		;?>
</body>
</html>