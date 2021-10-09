<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html> 
<head>
	<title>Cập nhật loại sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
<div class="wrap"> <!-- sử dụng 1 div bao hết nội dung web lại -->    
        <div id="header"> <!-- phần header -->
           <div id="menu">
                <ul>
                    <li><a href="./quan_tri_don_hang.php">Quản trị đơn hàng</a></li>
                    <li><a href="./quan_tri_san_pham.php">Quản trị sản phẩm</a></li>
                    <li><a href="./quan_tri_blog.php">Quản trị bài viết</a></li>
                    <li><a href="./quan_tri_phan_hoi.php">Quản trị phản hồi</a></li>
                    <li>Quản trị danh mục
                      <ul class="sub-menu">
                        <li><a href="./danh_muc_san_pham.php">Loại sản phẩm</a></li>
                        <li><a href="./danh_muc_bai_viet.php">Loại bài viết</a></li>
                      </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main"> <!-- bao phần nội dung chính -->
            <div class="content2">   
            	<div style="float: left;padding: 10px;width: 150px"><a href="../index.php" target="_blank"><img src="../img/logo.png" style="width: 150px; height: auto;"></a></div>

				<div><br><h3 style="text-align: center;font-size: 50px">Cập nhật sản phẩm</h3></div>
				<form method="POST" action="./danh_muc_san_pham_sua_thuc_hien.php" enctype="multipart/form-data">
					<?php
						// 1. KẾT NỐI ĐẾN CSDL

						// 2. Lấy ra ID của san pham cần sửa
						$id = $_GET["id"];
						// 3. Lấy dữ liệu mong muốn
						$sql = "SELECT * FROM `tbl_loai_san_pham` WHERE ma_loai_san_pham='".$id."'";

						// 4. Thực thi câu lệnh lấy ra dữ liệu mong muốn
						$noi_dung_san_pham = mysqli_query($con, $sql);

						// 5. Hiển thị dữ liệu lấy được lên màn hình
						$row = mysqli_fetch_assoc($noi_dung_san_pham);
						// echo $row[0]; exit();
					;?>

					
					<p>
						Loại sản phẩm:<br>
						<input type="text" name="txtLoaiSP" style="width: 100%" value="<?php echo $row["ten_loai_san_pham"];?>">
					</p>
					
					<p>
						Ảnh minh họa:<br>
						<input type="file" name="txtAnhMinhHoa"  style="width: 100%"/>
						<img src="../img/categories/<?php echo $row["anh_sp"];?>" style="width: 200px;height: 150px">
					</p>
					
					
					<button type="submit">Cập nhật</button>
					<input type="hidden" name="txtMa" value="<?php echo $row["ma_loai_san_pham"];?>">
				</form>
            </div>
        </div> <!-- kết thúc nội dung chính -->
    </div> <!-- sử dụng 1 div bao hết nội dung web lại -->

</body>
</html>