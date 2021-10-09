<?php
session_start();
    include './config.php'; 
    if (!isset($_SESSION["cart"])) 
    {
        $_SESSION["cart"] = array();
    }
    if (isset($_SESSION['sdt'])) 
    {
        $sdt = $_SESSION['sdt'];
        $sql = "SELECT * FROM tbl_sp_yeu_thich WHERE sdt = '".$sdt."'";
        $san_pham=mysqli_query($con,$sql);
        $k= mysqli_num_rows($san_pham);
        $_SESSION['love']=$k;
    }else{
        $_SESSION['love']=0;
    }
    
?>  
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinh hoa trà Việt | Trang chủ</title> 

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&display=swap" rel="stylesheet"> 
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
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> tinhhoatraviet21@gmail.com</li>
                                <li>Free ship cho mọi đơn hàng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
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
                            <li class="active"><a href="./index.php">Trang chủ</a></li>
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
                                    <li><a href="./tai_khoan_cua_toi.php"><img src="./img/icon_user.png" alt="" style="width: 20px;"></a></li>
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
    <section class="hero">
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
                    <div class="hero__item set-bg" data-setbg="img/banner/banner_1.JPG">
                        <div class="hero__text">
                             <h3 style="color: #7fad39">TRÀ SẠCH<br>CHO SỨC KHỎE</h3>
                            <span>KHÔNG PHỤ GIA, KHÔNG CHẤT BẢO QUẢN</span>
                            <p>Phù hợp với mọi lứa tuổi</p>
                            <a href="./shop-grid.php" class="primary-btn">MUA NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">        
            <div class="row">            
                <div class="categories__slider owl-carousel">
                <?php 
                    
                    $sql="SELECT * FROM tbl_loai_san_pham order by ma_loai_san_pham ASC";
                    $san_pham=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($san_pham))
                    {
                ;?>
                    <div class="col-lg-3" style="width: 300px; ">
                    
                        <div class="categories__item set-bg" data-setbg="./img/categories/<?php echo $row['anh_sp']?>">
                            <h5><a href="./shop-grid.php?loai=<?php echo $row["ma_loai_san_pham"] ?>"><?php echo $row['ten_loai_san_pham'] ?></a></h5>

                        </div>
                    
                    </div>
                <?php }; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <div class="featured__controls">
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                
                $sql="SELECT * FROM tbl_san_pham LIMIT 0,8";
                $san_pham=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($san_pham))
                {
                ;?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="./img/product/<?php echo $row["anh_minh_hoa"] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a  href="./check.php?action=addlove&item=<?php echo $row['ma_san_pham']?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="./check.php?action=addcart&item=<?php echo $row['ma_san_pham']?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6 style="font-family: 'Lora', serif;"><a href="./shop-details.php?item=<?php echo $row['ma_san_pham']; ?>"><?php echo $row["ten_san_pham"] ?></a></h6>
                            <h5><?php echo $row["gia_ban"] ?> VNĐ</h5>
                        </div>
                    </div>
                </div>
                <?php }; ?>
                
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner_2.jpg" alt="" style="width: 620px;height: 335px">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner_3.jpg" alt="" style="width: 620px;height: 335px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm xem nhiều</h4>
                        <div class="latest-product__slider owl-carousel">
                         
                            <div class="latest-prdouct__slider__item">
                            <?php 
                            
                            $sql="SELECT COUNT(a.ma_san_pham),a.ma_san_pham , a.ma_xem, a.sdt, b.ten_san_pham, b.gia_ban, b.anh_minh_hoa, b.giam_gia,b.gia_ban
                                FROM tbl_sp_da_xem a JOIN tbl_san_pham b ON a.ma_san_pham = b.ma_san_pham
                                WHERE a.ma_san_pham = b.ma_san_pham
                                GROUP BY a.ma_san_pham
                                ORDER BY COUNT(a.ma_san_pham) DESC
                                LIMIT 0,3";
                            $san_pham=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($san_pham))
                            {
                                $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                            ;?>
                                <a href="./shop-details.php?item=<?php echo $row['ma_san_pham'] ?>" class="latest-product__item">

                                    <div class="latest-product__item__pic">
                                        <img src="./img/product/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 150px">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6 style="font-family: 'Lora', serif;"><?php echo $row["ten_san_pham"] ?></h6>
                                        <?php if($row['giam_gia']>0)
                                        { ?>
                                            <p style="text-decoration: line-through; " ><?php echo $row["gia_ban"] ?></p>
                                        <span><?php echo $dc ?></span>
                                        <?php } else { ?>
                                        
                                        <span><?php echo $row["gia_ban"] ?></span>
                                        <?php };?>
                                    </div>
                                </a>
                            <?php }; ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <?php 
                            
                            $sql="SELECT COUNT(a.ma_san_pham),a.ma_san_pham , a.ma_xem, a.sdt, b.ten_san_pham, b.gia_ban, b.anh_minh_hoa, b.giam_gia,b.gia_ban
                                FROM tbl_sp_da_xem a JOIN tbl_san_pham b ON a.ma_san_pham = b.ma_san_pham
                                WHERE a.ma_san_pham = b.ma_san_pham
                                GROUP BY a.ma_san_pham
                                ORDER BY COUNT(a.ma_san_pham) DESC
                                LIMIT 3,3";
                            $san_pham=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($san_pham))
                            {
                                $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                            ;?>
                                <a href="./shop-details.php?item=<?php echo $row['ma_san_pham'] ?>" class="latest-product__item">

                                    <div class="latest-product__item__pic">
                                        <img src="./img/product/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 150px">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6 style="font-family: 'Lora', serif;"><?php echo $row["ten_san_pham"] ?></h6>
                                        <?php if($row['giam_gia']>0)
                                        { ?>
                                            <p style="text-decoration: line-through; " ><?php echo $row["gia_ban"] ?></p>
                                        <span><?php echo $dc ?></span>
                                        <?php } else { ?>
                                        
                                        <span><?php echo $row["gia_ban"] ?></span>
                                        <?php };?>
                                    </div>
                                </a>
                            <?php }; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm yêu thích</h4>
                        <div class="latest-product__slider owl-carousel">
                            
                            <div class="latest-prdouct__slider__item">
                            <?php 
                            
                            $sql="SELECT COUNT(a.ma_san_pham),a.ma_san_pham ,a.ma_yeu_thich, a.sdt, b.ten_san_pham, b.gia_ban, b.anh_minh_hoa,b.gia_ban, b.giam_gia
                                            FROM tbl_sp_yeu_thich a JOIN tbl_san_pham b ON a.ma_san_pham = b.ma_san_pham
                                            WHERE a.ma_san_pham = b.ma_san_pham
                                            GROUP BY a.ma_san_pham
                                            ORDER BY COUNT(a.ma_san_pham) DESC
                                            LIMIT 0,3";
                            $san_pham=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($san_pham))
                            {
                                $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                            ;?>
                                <a href="./shop-details.php?item=<?php echo $row['ma_san_pham'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./img/product/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 150px">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6 style="font-family: 'Lora', serif;"><?php echo $row["ten_san_pham"] ?></h6>
                                        <?php if($row['giam_gia']>0)
                                        { ?>
                                            <p style="text-decoration: line-through; " ><?php echo $row["gia_ban"] ?></p>
                                        <span><?php echo $dc ?></span>
                                        <?php } else { ?>
                                        
                                        <span><?php echo $row["gia_ban"] ?></span>
                                        <?php };?>
                                    </div>
                                </a>
                                <?php }; ?>
                            </div>
                            
                            <div class="latest-prdouct__slider__item">
                            <?php 
                            
                            $sql="SELECT COUNT(a.ma_san_pham), a.ma_san_pham ,a.ma_yeu_thich, a.sdt, b.ten_san_pham, b.gia_ban, b.anh_minh_hoa,b.gia_ban, b.giam_gia
                                            FROM tbl_sp_yeu_thich a JOIN tbl_san_pham b ON a.ma_san_pham = b.ma_san_pham
                                            WHERE a.ma_san_pham = b.ma_san_pham
                                            GROUP BY a.ma_san_pham
                                            ORDER BY COUNT(a.ma_san_pham) DESC
                                            LIMIT 3,3";
                            $san_pham=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($san_pham))
                            {
                                $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                            ;?>
                                <a href="./shop-details.php?item=<?php echo $row['ma_san_pham'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="./img/product/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 150px">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6 style="font-family: 'Lora', serif;"><?php echo $row["ten_san_pham"] ?></h6>
                                        <?php if($row['giam_gia']>0)
                                        { ?>
                                            <p style="text-decoration: line-through; " ><?php echo $row["gia_ban"] ?></p>
                                        <span><?php echo $dc ?></span>
                                        <?php } else { ?>
                                        
                                        <span><?php echo $row["gia_ban"] ?></span>
                                        <?php };?>
                                    </div>
                                </a>
                                <?php }; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm giảm giá nhiều</h4>
                        <div class="latest-product__slider owl-carousel">
                         
                            <div class="latest-prdouct__slider__item">
                            <?php 
                            
                            $sql=   "SELECT * 
                                    FROM tbl_san_pham 
                                    WHERE giam_gia > 0 
                                    order by giam_gia DESC
                                    limit 0,3";
                            $san_pham=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($san_pham))
                            {
                                $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                            ;?>
                                <a href="./shop-details.php?item=<?php echo $row['ma_san_pham'] ?>" class="latest-product__item">

                                    <div class="latest-product__item__pic">
                                        <img src="./img/product/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 150px">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6 style="font-family: 'Lora', serif;"><?php echo $row["ten_san_pham"] ?></h6>
                                        <div class="product__item__price"> 
                                        <p style="text-decoration: line-through; " ><?php echo $row["gia_ban"] ?></p>
                                        <span><?php echo $dc ?></span></div>
                                    </div>
                                </a>
                            <?php }; ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                            <?php 
                            
                            $sql=   "SELECT * 
                                    FROM tbl_san_pham 
                                    WHERE giam_gia > 0 
                                    order by giam_gia DESC
                                    limit 3,3 ";
                            $san_pham=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($san_pham))
                            {

                            ;?>
                                <a href="./shop-details.php?item=<?php echo $row['ma_san_pham'] ?>" class="latest-product__item">

                                    <div class="latest-product__item__pic">
                                        <img src="./img/product/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: 150px">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6 style="font-family: 'Lora', serif;"><?php echo $row["ten_san_pham"] ?></h6>
                                        <div class="product__item__price"> 
                                        <p style="text-decoration: line-through; " ><?php echo $row["gia_ban"] ?></p>
                                        <span><?php echo $dc ?></span></div>
                                    </div>
                                </a>
                            <?php }; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Văn hoá trà</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    
                    $sql="SELECT * FROM tbl_bai_viet a join tbl_loai_bai_viet b on a.ma_loai_bai_viet=b.ma_loai_bai_viet order by ngay_dang DESC limit 0,3";
                    $bai_viet=mysqli_query($con,$sql);
                    while ($row=mysqli_fetch_array($bai_viet))
                    {
                    ;?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="./img/blog/<?php echo $row["anh_minh_hoa"] ?>" alt="" style="width: auto;height: 250px">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> <?php echo $row["ngay_dang"] ?></li>
                            </ul>
                            <h5><a href="./blog-details.php?id=<?php echo $row["ma_bai_viet"] ?>"><?php echo $row["tieu_de"] ?></a></h5>
                        </div>
                    </div>
                </div>                
                <?php }; ?>
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
                        <h6 style="font-family: 'Lora', serif;">Đăng kí nhận thông tin</h6>
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