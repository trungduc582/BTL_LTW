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
    <title>Tinh hoa trà Việt | Cửa hàng</title>

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
                            <li class="active"><a href="./blog.php">Văn hóa trà</a></li>
                            <li><a href="./contact.php">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        
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
<!--    <section class="hero hero-normal">
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
                            <li><a href="./shop-grid.php?view=<detail&id=<?php echo $row["ma_loai_san_pham"] ?>"><b><?php echo $row["ten_loai_san_pham"] ?></b></a></li>
                            <?php
                            };
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="./search.php" method="POST">
                                <div class="hero__search__categories">
                                    Tìm trong trang
                                </div>
                                <input type="text" name="search" placeholder="Nhập thông tin tìm kiếm">
                                <button type="submit" name="search-click" class="site-btn">Tìm kiếm</button>
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

    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="img/nen_trang.png" style="width: 1325px; height: 165px; margin-left: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>Văn hóa trà</h2>                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Loại bài viết</h4>
                            <ul>
                            <?php 
                            $sql="SELECT * FROM tbl_loai_bai_viet ";
                            $bai_viet=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($bai_viet))
                            {
                            ;?>
                            <li><a href="./blog.php?view=<detail&loai=<?php echo $row["ma_loai_bai_viet"] ?>"><b><?php echo $row["loai_bai_viet"] ?></b></a></li>
                            <?php
                            };
                            ?>
                        </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Bài viết gần đây</h4>
                            <div class="blog__sidebar__recent">
                            <?php 
                            $ma_bai_viet=$_GET['id'];
                            $sql="SELECT * FROM tbl_bai_viet order by ngay_dang ASC limit 0,3";
                            $bai_viet=mysqli_query($con,$sql);
                            while ($row=mysqli_fetch_array($bai_viet))
                            {
                            ;?>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="./img/blog/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 70px; height: 70px">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6 style="font-family: 'Lora', serif;"><?php echo $row["tieu_de"] ?></h6>
                                        <span><?php echo $row["ngay_dang"] ?></span>
                                    </div>
                                </a>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                    <?php 

                        $ma_bai_viet=$_GET['id'];
                        $sql="SELECT * FROM tbl_bai_viet where ma_bai_viet='".$ma_bai_viet."'";
                        $bai_viet=mysqli_query($con,$sql);
                        while ($row=mysqli_fetch_array($bai_viet))
                        {
                        ;?>
                        <h3><?php echo $row['tieu_de'] ?></h3>
                        
                        <p style="text-align: justify;"><?php echo $row["noi_dung"]?></p>
                    <?php } ?>
                    </div>
                    <div class="blog__details__content">
                    <?php 

                                    $sql="SELECT * FROM tbl_bai_viet a join tbl_loai_bai_viet b on a.ma_loai_bai_viet=b.ma_loai_bai_viet where ma_bai_viet='".$ma_bai_viet."' ";
                                    $bai_viet=mysqli_query($con,$sql);
                                    while ($row=mysqli_fetch_array($bai_viet))
                                    {
                                 ;?>
                        <div class="row">
                        
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__text">
                                        <h6 style="font-family: 'Lora', serif;">Tác giả</h6>
                                        <h6 style="font-family: 'Lora', serif;"><?php echo $row["tac_gia"] ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Loại bài viêt:</span> <?php echo $row['loai_bai_viet'] ?></li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <?php }; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Bài viết liên quan</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
            <?php 
                
                $sql="SELECT * FROM tbl_bai_viet 
                where ma_loai_bai_viet=(SELECT ma_loai_bai_viet from tbl_bai_viet where ma_bai_viet=$ma_bai_viet) and ma_bai_viet!= $ma_bai_viet
                 limit 0,3";
                $bai_viet=mysqli_query($con,$sql);
                while ($row=mysqli_fetch_array($bai_viet))
                {
            ;?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="./img/blog/<?php echo $row['anh_minh_hoa'] ;?>" alt="" style="height: 250px">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i><?php echo $row['ngay_dang'] ?> </li>
                            <!--    <li><i class="fa fa-comment-o"></i> 5</li>-->
                            </ul>
                            <h5><a href="./blog-details.php?id=<?php echo $row["ma_bai_viet"]; ?>"><?php echo $row['tieu_de']; ?></a></h5>
                            <p><?php echo $row['mo_ta']; ?> </p>
                        </div>
                    </div>
                </div>
                
                
            <?php }; ?>
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->

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
                        <h6 style="font-family: 'Lora', serif;">Về Tinh hoa trà Việt</h6>
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