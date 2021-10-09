<?php
session_start() ;
include './config.php';?>
<!DOCTYPE html>
<html lang="zxx">           
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinh hoa trà Việt | Giỏ hàng</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> tinhhoatraviet21@gmail.com</li>
                                <li>Free ship cho mọi đơn hàng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/VietNam.png" alt="" style="width: 40px">
                            </div>
                            <div class="header__top__right__auth">
                            <?php
                                if(isset($_SESSION['da_dang_nhap']))
                                {
                                    $sdt=isset($_SESSION['sdt']);
                                    
                                    $sql="SELECT * FROM tbl_nguoi_dung WHERE so_dien_thoai = '".$sdt."'";
                                    $nguoi_dung=mysqli_query($con,$sql);
                                   
                            ;?>
                                        <a href="./dang_xuat.php">Đăng xuất</a>
                            <?php
                                    
                                }
                                else
                                {
                                    ;?>
                                    <a href="./dang_ky.php">Đăng nhập</a>
                                <?php
                                }
                            ;?>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Trang chủ</a></li>
                            <li><a href="./shop-grid.php">Cửa hàng</a></li>
                            <li><a href="./blog.php">Văn hóa trà</a></li>
                            <li><a href="./contact.php">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="./san_pham_yeu_thich.php"><i class="fa fa-heart"></i> <span><?php echo $_SESSION['love'] ?></span></a></li>
                            <li><a href="./cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo count($_SESSION['cart']) ?></span></a></li>
                            <?php
                            if(isset($_SESSION['da_dang_nhap']))
                            {
                                $sdt =isset($_SESSION['sdt']) ;
                                
                                $sql="SELECT * FROM tbl_nguoi_dung WHERE so_dien_thoai = '".$sdt."'";
                                $nguoi_dung=mysqli_query($con,$sql);
                                
                            ;?>
                                    <li><a href="./tai_khoan_cua_toi.php?>"><img src="./img/icon_user.png" alt="" style="width: 20px;"></a></li>
                            <?php
                                
                            }
                            else
                            {
                                ;?>
                                <li><a href="./dang_ky.php"><img src="./img/icon_add_user.png" alt="" style="width: 30px;"></a></li>
                            <?php
                            }
                            ;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                            <?php 
                            
                            $sql="SELECT * FROM tbl_loai_san_pham ";
                            $san_pham=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($san_pham))
                            {
                            ;?>
                            <li><a href="./shop-grid.php?loai=<?php echo $row["ma_loai_san_pham"] ?>"><b><?php echo $row["ten_loai_san_pham"] ?></b></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="./shop-grid.php" method="GET">
                                <div class="hero__search__categories">
                                    Tìm trong trang
                                </div>
                                <input type="text" name="search" value="<?=isset($_GET['search']) ? $_GET['search'] : ""?>" placeholder="Nhập thông tin tìm kiếm">
                                <button type="submit" class="site-btn">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 395 292 836</h5>
                                <span>Hỗ trợ khách hàng 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/nen_trang.png" style="width: auto; height: 165px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    
    <section class="shoping-cart spad">
                        <?php 
                            $total=0;
                        if (isset($_SESSION['cart']) && $_SESSION['cart'] !=null ) 
                        {?>
        <form action="./check.php?action=submit" method="POST" role="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            foreach($_SESSION['cart'] as $key=>$value)
                            {
                                $item[]=$key;
                            }
                        $str=implode(",",$item);
                        $sql= "SELECT * FROM tbl_san_pham WHERE ma_san_pham in ($str)";
                        $query=mysqli_query($con,$sql);
                        while ($row=mysqli_fetch_array($query)) 
                        { $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                            ;?>
                                           
                        <tr>
                            <td class="shoping__cart__item">
                                <img src="img/product/<?php echo $row["anh_minh_hoa"] ;?>" alt="" style="width: 100px; height: 100px">
                                <h5><?php echo $row["ten_san_pham"] ;?></h5>
                            </td>
                            <td class="shoping__cart__price">
                                    <?php echo $dc ;?>
                            </td>
                            <td class="shoping__cart__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="int" name="qty[<?= $row['ma_san_pham'] ?>]"
                                            value= <?php echo $_SESSION['cart'][$row['ma_san_pham']] ?>>
                                    </div>
                                </div>
                            </td>     
                            <td class="shoping__cart__total">
                                <?php echo $_SESSION['cart'][$row['ma_san_pham']]*$dc ;?>
                            </td>
                            <td class="shoping__cart__item__close">
                                <a href="./check.php?action=delete&item=<?php echo $row['ma_san_pham']?>"><span class="icon_close"></span></a>
                            </td>
                        </tr>
                        <?php $total+=$_SESSION['cart'][$row['ma_san_pham']]*$dc; }?> 
                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="./shop-grid.php" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                        
                        <div class="primary-btn cart-btn cart-btn-right">
                            <button type="submit" name="update_click">Cập nhật giỏ hàng</button>
                            <span class="icon_loading"></span>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                                <input type="text" name="txtMaGiamGia" placeholder="Nhập mã giảm giá">
                                <button type="submit" name="discount_click" class="site-btn">Xác Nhận</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5 >Tổng giỏ hàng</h5>
                        <ul>
                            <?php 
                            if (isset($_SESSION['ti_le']) && isset($_SESSION['giam_gia']) && $_SESSION["giam_gia"]==1) {
                               $total=$total-(($total*$_SESSION['ti_le'])/100);
                               $abc=$_SESSION["ti_le"];
                               echo "<li>Giảm giá hóa đơn <span> $abc%</span></li>";
                            }
                            ?>
                            
                            <li>Tổng tiền <span><?php echo $total;?></span></li>
                        </ul>
                        <a href="./checkout.php" class="primary-btn">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    <?php }
    else {
        echo '<h4 style="text-align: center; color:red ;">Giỏ hàng trống!!! <a href="./shop-grid.php" class="primary-btn cart-btn">tiếp tục mua sắm</a> </h4>';        }
    
    ?>
                        

    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.php"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: Chùa Bộc - Đống Đa - Hà Nội</li>
                            <li>Điện thoại: +84 395 292 836</li>
                            <li>Email: tinhhoatraviet21@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Về Tinh hoa trà Việt</h6>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Tuyển dụng</a></li>
                            <li><a href="#">Điều khoản sử dụng</a></li>
                            <li><a href="#">Giải quyết khiếu nại</a></li>
                            <li><a href="#">Chính sách bảo mật thanh toán</a></li>
                            <li><a href="#"></a></li>
                        </ul>
                        <ul>
                            
                            <li><a href="#">Dịch vụ của chúng tôi</a></li>
                            <li><a href="#">Chăm sóc khách hàng</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Thông tin giao hàng</a></li>
                            <li><a href="#">Nhà phát triển</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Đăng kí nhận thông tin</h6>
                        <p>Để lại email của bạn để không bỏ lỡ những chương trình hấp dẫn.</p>
                        <form action="#">
                            <input type="text" placeholder="Email của bạn">
                            <button type="submit" class="site-btn">Đăng kí</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Tinh hoa trà Việt &copy;<script>document.write(new Date().getFullYear());</script> 
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>