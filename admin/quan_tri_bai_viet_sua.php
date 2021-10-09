<?php
    include './header.php'; include '../config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cập nhật bài viết</title>
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
            <div style="float: left;padding: 10px;width: 150px"><a href="../index.php" target="_blank"><img src="../img/logo.png" style="width: 150px; height: auto;"></a></div>

				<div><br><h1 style="text-align: center;font-size: 50px">Cập nhật bài viết</h1></div>
			<form method="POST" action="./quan_tri_bai_viet_sua_thuc_hien.php" enctype="multipart/form-data">
				<?php
			// 1. KẾT NỐI ĐẾN CSDL
					$loai=mysqli_query($con,"SELECT * from tbl_loai_bai_viet");
			// 2. Lấy ra ID của tin tức cần sửa
					$ma_bai_viet = $_GET["id"];

			// 3. Lấy dữ liệu mong muốn
					$sql = "
						SELECT *
						FROM tbl_bai_viet 
						WHERE ma_bai_viet='".$ma_bai_viet."'
					";

			// 4. Thực thi câu lệnh lấy ra dữ liệu mong muốn
					$noi_dung_bai_viet = mysqli_query($con, $sql);

			// 5. Hiển thị dữ liệu lấy được lên màn hình
					$row = mysqli_fetch_array($noi_dung_bai_viet);
				;?>

				<p>
					Tiêu đề:<br>
					<input type="text" name="txtTieuDe" style="width: 100%" value="<?php echo $row["tieu_de"];?>">
				</p>
				<p>
					Loại bài viết: <br>
                        <select name="optLoaiTra" required="required">                      					
						<option value="">_____Loại bài viết______</option>
						<?php foreach ($loai as $key => $value) {?>
							<option value="<?php echo $value['ma_loai_bai_viet']?>" <?php echo (($value['ma_loai_bai_viet']==$row['ma_loai_bai_viet']) ?'selected':'') ?> >
							 <?php echo $value['loai_bai_viet']  ?></option>
						<?php } ?>
                        </select>
				</p>
				<p>
					Mô tả:<br>
					<textarea name="txtMoTa" style="width: 100%"><?php echo $row["mo_ta"];?></textarea>
				</p>
				<p>
					Ảnh minh họa:<br>
					<input type="file" name="txtAnhMinhHoa" style="width: 100%" >
				</p>
				<p>
					Nội dung:<br>
					<textarea name="txtNoiDung" style="width: 100%"><?php echo $row["noi_dung"];?></textarea>
				</p>
				<p>
        		    Tác giả: <br>
        		    <input type="text" name="txtTacGia" value="<?php echo $row["tac_gia"];?>">
       			</p>
				<button type="submit">Cập nhật</button>
				<input type="hidden" name="txtMaBaiViet" value="<?php echo $row["ma_bai_viet"];?>">
			</form>
                
            
    	</div> <!-- kết thúc nội dung chính -->

	</div> <!-- sử dụng 1 div bao hết nội dung web lại -->

	
</body>
</html> 