<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thực hiện thêm mới bài viết</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<?php 
		$tieu_de=$_POST["txtTieuDe"];
		$loai_bai_viet=$_POST["optLoaiBaiViet"];
		$mo_ta=$_POST["txtMoTa"];
		$noi_dung=$_POST["txtNoiDung"];
		$tac_gia=$_POST["txtTacGia"];

			//Xử lý ảnh minh họa
		$name=basename($_FILES["txtAnhMinhHoa"]["name"]);
		$anh_minh_hoa="../img/blog/".basename($_FILES["txtAnhMinhHoa"]["name"]);
		$file_anh_tam=$_FILES["txtAnhMinhHoa"]["tmp_name"];
		$result=move_uploaded_file($file_anh_tam,$anh_minh_hoa);
		if(!$result)
			$anh_minh_hoa=null;

		$sql="INSERT INTO `tbl_bai_viet` (`ma_bai_viet`, `ma_loai_bai_viet`, `tieu_de`, `anh_minh_hoa`, `mo_ta`, `noi_dung`, `ngay_dang`, `tac_gia`) VALUES (NULL, '".$loai_bai_viet."', '".$tieu_de."', '".$name."', '".$mo_ta."', '".$noi_dung."', current_timestamp(), '".$tac_gia."');";

		//thực hiện truy vấn để thêm mới tin tức
		mysqli_query($con,$sql);

		//thông báo thêm mới thành công và về trang tin tức
		
		echo 
		"
			<script types='text/javascript'>
			window.alert('Bạn đã thêm mới thành công')
			</script>	
		";
		echo 
		"
			<script types='text/javascript'>
			window.location.href='./quan_tri_blog.php'
			</script>	
		";
		;?>
</body>
</html>