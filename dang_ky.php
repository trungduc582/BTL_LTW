<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinh hoa trà Việt | Đăng ký</title>
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
        <form method="post" action="./dang_nhap_thuc_hien.php" id="login_form" name="login_form">
          <table border="0" style="border:none">
            <tr>
              <td ><input type="text" tabindex="1"  id="email" placeholder="Số điện thoại" name="txtSDT" class="inputtext radius1" value=""></td>
              <td ><input type="password" tabindex="2" id="pass" placeholder="Mật khẩu" name="txtMatKhau" class="inputtext radius1" ></td>
              <td ><input type="submit" class="fbbutton" name="login" value="Đăng nhập"/></td>
            </tr>
            <tr>
              <td><label>
                  <input id="persist_box" type="checkbox" name="persistent" value="1" checked="1"/>
                  <span style="color:#ccc;">Ghi nhớ</span></label></td>
              <td><label><a href="./doi_mat_khau.php" style="color:#ccc; text-decoration:none">Quên mật khẩu?</a></label></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- header ends here -->
<div class="loginbox radius">
  <h2 style="color: green; text-align:center;">Đăng ký tài khoản</h2>
    <!--loginheader-->
    <div class="loginform">
      <form id="login" action="./dang_ky_thuc_hien.php" method="post">
        <p>
          <input type="text" class="firstname" name="txtname" style="width: 420px;" placeholder="Họ và tên" value="" class="radius mini" />
        </p>
        <p>
          <input type="text" id="email" name="txtSDT" placeholder="Số điện thoại" value="" class="radius" />
        </p>
        <p>
          <input type="text" class ="firstname" name="txttendn" style="width: 420px;" placeholder="Tên đăng nhập" value="" class="radius mini" />
        </p>
        <p>
          <input type="password" id="re_password" name="re_password" placeholder="Mật khẩu" class="radius" />
        </p>
        <p>
          <input type="password" id="password" name="password" placeholder="Nhập lại mật khẩu" class="radius" />
        </p>
        <p>
          <button class="radius title" name="signup" style="width: 200px;">Đăng ký</button>
        </p>
      </form>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>
<!--loginbox-->
</body>
</html>
