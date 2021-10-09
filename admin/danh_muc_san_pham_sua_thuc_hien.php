<?php
    include './header.php'; include '../config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thực hiện cập nhật</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<?php
		// 1. KẾT NỐI ĐẾN CSDL

		// 2. Lấy ra dữ liệu thu được từ FORM trước chuyển sang
		$id = $_POST["txtMa"];
		$loai_sp = $_POST["txtLoaiSP"];
		

		// Xử lý ảnh minh họa
		$name=basename($_FILES["txtAnhMinhHoa"]["name"]);
		$anh_minh_hoa="../img/categories/".basename($_FILES["txtAnhMinhHoa"]["name"]);
		$file_anh_tam=$_FILES["txtAnhMinhHoa"]["tmp_name"];
		$result=move_uploaded_file($file_anh_tam,$anh_minh_hoa);
		if(!$result)
			$anh_minh_hoa=null;

		// 3. Viết câu lệnh SQL để thêm mới tin tức vào bảng tbl_tin_tuc
		if($name == NULL) {
			
			$sql="
				UPDATE `tbl_loai_san_pham` SET `ten_loai_san_pham` = '".$loai_sp." ' WHERE `tbl_loai_san_pham`.`ma_loai_san_pham` = '".$id."'; 
			";}
		else {
			
			$sql="
				UPDATE `tbl_loai_san_pham` SET `ten_loai_san_pham` = '".$loai_sp." ',`anh_sp` = '".$name."'  WHERE `tbl_loai_san_pham`.`ma_loai_san_pham` = '".$id."'; 
			";}
		

		// echo $sql; exit();

		// 4. Thực hiện truy vấn để thêm mới tin tức
		mysqli_query($con, $sql);

		// 5. Thông báo việc thêm mới tin tức thành công & đẩy người dùng quay về trang quan trị tin tức
		
		echo 
		"
			<script type='text/javascript'>
				window.location.href='../admin/danh_muc_san_pham.php'
			</script>
		";
	;?>
</body>
</html> 