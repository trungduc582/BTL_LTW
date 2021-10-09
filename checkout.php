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
    <title>Tinh Hoa trà Việt | Thanh toán</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 

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
                            <li><a href="./blog.php">Văn hoá trà</a></li>
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
                            <li><a href="#"><b>Trà Ô Long</b></a></li>
                            <li><a href="#"><b>Trà Tân Cương</b></a></li>
                            <li><a href="#"><b>Trà hoa</b></a></li>
                            <li><a href="#"><b>Trà biếu/tặng</b></a></li>
                            <li><a href="#"><b>Dụng cụ pha trà</b></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Tìm trong trang
                                </div>
                                <input type="text" placeholder="Nhập thông tin tìm kiếm">
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
                        <h2>Thanh toán</h2>
                        <div class="breadcrumb__option">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Checkout Section Begin -->

<?php if (isset($_SESSION['da_dang_nhap']) && $_SESSION['da_dang_nhap'] ==1 ) {?>
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Bạn có muốn sử dụng mã giảm giá? <a href="#">Ấn vào đây</a> để nhập mã
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Hóa Đơn Chi Tiết</h4>
                <form action="./create_payment.php" method="post">   
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Tên<span>*</span></p>
                                        <input name="txtTen" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ và tên đệm<span>*</span></p>
                                        <input name="txtHo" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="txtTenDuong" placeholder="Tên Đường" required class="checkout__input__add">
                                <input type="text" name="txtSoNha" placeholder="Số Nhà" required>
                            </div>
                            <div class="checkout__input">
                                <p>Tỉnh/Thành phố<span>*</span></p>
                                <input type="text" name="txtThanhPho" required>
                            </div>
                            <div class="checkout__input">
                                <p>Quận/Huyện<span>*</span></p>
                                <input type="text" name="txtQuan" required>
                            </div>
                            <div class="checkout__input">
                                <p>Phường/Xã<span>*</span></p>
                                <input type="text" name="txtPhuong" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Điện thoại<span>*</span></p>
                                        <input type="text" name="txtSDT" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="txtEmail" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Lời nhắn<span></span></p>
                                <input type="text" name="txtLoiNhan" value ="thanh toan hoa don" placeholder="Lưu ý cho người bán" 
                                     >
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="checkout__order__products">Sản phảm <span>Thành tiền</span></div>
                                <ul>
                                <?php
                            $total1=0;
                            foreach($_SESSION['cart'] as $key=>$value)
                            {
                                $item[]=$key;
                            }
                            $str=implode(",",$item);
                            $sql= "SELECT * FROM tbl_san_pham WHERE ma_san_pham in ($str)";
                            $query=mysqli_query($con,$sql);
                            while ($row=mysqli_fetch_array($query)) 
                            {$dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);?>
                                <li><?php echo $row["ten_san_pham"] ;?> 
                                    <span>
                                    <?php echo $_SESSION['cart'][$row['ma_san_pham']]*$dc;?>
                                    </span>
                                </li>
                                <?php $total1+=$_SESSION['cart'][$row['ma_san_pham']]*$dc; 
                            }
                            echo "</ul>";

                            $total=$total1;
                            if (isset($_SESSION['ti_le']) && isset($_SESSION['giam_gia']) && $_SESSION["giam_gia"]==1) {
                               $total=$total1-(($total1*$_SESSION['ti_le'])/100);
                               $abc=$_SESSION["ti_le"];
                               echo '<div class="checkout__order__subtotal" style="color: green">Giảm giá hóa đơn <span> '.$abc.'%</span></div>';
                            }
                            $fee=0;
                            if ($total1<500000) {
                               $fee=22000;
                               $total=$total+$fee;
                            }
                            
                             ?>

                             <div class="checkout__order__total" style="color: red">Phí Ship <span><?php echo $fee ?></span></div>
                            <div class="checkout__order__total">Tổng số tiền <span><?php echo $total ?></span></div>
                            <div class="_checkout__input__checkbox">
                                <label for="acc-or">
                                    <p>Lựa chọn phương thức :</p>
                                        <div>
                                        <input type="radio" name="phuong_thuc" value="tm"
                                        checked>
                                        <label for="tm">Thanh toán khi nhận hàng</label>
                                        </div>

                                        <div>
                                        <input type="radio" name="phuong_thuc" value="vnpay">
                                        <label for="vnpay">VNPayment</label>
                                        </div>

                                        <div>
                                        <input type="radio" name="phuong_thuc" value="qr">
                                        <label for="qr">Quét mã QR</label>
                                        </div>
                                </label>
                            </div>
                            <input type="hidden" name="amount" value=<?php echo $total ?>>
                            <input name="order_id" type="hidden" value="<?php echo date("YmdHis")?>">
                            <button type="submit" class="site-btn">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php }else{
        echo '<h4 style="text-align: center; color:red ;">Vui lòng <a href="./dang_nhap.php">đăng nhập </a>để thanh toán !!!</h4>';
    } ?>
    <!-- Checkout Section End -->

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