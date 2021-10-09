<?php
	include './header.php';
	include '../config.php';
?>
<!DOCTYPE html>
<html> 
<head>
	<title>Cập nhật sản phẩm</title>
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

				<div><br><h1 style="text-align: center;font-size: 50px">Cập nhật sản phẩm</h1></div>
				<form method="POST" action="./quan_tri_san_pham_sua_thuc_hien.php" enctype="multipart/form-data">
					<?php
						// 1. KẾT NỐI ĐẾN CSDL
						$loai=mysqli_query($con,"SELECT * from tbl_loai_san_pham");

						// 2. Lấy ra ID của san pham cần sửa
						$id = $_GET["id"];
						$img_pro=mysqli_query($con,"SELECT * from tbl_anh_mo_ta where ma_san_pham='".$id."'");
						// 3. Lấy dữ liệu mong muốn
						$sql = "SELECT * FROM `tbl_san_pham` WHERE ma_san_pham='".$id."'";

						// 4. Thực thi câu lệnh lấy ra dữ liệu mong muốn
						$noi_dung_san_pham = mysqli_query($con, $sql);

						// 5. Hiển thị dữ liệu lấy được lên màn hình
						$row = mysqli_fetch_assoc($noi_dung_san_pham);
						// echo $row[0]; exit();
					;?>

					<p>
                        Loại sản phẩm: <br>
                        <select name="optLoaiSanPham" required="required">                      					
						<option value="">_____Loại sản phẩm______</option>
						<?php foreach ($loai as $key => $value) {?>
							<option value="<?php echo $value['ma_loai_san_pham']?>" <?php echo (($value['ma_loai_san_pham']==$row['ma_loai_san_pham']) ?'selected':'') ?> >
							 <?php echo $value['ten_loai_san_pham']  ?></option>
						<?php } ?>
                        </select>
                    </p>
					<p>
						Tên sản phẩm:<br> 
						<input type="text" name="ten_san_pham" style="width: 100%" value="<?php echo $row["ten_san_pham"];?>">
					</p>
					<p>
						Khối lượng:<br>
						<input type="number" step="1" value="<?php echo $row["khoi_luong"];?>" name="khoi_luong" style="width: 100%"/>
					</p>
					<p>
						Giá nhập:<br>
						<input type="number" step="any" value="<?php echo $row["gia_nhap"];?>" name="gia_nhap"  style="width: 100%"/>
					</p>
					<p>
						Giá bán:<br>
						<input type="number" step="any" value="<?php echo $row["gia_ban"];?>" name="gia_ban"  style="width: 100%"/>
					</p>
					<p>
						Giảm giá:<br>
						<input type="number" step="1"  value="<?php echo $row["giam_gia"];?>" name="giam_gia" style="width: 100%"/>
					</p>
					<p>
						Ảnh minh họa:<br>
						<input type="file" name="anh_minh_hoa"  style="width: 100%"/>
						<img src="../img/product/<?php echo $row["anh_minh_hoa"];?>" style="width: 200px;height: 150px">
					</p>
					<p>
						Ảnh mô tả:<br>
						<input type="file" name="anh_mo_ta[]" multiple="multiple" style="width: 100%"/>
						<div class="row" style="display: flex;">
							<?php foreach ($img_pro as $key => $value) {?>
								<div class=" col-md-4 ">
								<a href="#" class="thumbnail">
									<img src="../img/product/details/<?php echo $value['anh'] ?>" alt="" style="width: 200px;height: 150px; padding-left: 10px;">
								</a>
								</div>
							<?php	} ?>
						</div>
							

					</p>
					<p>
						Mô tả:<br>
						<textarea name="mo_ta_ngan_gon"  style="width: 100%"><?php echo $row["mo_ta_ngan_gon"];?></textarea>
					</p>
					<p>
						Chi tiết sản phẩm:<br>
						<textarea name="mo_ta"  style="width: 100%"><?php echo $row["mo_ta"];?></textarea>
					</p>
					<button type="submit">Cập nhật</button>
					<input type="hidden" name="ma_san_pham" value="<?php echo $row["ma_san_pham"];?>">
				</form>
            </div>
        </div> <!-- kết thúc nội dung chính -->
    </div> <!-- sử dụng 1 div bao hết nội dung web lại -->

</body>
</html>