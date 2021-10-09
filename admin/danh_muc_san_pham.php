<?php
include './header.php'; include '../config.php';
    if(isset($_POST['txtname']))
    {
        $loai_sp=$_POST['txtname'];
        $name=basename($_FILES["txtAnhMinhHoa"]["name"]);
        $anh_minh_hoa="../img/categories/".basename($_FILES["txtAnhMinhHoa"]["name"]);
        $file_anh_tam=$_FILES["txtAnhMinhHoa"]["tmp_name"];
        $result=move_uploaded_file($file_anh_tam,$anh_minh_hoa);
        if(!$result)
            $anh_minh_hoa=null;
        $sql="INSERT INTO `tbl_loai_san_pham` (`ma_loai_san_pham`, `ten_loai_san_pham`, `anh_sp`) VALUES (NULL, '".$loai_sp."', '".$name."')";
        mysqli_query($con,$sql);
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản trị loại sản phẩm</title>
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
                <div style="float: left;padding: 10px;width: 150px"><a href="../index.php" target="_blank"><img src="../img/logo.png" style="width: 150px; height: auto;"></a></div>

                <div><br><h1 style="text-align: center;font-size: 50px">Loại sản phẩm</h1></div>
            <!--    <div class="blog__sidebar__search">
                    <form id="blog_search" method="GET">
                        <input type="text" name="search" value="<?=isset($_GET['search'])?$_GET['search'] : ""?>" placeholder="Tìm kiếm ...">
                        <button type="submit"><img src="./img/icon_search.jpg" style="width: 20px;height: 20px"></button>
                        <br>
                    </form>                                                       
                </div> -->
                <form method="POST" action="" enctype="multipart/form-data">
                    <h3>Thêm mới</h3>
                    <p>
                        Loại sản phẩm: <br>
                        <input type="text" name="txtname" style="width: ">
                    </p>
                    <p>
                        Ảnh minh họa: <br>
                        <input type="file" name="txtAnhMinhHoa" style="width: ">
                    </p>
                    <button type="submit">Thêm mới</button>
                </form>  
                <br><br>
                <style type="text/css">
                    table, tr, td
                    {
                        border: 1px solid;
                        border-collapse: collapse;
                        padding: 10px;
                    }
                </style>
                <table>
                    <tr>
                        <td>Mã loại sản phẩm</td>
                        <td>Loại sản phẩm</td>
                        <td>Ảnh minh họa</td>
                        
                        <td>Thao tác</td>
                    </tr>
                <?php 
                        $item_per_page = 12;
                        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                        $offset = ($current_page - 1) * $item_per_page;
                        $param="";

                        $search = isset($_GET["search"]) ? $_GET["search"] : null;
                        $sql = "SELECT * FROM tbl_loai_san_pham ";
                        $WHERE="";
                        $page_condition="LIMIT $item_per_page OFFSET $offset";

                        
                        if($search!=null)
                        {
                            $WHERE="WHERE ten_loai_san_pham like '%$search%' ";
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
                        <td><?php echo $row["ma_loai_san_pham"];?></td>
                        <td><?php echo $row["ten_loai_san_pham"];?></td>
                        <td><img src="../img/categories/<?php echo $row["anh_sp"];?>" style ="width: 250px;height: 200px"></td>
                        
                        <td>
                            <a href="./danh_muc_san_pham_sua.php?id=<?php echo $row["ma_loai_san_pham"]; ?>" title='Sửa'><img src="../img/edit.jpg" style="width: 50px;height: 50px"></a>
                            <a href="./danh_muc_san_pham_xoa.php?id=<?php echo $row["ma_loai_san_pham"]; ?>" title='Xóa' onclick="return confirm('Bạn chắc chắn muốn xóa')"><img src="../img/delete.jpg" style="width: 50px;height: 50px"></a>
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
