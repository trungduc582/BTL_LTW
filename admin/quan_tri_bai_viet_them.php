<?php  
    include './header.php';
    include '../config.php';
    $loai=mysqli_query($con,"SELECT * from tbl_loai_bai_viet");
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Thêm mới bài viết</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body >
	<div class="wrap"> <!-- sử dụng 1 div bao hết nội dung web lại -->
 
    	<div id="header"> <!-- phần header -->
    		<div id="menu">
               <ul>
                    <li><a href="./quan_tri_don_hang.php">Quản trị đơn hàng</a></li>
                    <li><a href="./quan_tri_san_pham.php">Quản trị sản phẩm</a></li>
                    <li><a href="./quan_tri_blog.php">Quản trị bài viết</a></li>
                    <li><a href="./quan_tri_phan_hoi.php">Quản trị phản hồi</a></li>
                    <li><a href="./quan_tri_blog.php">Quản trị danh mục</a>
                      <ul class="sub-menu">
                        <li><a href="./danh_muc_san_pham.php">Loại sản phẩm</a></li>
                        <li><a href="./danh_muc_bai_viet.php">Loại bài viết</a></li>
                      </ul>
                    </li>
                </ul>
            </div>
    	</div>
     
   		<div class="main"> <!-- bao phần nội dung chính -->
        	<div class="nav">               
                
            </div>           
        	<div class="content">    
                <div style="float: left;padding: 10px;width: 150px"><a href="../index.php" target="_blank"><img src="../img/logo.png" style="width: 150px; height: auto;"></a></div>

                <div><br><p style="text-align: center;font-size: 50px">Thêm mới bài viết</p></div>

                <form method="POST" action="../admin/quan_tri_bai_viet_them_thuc_hien.php" enctype="multipart/form-data">
                    <p>
                        Tiêu đề: <br>
                        <input type="text" name="txtTieuDe" style="width: ">
                    </p>
                    <p>
                        Loại bài viết: <br>
                        
                         <select name="optLoaiBaiViet" required="required">                       
                        <option value="">_____Loại bài viết______</option>
                        <?php foreach ($loai as $key => $value) {?>
                            <option value="<?php echo $value['ma_loai_bai_viet']?>"> <?php echo $value['loai_bai_viet']  ?></option>
                        <?php } ?>
                        </select>
                    </p>
                    <p>
                        Mô tả: <br>
                        <textarea name="txtMoTa" style="width: "></textarea>
                    </p>
                    <p>
                        Ảnh minh họa: <br>
                        <input type="file" name="txtAnhMinhHoa" style="width: ">
                    </p>
                    <p>
                        Nội dung: <br>
                        <textarea name="txtNoiDung" style="width: "></textarea>
                    </p>
                    <p>
                        Tác giả: <br>
                        <input type="text" name="txtTacGia">
                    </p>
                    <button type="submit">Thêm mới</button>
                </form>
        	</div>
    	</div> <!-- kết thúc nội dung chính -->

	</div> <!-- sử dụng 1 div bao hết nội dung web lại -->

</body>
</html>