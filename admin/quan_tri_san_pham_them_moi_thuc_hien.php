<?php
    include './header.php'; include '../config.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>Thực hiện thêm sản phẩm</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<?php
		// 1. KẾT NỐI ĐẾN CSDL

		// 2. Lấy ra dữ liệu thu được từ FORM trước chuyển sang
		$ma_loai_san_pham = $_POST["optLoaiTra"];
		$ten_san_pham = $_POST["ten_san_pham"];
		$khoi_luong = $_POST["khoi_luong"];
		$gia_nhap = $_POST["gia_nhap"];
		$gia_ban = $_POST["gia_ban"];
		$giam_gia = $_POST["giam_gia"];
		$mo_ta_ngan_gon = $_POST["mo_ta_ngan_gon"];
		$mo_ta = $_POST["mo_ta"];

		// Xử lý ảnh minh họa
		$name=basename($_FILES["anh_minh_hoa"]["name"]);
		$anh_minh_hoa ="../img/product/" .basename($_FILES["anh_minh_hoa"]["name"]);
		$file_anh_tam =  $_FILES["anh_minh_hoa"]["tmp_name"];
		$result = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
		if(!$result) {
			$anh_minh_hoa = NULL;
		}

		//Xử lý ảnh mô tả
		if(isset($_FILES['anh_mo_ta']))
		{
			/*$anh_mo_ta ="../img/product/" .basename($_FILES["anh_mo_ta"]["name"]);
			$files_anh_tam =  $_FILES["anh_mo_ta"]["tmp_name"];

			foreach ($files_anh_tam as $key => $value) {
				# code...
				move_uploaded_file($files_anh_tam [$key], $anh_mo_ta);
			}*/
			$file=$_FILES['anh_mo_ta'];
			$file_name=$file['name'];
			foreach ($file_name as $key => $value) {
				move_uploaded_file($file['tmp_name'][$key], "../img/product/details/".$value);
			}
		}
		// 3. Viết câu lệnh SQL để thêm mới san pham vào bảng tbl_san_pham
		$sql = "
				INSERT INTO `tbl_san_pham`(`ma_loai_san_pham`, `ten_san_pham`, `gia_nhap`, `gia_ban`, `anh_minh_hoa`, `mo_ta_ngan_gon`, `mo_ta`";
		if ($khoi_luong != NULL) {
			$sql = $sql.", `khoi_luong`";
		}
		if ($giam_gia != null) {
			$sql = $sql.", `giam_gia`";
		}
		$sql = $sql.") VALUES ($ma_loai_san_pham, '$ten_san_pham', $gia_nhap, $gia_ban, '$name', '$mo_ta_ngan_gon', '$mo_ta'";
		if ($khoi_luong != NULL) {
			$sql = $sql.", $khoi_luong";
		}
		if ($giam_gia != null) {
			$sql = $sql.", $giam_gia";
		}
		$sql = $sql.")";

		// echo $sql; exit();
		$sql = str_replace("\"", "\\\"", $sql);

		// 4. Thực hiện truy vấn để thêm mới san pham

		$result = mysqli_query($con, $sql);

		$id_pro=mysqli_insert_id($con);
		
		foreach ($file_name as $key => $value) 
		{
			mysqli_query($con,"INSERT INTO tbl_anh_mo_ta (ma_san_pham, anh) VALUES('".$id_pro."', '".$value."')");
		}

		// 5. Thông báo việc thêm mới san pham thành công & đẩy người dùng quay về trang quan trị tin tức
		if ($result) {
			echo 
			"
				<script type='text/javascript'>
					window.alert('Bạn đã thêm mới sản phẩm thành công!');
				</script>
			";
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
					window.alert('Thêm thất bại!');
				</script>
			";
			echo 
			"
				<script type='text/javascript'>
					window.history.back();
				</script>
			";
		}
	;?>
</body>
</html>