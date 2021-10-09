<?php
    include './header.php'; include '../config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thực hiện cập nhật bài viết</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<?php
		// 1. KẾT NỐI ĐẾN CSDL

		// 2. Lấy ra dữ liệu thu được từ FORM trước chuyển sang
		$ma_bai_viet = $_POST["txtMaBaiViet"];
		$tieu_de = $_POST["txtTieuDe"];
		$ma_loai_bai_viet=$_POST["optLoaiTra"];
		$mo_ta = $_POST["txtMoTa"];
		$noi_dung = $_POST["txtNoiDung"];
		$tac_gia=$_POST["txtTacGia"];

		// Xử lý ảnh minh họa
		$name=basename($_FILES["txtAnhMinhHoa"]["name"]);
		$anh_minh_hoa="../img/blog/".basename($_FILES["txtAnhMinhHoa"]["name"]);
		$file_anh_tam=$_FILES["txtAnhMinhHoa"]["tmp_name"];
		$result=move_uploaded_file($file_anh_tam,$anh_minh_hoa);
		if(!$result)
			$anh_minh_hoa=null;

		// 3. Viết câu lệnh SQL để thêm mới tin tức vào bảng tbl_tin_tuc
		if($name == NULL) {
			
			$sql="
				UPDATE `tbl_bai_viet` 
				SET `ma_loai_bai_viet` = '".$ma_loai_bai_viet."', 
				`tieu_de` = '".$tieu_de."', 
				`mo_ta` = '".$mo_ta."', 
				`noi_dung` = '".$noi_dung."', 
				`tac_gia` = '".$tac_gia."' 
				WHERE `tbl_bai_viet`.`ma_bai_viet` = '".$ma_bai_viet."'
			";}
		else {
			$sql = "
			UPDATE `tbl_bai_viet` 
			SET
				`anh_minh_hoa` = '".$name."' ,
				`ma_loai_bai_viet` = '".$ma_loai_bai_viet."', 
				`tieu_de` = '".$tieu_de."', 
				`mo_ta` = '".$mo_ta."', `noi_dung` = '".$noi_dung."', 
				`tac_gia` = '".$tac_gia."' 
				WHERE `tbl_bai_viet`.`ma_bai_viet` = '".$ma_bai_viet."' 
			";
		}

		// echo $sql; exit();

		// 4. Thực hiện truy vấn để thêm mới tin tức
		mysqli_query($con, $sql);

		// 5. Thông báo việc thêm mới tin tức thành công & đẩy người dùng quay về trang quan trị tin tức
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật bài viết thành công!');
			</script>
		";
		echo 
		"
			<script type='text/javascript'>
				window.location.href='../admin/quan_tri_blog.php'
			</script>
		";
	;?>
</body>
</html> 