<?php
include './header.php'; include '../config.php';
	$loai=mysqli_query($con,"SELECT * from tbl_loai_san_pham");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm mới</title>
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

                <div><br><p style="text-align: center;font-size: 50px">Thêm mới sản phẩm</p></div>

				<form method="POST" action="./quan_tri_san_pham_them_moi_thuc_hien.php" enctype="multipart/form-data">
					<p>
                        Loại sản phẩm: <br>
                        <select name="optLoaiTra" required="required">
                        
						<option value="">_____Loại sản phẩm______</option>
						<?php foreach ($loai as $key => $value) {?>
							<option value="<?php echo $value['ma_loai_san_pham']?>"> <?php echo $value['ten_loai_san_pham']  ?></option>
						<?php } ?>
                        </select>
                    </p>
					<p>
						Tên sản phẩm:<br>
						<input type="text" name="ten_san_pham" style="width: 100%" >
					</p>
					<p>
						Khối lượng:<br>
						<input type="number" step="1" name="khoi_luong" style="width: 100%"/>
					</p>
					<p>
						Giá nhập:<br>
						<input type="number" step="any" name="gia_nhap" style="width: 100%"/>
					</p>
					<p> 
						Giá bán:<br>
						<input type="number" step="any" name="gia_ban" style="width: 100%"/>
					</p>
					<p>
						Giảm giá:<br>
						<input type="number" step="1"  name="giam_gia" style="width: 100%"/>
					</p>
					<p>
						Ảnh minh họa:<br>
						<input type="file" name="anh_minh_hoa" style="width: 100%"/>
					</p>
					<p>
						Ảnh mô tả:<br>
						<input type="file" name="anh_mo_ta[]" multiple="multiple" style="width: 100%"/>
					</p>
					<p>
						Mô tả:<br>
						<textarea name="mo_ta_ngan_gon"  style="width: 100%"></textarea>
					</p>
					<p>
						Chi tiết sản phẩm:<br>
						<textarea name="mo_ta"  style="width: 100%"></textarea>
					</p>
					<button type="submit">Thêm mới</button>
				</form>
            </div>
        </div> <!-- kết thúc nội dung chính -->
    </div> <!-- sử dụng 1 div bao hết nội dung web lại -->
</body>
</html>