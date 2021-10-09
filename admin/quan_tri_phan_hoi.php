<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản trị phản hồi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        table, tr, td
        {
            border: 1px solid;
            border-collapse: collapse;
            padding: 10px;
            text-align: justify;
            width: 
        }    
    </style>
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
                <div style="float: left;padding: 10px;width: 150px"><a href="../index.php" target="_blank"><img src="../img/logo.png" style="width: 150px; height: auto;"></a></div>

                <div><br><h1 style="text-align: center;font-size: 50px">Quản trị phản hồi</h1></div>
                <table>
                    <tr>
                        <td>STT</td>
                        <td>Tên người phản hồi</td>
                        <td>Email</td>
                        <td>Nội dung phản hồi</td>                       
                    </tr>
                <?php 
                    $sql="SELECT * FROM tbl_phan_hoi ORDER BY ma_phan_hoi";
                    $noi_dung=mysqli_query($con,$sql);
                    $i=0;
                    while($row=mysqli_fetch_array($noi_dung))
                    {
                        $i++;
                ;?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row["ten_nguoi_phan_hoi"];?></td>
                        <td><?php echo $row["email"];?></td>
                        <td><?php echo $row["noi_dung_phan_hoi"] ?></td>
                        
                    </tr>
                <?php
                    }
                ;?>
                </table>
            </div>
        </div> <!-- kết thúc nội dung chính -->

    </div> <!-- sử dụng 1 div bao hết nội dung web lại -->
</body>
</html>