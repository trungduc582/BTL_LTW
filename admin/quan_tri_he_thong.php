<?php
    include './header.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quản trị hệ thống</title>
    <meta charset="utf-8">
    <script type="text/javascript">
    function KiemTra()
    {
        var taikhoan=document.getElementById('txtTaiKhoan').value;
        //Kiểm tra xem ô tài khoản rỗng hay không
        if(taikhoan=="")
        {
            window.alert("Tài khoản không được để trống");
            return false;
        }
        var matkhau=document.getElementById('txtMatKhau').value;
        if(matkhau=="")
        {
            window.alert("Mật khẩu không được để trống");
            return false;

        }
        return true;
    }
    
    </script>
    <link rel="stylesheet" type="text/css" href="style_ht.css">
</head>
<body >
    <div class="wrap"> <!-- sử dụng 1 div bao hết nội dung web lại -->
 
            <div id="header"> <!-- phần header -->
                <p style="text-align: center; color:#f1faea ">tinhhoatraviet21@gmail.com</p>
            </div>
     
        <div class="main"> <!-- bao phần nội dung chính -->
               
         
            <div class="content">   
                <div>           
                    <div style="float: left;padding: 10px;width: 250px"><img src="../img/logo.png" style="width: 150px; height: auto;"></div>
                    <div ><br><br><h1 style="font-size: 50px; color: #2d6801;">QUẢN TRỊ HỆ THỐNG</h1></div>
                </div>  
                <br><br><br><br>
                <div style="float: left;text-align: center;padding: 20px"><a href="quan_tri_don_hang.php"><img src="./img/icon_order.jpg" style="width: 100px;height: 100px"><br><p> Quản trị đơn hàng </p></a> </div> 
                <div style="float: left;text-align: center;padding: 20px"><a href="quan_tri_blog.php"><img src="./img/icon_blog.jpg" style="width: 100px;height: 100px"><br><p> Quản trị bài viêt</p></a> </div>
                <div style="float: left;text-align: center;padding: 20px"><a href="quan_tri_san_pham.php"><img src="./img/icon_tea.jpg" style="width: 100px;height: 100px"><br><p> Quản trị sản phẩm </p></a> </div>
                <div style="float: left;text-align: center;padding: 20px"><a href="quan_tri_phan_hoi.php"><img src="./img/icon_feddback.jpg" style="width: 100px;height: 100px"><br><p> Quản trị phản hồi </p></a> </div>
                <div style="float: left;text-align: center;padding: 20px"><a href="danh_muc_san_pham.php"><img src="./img/list.jpg" style="width: 100px;height: 100px"><br><p> Quản trị danh mục </p></a> </div>    
            </div>
        </div> <!-- kết thúc nội dung chính -->

    </div> <!-- sử dụng 1 div bao hết nội dung web lại -->

</body>
</html>