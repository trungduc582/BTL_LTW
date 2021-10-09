<?php
session_start(); include './config.php';
    //isset($_SESSION['da_dang_nhap']);
    //isset($_SESSION['sdt']);
     $id = $_GET["item"];
    if(isset($_SESSION['da_dang_nhap']))
    {
        $id = $_GET["item"];
        $sdt = $_SESSION['sdt'];
        
        $sql= "INSERT INTO `tbl_sp_da_xem` (`ma_xem`, `ma_san_pham`, `sdt`) VALUES (NULL, '".$id."', '".$sdt."')";
        $sp_da_xem=mysqli_query($con,$sql);
    }
    else {
        if(!isset($_SESSION['sp_da_xem'])) {
            $_SESSION['sp_da_xem'] = Array();
        }
        if (!in_array($id, $_SESSION['sp_da_xem'])) {
            array_push($_SESSION['sp_da_xem'], $id);
        }
    }
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="Mô tả sản phẩm" content="Ogani Template">
    <meta name="Từ khóa" content="Trà, pha trà, thưởng thức trà, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinh hoa trà Việt | Cửa hàng</title>

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
        <style type="text/css">
        .list_start :hover i {
            color: red;
        }
        .list_text{
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #4B8A08;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 17px;
            border-radius: 2px;
        }
        .list_text: after{
            right: 100%;
            top:  50%;
            border: solid transparent;
            content: "";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82, 184, 88, 0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }
    </style>
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
                                <li>Free ship cho mọi đơn hàng trên 500.000 VNĐ</li>
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
                            <li class="active"><a href="./shop-grid.php">Cửa hàng</a></li>
                        <!--<li><a href="#">Tiện ích</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shoping-cart.php">Giỏ hàng</a></li>
                                    <li><a href="./checkout.php">Thanh toán</a></li>
                                </ul>
                            </li>-->
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
                            <li><a href="./shop-grid.php?view=<detail&loai=<?php echo $row["ma_loai_san_pham"] ?>"><b><?php echo $row["ten_loai_san_pham"] ?></b></a></li>
                            <?php
                            };
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="" method="GET">
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
    <section class="breadcrumb-section set-bg" data-setbg="img/nen_trang.png" style="width: 1325px; height: 165px; margin-left: 120px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cửa hàng</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
            <?php
                $id=$_GET['item'];
                
                $anh=mysqli_query($con,"SELECT DISTINCt * from tbl_anh_mo_ta WHERE ma_san_pham=".$id."");
                $sql="SELECT DISTINCt * FROM tbl_san_pham 
                    WHERE ma_san_pham=".$id."";
                $san_pham=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($san_pham))
                {$dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                ;?>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="img/product/<?php echo $row["anh_minh_hoa"] ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                        <?php foreach ($anh as $key => $value) {?>
                            <img data-imgbigurl="img/product/details/<?php echo $value['anh'] ?>"
                                src="img/product/details/<?php echo $value['anh'] ?>" alt="">
                        <?php  } ?>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                
                    <div class="product__details__text">
                        <h3><?php echo $row["ten_san_pham"] ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price"><?php if($row['giam_gia']>0)
                                        { ?>
                                            <p style="text-decoration: line-through; font-size: 20px; margin-bottom: 10px; " ><?php echo $row["gia_ban"] ?></p>
                                        <span><?php echo $dc ?></span>
                                        <?php } else { ?>
                                        
                                        <span><?php echo $row["gia_ban"] ?></span>
                                        <?php };?>
                            </div>
                        
                        <p><?php echo $row["mo_ta_ngan_gon"] ?></p>
                        
                        <form action="./check.php?action=addclick&item=<?php echo $row["ma_san_pham"] ?>"  method="POST">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="int" value="1" name="sl">
                                    </div>
                                </div>
                            </div>
                        <button type="submit" name="addpro" class="primary-btn">Thêm vào giở hàng</button>
                        </form>
                        
                        <a href="./check.php?action=addlove&item=<?php echo $row['ma_san_pham']?>" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Khối lượng</b> <?php echo $row["khoi_luong"] ?> <span>gr</span></li>
                            <li><b>Chia sẻ</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false"></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Thông tin sản phẩm</h6>
                                    <p><?php echo $row["mo_ta"] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }; ?>
            </div>
            <!-- Code temp đánh giá-->
    
                         <div class="danhgia" style="width: 200%; margin-top: 50px;">
                            <div class="component_rating" style="margin-bottom: 20px; width: 50%;">
                                <h3><center><b style="color: #4B8A08; font-size: 30px;">ĐÁNH GIÁ SẢN PHẨM</b></center></h3>
                                <div class="component_rating_content" style="width: 100%; display: flex; align-items: center; border-radius: 5px; border: 1px solid: #dedede; margin-top: 15px;">
                                    <div class="rating_item" style="width: 10%; position: relative">
                                        <div class=""><b style="position: absolute;font-size: 25px; color: #F7F8E0; margin-left: 23px; margin-top: 24px;">2.5</b><span class="fa fa-star" style="font-size: 85px; color: #FF8000; margin: 0 auto; text-align: center;"></span></div>
                                    </div>
                                    <div class="list_rating" style="width: 40%; padding-top: 20px;">
                                        <div id ="item_rating" style="display: flex;">
                                            <div style="width: 10%; font-size: 20px;">
                                                1  <span class="fa fa-star" value = "Không tốt"></span>
                                            </div>
                                            <div style="width: 65%; margin: 0 20px;">
                                                <span style="margin-top: 10px; width: 100%; height: 10px; display: block; border: 2px solid #dedede; border-radius: 5px;"><b style="background-color: #FF8000; width: 30%; display: block; border-radius: 5px; height: 100%"></b></span>
                                            </div>
                                            <div style="width: 25%; margin-left: 5px; font-size: 15 px;">
                                                <a href="" style="color: green;">290 đánh giá</a>
                                            </div>
                                        </div>
                                        <div id ="item_rating" style="display: flex;">
                                            <div style="width: 10%; font-size: 20px;">
                                                2 <span class="fa fa-star" value = "Không tốt"></span>
                                            </div>
                                            <div style="width: 65%; margin: 0 20px;">
                                                <span style="margin-top: 10px; width: 100%; height: 10px; display: block; border: 2px solid #dedede; border-radius: 5px;"><b style="background-color: #FF8000; width: 30%; display: block; border-radius: 5px; height: 100%"></b></span>
                                            </div>
                                            <div style="width: 25%; margin-left: 5px; font-size: 15 px;">
                                                <a href="" style="color: green;">290 đánh giá</a>
                                            </div>
                                        </div>
                                        <div id ="item_rating" style="display: flex;">
                                            <div style="width: 10%; font-size: 20px;">
                                                3 <span class="fa fa-star" value = "Không tốt"></span>
                                            </div>
                                            <div style="width: 65%; margin: 0 20px;">
                                                <span style="margin-top: 10px; width: 100%; height: 10px; display: block; border: 2px solid #dedede; border-radius: 5px;"><b style="background-color: #FF8000; width: 30%; display: block; border-radius: 5px; height: 100%"></b></span>
                                            </div>
                                            <div style="width: 25%; margin-left: 5px; font-size: 15 px;">
                                                <a href="" style="color: green;">290 đánh giá</a>
                                            </div>
                                        </div><div id ="item_rating" style="display: flex;">
                                            <div style="width: 10%; font-size: 20px;">
                                                4 <span class="fa fa-star" value = "Không tốt"></span>
                                            </div>
                                            <div style="width: 65%; margin: 0 20px;">
                                                <span style="margin-top: 10px; width: 100%; height: 10px; display: block; border: 2px solid #dedede; border-radius: 5px;"><b style="background-color: #FF8000; width: 30%; display: block; border-radius: 5px; height: 100%"></b></span>
                                            </div>
                                            <div style="width: 25%; margin-left: 5px; font-size: 15 px;">
                                                <a href="" style="color: green;">290 đánh giá</a>
                                            </div>
                                        </div><div id ="item_rating" style="display: flex;">
                                            <div style="width: 10%; font-size: 20px;">
                                                5 <span class="fa fa-star" value = "Không tốt"></span>
                                            </div>
                                            <div style="width: 65%; margin: 0 20px;">
                                                <span style="margin-top: 10px; width: 100%; height: 10px; display: block; border: 2px solid #dedede; border-radius: 5px;"><b style="background-color: #FF8000; width: 30%; display: block; border-radius: 5px; height: 100%"></b></span>
                                            </div>
                                            <div style="width: 25%; margin-left: 5px; font-size: 15 px;">
                                                <a href="" style="color: green;">290 đánh giá</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="danhgiasp" style="width: 50%; padding-left: 0px;">
                                <div style="width: 50%; display: flex; margin-top: 50px; font-size: 15px;">
                                    <p style="margin-bottom: 0; font-size: 20px;">Đánh giá của bạn</p>
                                    <span style="margin: 0 20px; margin-bottom: 5px;" class="list_start">
                                    </span>
                                    <i class=" fa fa-star" style="font-size: 25px; margin-left: 6px;"></i>
                                    <i class=" fa fa-star" style="font-size: 25px; margin-left: 6px;"></i>
                                    <i class=" fa fa-star" style="font-size: 25px; margin-left: 6px;" ></i>
                                    <i class=" fa fa-star" style="font-size: 25px; margin-left: 6px;" ></i>
                                    <i class=" fa fa-star" style="font-size: 25px; margin-left: 6px;" ></i>
                                </div>
                                <p style="width: 30%">
                                    <br>
                                    <textarea name="txtDanhGia"  style="width: 100%; height: 100px;"></textarea>
                                </p>
                                <div class="col-sn-2" style="width: 30%; margin-bottom: 20px; text-align: center;">
                                    <a href="./danh_gia.php" class="js_rating_action" style="width: 100px;background-color: #4B8A08; color: #FBF2EF; padding: 15px; font-size: 20px;border-radius: 5px;">Gửi đánh giá</a>
                                </div>
                            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    
                    if (isset($_SESSION['da_dang_nhap']) && $_SESSION['da_dang_nhap'] == 1) {
                        // Da dang nhap
                        $sql="SELECT * FROM tbl_san_pham WHERE ma_loai_san_pham=(SELECT ma_loai_san_pham from tbl_san_pham where ma_san_pham=".$id.") and `ma_san_pham`!=".$id." AND `ma_san_pham`!=".$id." AND `ma_san_pham` NOT IN (SELECT ma_san_pham FROM tbl_sp_da_xem WHERE `sdt` = '".$_SESSION['sdt']."') limit 0,4";
                    } else {
                        // Chua dang nhap
                        $sql="SELECT * FROM tbl_san_pham WHERE ma_loai_san_pham=(SELECT ma_loai_san_pham from tbl_san_pham where ma_san_pham=".$id.") and `ma_san_pham`!=".$id." AND `ma_san_pham` NOT IN (".implode(", ",$_SESSION['sp_da_xem']).") limit 0,4";
                        // echo ($sql); exit();
                    }
                    // echo $_SESSION['sdt']; exit();
                    $san_pham=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($san_pham))
                    {
                    ;?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row["anh_minh_hoa"] ?>">
                                <ul class="product__item__pic__hover">
                                    <li><a href="./check.php?action=addlove&item=<?php echo $row['ma_san_pham']?>"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="./check.php?action=addcart&item=<?php echo $row['ma_san_pham']?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                
                            </div>
                            <div class="product__item__text">
                                <h6><a href="./shop-details.php?item=<?php echo $row["ma_san_pham"] ?>"><?php echo $row["ten_san_pham"] ?></a></h6>
                                <h5><?php echo $row["gia_ban"] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php }; ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

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
                            <li>Địa chỉ: Chùa Bộc-Đống Đa-Hà Nội</li>
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
                            <li><a href="#">Chính sách giải quyết khiếu nại</a></li>
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