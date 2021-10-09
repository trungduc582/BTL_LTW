<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html> 
<head>
    <title>Cập nhật loại bài viết</title>
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
            <div class="content">   
            	<div>
            	
            		<a href="../index.php" target="_blank"><img src="../img/logo.png" style="width: 150px; height: auto;"></a>
				<div><br><h1 style="">Cập nhật loại bài viết</h1></div>
				<form method="POST" action="./danh_muc_bai_viet_sua_thuc_hien.php" enctype="multipart/form-data">
					<?php
						// 1. KẾT NỐI ĐẾN CSDL

						// 2. Lấy ra ID của san pham cần sửa
						$id = $_GET["id"];
						// 3. Lấy dữ liệu mong muốn
						$sql = "SELECT * FROM `tbl_loai_bai_viet` WHERE ma_loai_bai_viet='".$id."'";

						// 4. Thực thi câu lệnh lấy ra dữ liệu mong muốn
						$noi_dung = mysqli_query($con, $sql);

						// 5. Hiển thị dữ liệu lấy được lên màn hình
						$row = mysqli_fetch_assoc($noi_dung);
						// echo $row[0]; exit();
					;?>

					
					<p>
						Loại sản phẩm:<br><br>
						<input type="text" name="txtLoaiBV"  value="<?php echo $row["loai_bai_viet"];?>">
					</p>
					<button type="submit">Cập nhật</button>
					<input type="hidden" name="txtMa" value="<?php echo $row["ma_loai_bai_viet"];?>">
				</form>
				</div>
				<div margin_left:600px>
					<style type="text/css">
                    table, tr, td
                    {
                        border: 1px solid;
                        border-collapse: collapse;
                        padding: 10px;
                        margin-left: 600px;
                    }
                </style>
                <table>
                    <tr>
                        <td>Mã loại bài viết</td>
                        <td>Loại bài viết</td>
                        <td>Thao tác</td>
                    </tr>
                <?php 
                        $item_per_page = 12;
                        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                        $offset = ($current_page - 1) * $item_per_page;
                        $param="";

                        $search = isset($_GET["search"]) ? $_GET["search"] : null;
                        $sql = "SELECT * FROM tbl_loai_bai_viet ";
                        $WHERE="";
                        $page_condition="LIMIT $item_per_page OFFSET $offset";

                        
                        if($search!=null)
                        {
                            $WHERE="WHERE loai_bai_viet like '%$search%' ";
                        }
                        $sql_total=$sql. " " .$WHERE;
                        $sql= $sql. " " .$WHERE. " " .$page_condition;
                        $query=mysqli_query($con,$sql);
                        $totalRecords = mysqli_query($con,$sql_total);
                        $Records = mysqli_num_rows($totalRecords);
                        $totalPages = ceil($Records / $item_per_page);
                    while($row=mysqli_fetch_array($query))
                    {
                ;?>
                    <tr>                        
                        
                            <td><?php echo $row["ma_loai_bai_viet"];?></td>
                            <td><?php echo $row["loai_bai_viet"];?></td>
                            <td>
                                <a href="./danh_muc_bai_viet_sua.php?id=<?php echo $row["ma_loai_bai_viet"]; ?>" title='Sửa'><img src="../img/edit.jpg" style="width: 50px;height: 50px"></a>

                                <a href="./danh_muc_bai_viet_xoa.php?id=<?php echo $row["ma_loai_bai_viet"]; ?>" title='Xóa' onclick="return confirm('Bạn chắc chắn muốn xóa')"><img src="../img/delete.jpg" style="width: 50px;height: 50px"></a>
                            </td>

                                
                        
                    </tr>
                <?php
                    }
                ;?>
                </table>
				</div>
            </div>
        </div> <!-- kết thúc nội dung chính -->
    </div> <!-- sử dụng 1 div bao hết nội dung web lại -->

</body>
</html>