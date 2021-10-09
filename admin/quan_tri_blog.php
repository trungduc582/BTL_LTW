<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản trị blog</title>
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
        	<div class="nav">               
                
            </div>       
        	<div class="content">   
            <!--    <a href="../index.php" target="_blank"><img src="../img/logo.png" style="width: 150px;" ></a>
                
                <p style="text-align: center; font-size: 60px; color: Black;">Quản trị bài viết</p>-->

                <div style="float: left;padding: 10px;width: 150px"><a href="../index.php" target="_blank"><img src="../img/logo.png" style="width: 150px; height: auto;"></a></div>

				<div><br><h1 style="text-align: center;font-size: 50px">Quản trị bài viết</h1></div>

                <p><a href="../admin/quan_tri_bai_viet_them.php"  title='Thêm mới'><img src="../img/insert.jpg" style="width: 50px;height: 50px; padding: 10px"></a></p>

                <div class="blog__sidebar__search">
                    <form id="blog_search" method="GET">
                        <input type="text" name="search" value="<?=isset($_GET['search'])?$_GET['search'] : ""?>" placeholder="Tìm kiếm ...">
                        <button type="submit"><span class="icon_search"><img src="./img/icon_search.jpg" style="width: 20px;height: 20px"></span></button>
                        <br>
                    </form>                                                       
                </div>  
                
                <table>
                    <tr>
                        <td>STT</td>
                        <td>Loại bài viết</td>
                        <td>Ảnh minh họa</td>
                        <td>Tiêu đề</td>
                        <td>Tác giả</td>
                        <td>Mô tả</td>
                        <td>Nội dung</td>
                        <td>Ngày đăng</td>
                        <td>Thao tác</td>
                    </tr>
                <?php 
                        $item_per_page = 6;
                        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                        $offset = ($current_page - 1) * $item_per_page;
                        $param="";

                        $search = isset($_GET["search"]) ? $_GET["search"] : null;
                        $sql = "SELECT * FROM tbl_bai_viet a JOIN tbl_loai_bai_viet b 
                            ON a.ma_loai_bai_viet=b.ma_loai_bai_viet";
                        $WHERE="";
                        $page_condition="LIMIT $item_per_page OFFSET $offset";

                        
                        if($search!=null)
                        {
                            $WHERE="WHERE tieu_de like '%$search%' or loai_bai_viet like '%$search%'";
                        }
                        $sql_total=$sql. " " .$WHERE;
                        $sql= $sql. " " .$WHERE. " " .$page_condition;
                        $query=mysqli_query($con,$sql);
                        $totalRecords = mysqli_query($con,$sql_total);
                        $Records = mysqli_num_rows($totalRecords);
                        $totalPages = ceil($Records / $item_per_page);
                    
                    $i=0;
                    while($row=mysqli_fetch_array($query))
                    {
                        $i++;
                ;?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row["loai_bai_viet"];?></td>
                        <td><img src="../img/blog/<?php echo $row["anh_minh_hoa"];?>" style ="width: 250px;height: 200px"></td>
                        <td><?php echo $row["tieu_de"];?></td>
                        <td><?php echo $row["tac_gia"];?></td>
                        <td><?php echo $row["mo_ta"];?></td>
                        <td><?php echo $row["noi_dung"] ?></td>
                        <td><?php echo $row["ngay_dang"] ?></td>
                        <td>
                            <a href="../admin/quan_tri_bai_viet_sua.php?id=<?php echo $row["ma_bai_viet"]; ?>" title='Sửa'><img src="../img/edit.jpg" style="width: 50px;height: 50px"></a>
                            <a href="../admin/quan_tri_bai_viet_xoa.php?id=<?php echo $row["ma_bai_viet"]; ?>" title='Xóa' onclick="return confirm('Bạn chắc chắn muốn xóa')"><img src="../img/delete.jpg" style="width: 50px;height: 50px"></a>
                        </td>
                    </tr>
                <?php
                    }
                ;?>
                </table>
            </div>

    	</div> <!-- kết thúc nội dung chính -->
                    <h3><?php include '../pagination.php';?></h6>    

	</div> <!-- sử dụng 1 div bao hết nội dung web lại -->
</body>
</html>