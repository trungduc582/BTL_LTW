<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinh hoa trà Việt | Đăng nhập</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/admin_style.css" type="text/css">
</head>
<body>
<!-- header starts here -->
<div id="facebook-Bar">
  <div id="facebook-Frame">
    <div id="logo"> <a href="#"></a></div>
    <div id="header-main-right">
      <div id="header-main-right-nav">
        
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<div class="loginbox radius">
  <h2 style="color: green; text-align:center;">Đăng nhập</h2><br><br>
    <!--loginheader-->
    <div class="loginform">
    <form method="post" action="./dang_nhap_thuc_hien.php" id="login_form" name="login_form">
      <input type="text" tabindex="1"  id="email" placeholder="Số điện thoại" name="txtSDT"  value="">
      <input type="password" tabindex="2" id="pass" placeholder="Mật khẩu" name="txtMatKhau"  >
      <br>
      <div>     
        <div style="float: left;padding: 0px;width: 200px">
            <label>
                <input id="persist_box" type="checkbox" name="persistent" value="1" checked="1"/>
                <p style="color:black;">Ghi nhớ</p>
            </label>
        </div>
        <div><br><p><a href="./doi_mat_khau.php">Quên mật khẩu?</a></p></div>      
      </div>
      
        <div class="clearfix"></div>
        <input type="submit" value="Đăng nhập" name="login">
    </form>
    <br>
    <p style="color: black">Bạn chưa có tài khoản? <a href="dang_ky.php">Đăng ký</a></p>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->
</body>
</html>
