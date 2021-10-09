
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
                     <img src="../img/logo.png" style="width: 250px;" class="cangiua" >  
                        <br><br><br>
                        <p style="text-align: center; font-size: 50px; color: #2d6801;">ĐĂNG NHẬP HỆ THỐNG</p>
                        <form method="post" action="dang_nhap_admin_thuc_hien.php" onsubmit="return KiemTra()">
                            <p style="text-align: center;">Tài khoản: <input type="txt" id="txtTaiKhoan" name="txtTaiKhoan" value=""></p>
                            <p style="text-align: center;">Mật khẩu: <input type="password" id="txtMatKhau" name="txtMatKhau" value=""></p>
                            <p style="text-align: center;"><input type="submit" name="btnDangNhap" value="Đăng nhập" onclick="KiemTra()"></p>
                        </form>
                        
            </div> <!-- kết thúc nội dung chính -->

    </div> <!-- sử dụng 1 div bao hết nội dung web lại -->

</body>
</html>