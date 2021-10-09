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
    <title>Tinh hoa trà Việt | Văn hoá trà</title>

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

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="./index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/VietNam.png" alt="" style="width: 25px; height: 20px">
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Đăng nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="./index.php">Trang chủ</a></li>
                <li><a href="./shop-grid.php">Cửa hàng</a></li>
            <!--    <li><a href="#">Tiện ích</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shoping-cart.php">Giỏ hàng</a></li>
                        <li><a href="./checkout.php">Thanh toán</a></li>
                    </ul>
                </li>-->
                <li class="active"><a href="./blog.php">Văn hoá trà</a></li>
                <li><a href="./contact.php">Liên hệ</a></li>
            </ul>
        </nav> 
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> tinhhoatraviet21@gmail.com</li>
                <li>Free ship cho mọi đơn hàng trên 500.000 VNĐ</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

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
                            <li class="active"><a href="./blog.php">Văn hoá trà</a></li>
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
                                    <li><a href="./tai_khoan_cua_toi.php?view_id=<?php echo $row["ma_nguoi_dung"] ?>"><img src="./img/icon_user.png" alt="" style="width: 20px;"></a></li>
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
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/nen_trang.png" style="width: 1325px; height: 165px; margin-left: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Văn hóa trà</h2>
                        <div class="breadcrumb__option">
                    <!--        <a href="./index.php">Trang chủ</a>
                            <span>Văn hóa trà</span>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form id="blog_search" method="GET">
                                <input type="text" name="search" value="<?=isset($_GET['search'])?$_GET['search'] : ""?>" placeholder="Tìm kiếm ...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>                                                       
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Loại bài viết</h4>
                             <ul>
                            <?php 
                            $param="";
                            if (isset($_GET["search"])) 
                            {
                                $param="search=".$_GET["search"]."&";
                            }
                            $sql="SELECT * FROM tbl_loai_bai_viet ";
                            $bai_viet=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($bai_viet))
                            {
                            ;?>
                            <li><a href="./blog.php?<?=$param?>loai=<?php echo $row["ma_loai_bai_viet"] ?>"><b><?php echo $row["loai_bai_viet"] ?></b></a></li>
                            <?php
                            };
                            ?>
                        </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Bài viết gần đây</h4>
                            <div class="blog__sidebar__recent">
                            <?php 
                            $sql="SELECT * FROM tbl_bai_viet ORDER BY ngay_dang DESC LIMIT 3 ";
                            $bai_viet=mysqli_query($con,$sql);
                            while ($row=mysqli_fetch_array($bai_viet))
                            {
                            ;?>
                                <a href="./blog-details.php?id=<?php echo $row["ma_bai_viet"]; ?>" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="./img/blog/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 70px; height: 70px">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6><?php echo $row["tieu_de"] ?></h6>
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
                <div class="col-lg-9 col-md-">
                     <?php                  
                        $item_per_page = 4;
                        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                        $offset = ($current_page - 1) * $item_per_page;
                        

                        $id = isset($_GET["loai"]) ? $_GET["loai"] : null;
                        $search = isset($_GET["search"]) ? $_GET["search"] : null;
                        $sql = "SELECT * FROM tbl_bai_viet a JOIN tbl_loai_bai_viet b 
                            ON a.ma_loai_bai_viet=b.ma_loai_bai_viet";
                        $WHERE="";
                        $page_condition="LIMIT $item_per_page OFFSET $offset";

                        if($id!= null && $search!=null)
                        {
                            $param="search=".$search."&loai=".$id."&";
                            $WHERE="WHERE (b.ma_loai_bai_viet =$id and (tieu_de like '%$search%' or loai_bai_viet like '%$search%'))";
                        }
                        elseif($id!= null && $search==null)
                        {
                            $WHERE="WHERE b.ma_loai_bai_viet = $id";
                        }
                        elseif($id== null && $search!=null)
                        {
                            $WHERE="WHERE tieu_de like '%$search%' or loai_bai_viet like '%$search%'";
                        }
                        $sql_total=$sql. " " .$WHERE;
                        $sql= $sql. " " .$WHERE. " " .$page_condition;
                        $query=mysqli_query($con,$sql);
                        $totalRecords = mysqli_query($con,$sql_total);
                        $Records = mysqli_num_rows($totalRecords);
                        $totalPages = ceil($Records / $item_per_page);
                    ;?>   
                    <div class="row">
                    <?php
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>

                        <div class="col-lg-6 col-md-6 col-sm-6">                            
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <a href="./blog-details.php?id=<?php echo $row["ma_bai_viet"]; ?>"><img src="./img/blog/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 380px;height: 280px"></a>
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> <?php echo $row["ngay_dang"] ?></li>
                                     <!--   <li><i class="fa fa-comment-o"></i> </li>-->
                                    </ul>
                                    <h5><a href="./blog-details.php?id=<?php echo $row["ma_bai_viet"];?>" ><?php echo $row["tieu_de"] ?></a></h5>
                                    <p><?php echo $row["mo_ta"] ?> </p>
                                    <a href="./blog-details.php?id=<?php echo $row["ma_bai_viet"]; ?>" class="blog__btn">Đọc tiếp <span class="arrow_right"></span></a>
                                </div>
                            </div>                            
                        </div>
                    <?php } ?>                                                                                                                 
                    </div>
                    <?php include './pagination.php';?>
                         
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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