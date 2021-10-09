<?php
session_start();
include './config.php';
?>
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
                            $param="";
                            $sortParam = "";
                            $paramsql = "";
                            if (isset($_GET["search"])) 
                            {
                                $param.="search=".$_GET["search"]."&";
                            }
                            $sql="SELECT * FROM tbl_loai_san_pham ";
                            $query=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($query))
                            {
                            ;?>
                            <li><a href="./shop-grid.php?<?=$param?>loai=<?php echo $row["ma_loai_san_pham"] ?>"><b><?php echo $row["ten_loai_san_pham"] ?></b></a></li>
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
                        <div class="breadcrumb__option">
                            <a href="./index.php"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Top sản phẩm yêu thích</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <?php 
                                        
                                        $sql="SELECT COUNT(a.ma_san_pham),a.ma_san_pham , a.ma_yeu_thich, a.sdt, b.ten_san_pham, b.gia_ban, b.anh_minh_hoa, b.gia_ban,b.giam_gia
                                            FROM tbl_sp_yeu_thich a JOIN tbl_san_pham b ON a.ma_san_pham = b.ma_san_pham
                                            WHERE a.ma_san_pham = b.ma_san_pham
                                            GROUP BY a.ma_san_pham
                                            ORDER BY COUNT(a.ma_san_pham) DESC
                                            LIMIT 0,4";
                                        $san_pham=mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_array($san_pham))
                                        {
                                            $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                                        ;?>
                                        <a href="./shop-details.php?item=<?php echo $row["ma_san_pham"] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic" style="width: 130px; height: 100px">
                                                <img src="./img/product/<?php echo $row['anh_minh_hoa']?>" alt="">
                                                         
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6 style="font-family: 'Lora', serif;"><?php echo $row['ten_san_pham']?></h6>
                                                <?php if($row['giam_gia']>0)
                                                { ?>
                                                    <p style="text-decoration: line-through; " ><?php echo $row["gia_ban"] ?></p>
                                                    <span><?php echo $dc ?></span>
                                                <?php } else { ?>
                                                    <span><?php echo $row["gia_ban"] ?></span>
                                                <?php };?>
                                            </div>
                                        </a>
                                        <?php } ?> 
                                    </div>
                                </div>
                                <br><br><br>
                                <h4>Sản phẩm xem nhiều</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <?php 
                                        
                                        $sql=" SELECT COUNT(a.ma_san_pham),a.ma_san_pham , a.ma_xem, a.sdt, b.ten_san_pham, b.gia_ban, b.anh_minh_hoa,b.gia_ban,b.giam_gia
                                                FROM tbl_sp_da_xem a JOIN tbl_san_pham b ON a.ma_san_pham = b.ma_san_pham
                                                WHERE a.ma_san_pham = b.ma_san_pham
                                                GROUP BY a.ma_san_pham
                                                ORDER BY COUNT(a.ma_san_pham) DESC
                                                LIMIT 0,5";
                                        $san_pham=mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_array($san_pham))
                                        {
                                            $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                                        ;?>
                                        <a href="./shop-details.php?item=<?php echo $row["ma_san_pham"] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic" style="width: 130px; height: auto">
                                                <img src="./img/product/<?php echo $row['anh_minh_hoa']?>" alt="">
                                                         
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6 style="font-family: 'Lora', serif;"><?php echo $row['ten_san_pham']?></h6>
                                                <?php if($row['giam_gia']>0)
                                                { ?>
                                                    <p style="text-decoration: line-through; " ><?php echo $row["gia_ban"] ?></p>
                                                    <span><?php echo $dc ?></span>
                                                <?php } else { ?>
                                                    <span><?php echo $row["gia_ban"] ?></span>
                                                <?php };?>
                                            </div>
                                        </a>
                                        <?php } ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    
                    <div class="product__discount">
                        
                      <?php 
                    
                    $id = isset($_GET["loai"]) ? $_GET["loai"] : null;
                    $tk = isset($_GET['search']) ? $_GET['search'] : "";
                    if ($id) 
                    {
                        $param.="loai=".$id."&";
                        $sortParam.="loai=".$id."&";
                        $paramsql.="and a.ma_loai_san_pham =".$id." ";
                    }
                    if ($tk) 
                    {
                        echo'<h4>Kết quả tìm kiếm cho: "'."$tk".'" </h4>';
                       $sql="SELECT * FROM tbl_san_pham a JOIN tbl_loai_san_pham b ON a.ma_loai_san_pham=b.ma_loai_san_pham
                            WHERE ((ten_san_pham like '%$tk%') OR (ten_loai_san_pham like '%$tk%')) and giam_gia>0 ".$paramsql." ";
                    }
                    else
                    {
                        $sql=   "SELECT * FROM tbl_san_pham a JOIN tbl_loai_san_pham b ON a.ma_loai_san_pham=b.ma_loai_san_pham
                            WHERE giam_gia > 0 ".$paramsql." ";
                    }
                    
                    $san_pham=mysqli_query($con,$sql);
                    $num1 = mysqli_num_rows($san_pham);
                    if ($num1>0) 
                    {
                        ?>
                                <div class="section-title product__discount__title">
                                    <h2>Khuyến mại</h2>
                                </div>
                            <div class="row">
                                <?php if ($num1>3) {
                                    echo '<div class="product__discount__slider owl-carousel">';
                                } ?>
                                    <?php
                                    while($row=mysqli_fetch_array($san_pham))
                                    {
                                        $dc=$row["gia_ban"]-(($row["gia_ban"]*$row["giam_gia"])/100);
                                    ?>

                                <div class="col-lg-4">                                        
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg" data-setbg="img/product/<?php echo $row["anh_minh_hoa"];?>">
                                            <div class="product__discount__percent">-<?php echo $row["giam_gia"] ?> %</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="./check.php?action=addlove&item=<?php echo $row['ma_san_pham']?>"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="./check.php?action=addcart&item=<?php echo $row['ma_san_pham']?>"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?php echo $row["ten_loai_san_pham"] ?></span>
                                            <h5><a href="./shop-details.php?action=view&item=<?php echo $row["ma_san_pham"] ?>"><?php echo $row["ten_san_pham"] ?></a></a></h5>
                                            <div class="product__item__price"> <?php echo $dc ?><span><?php echo $row["gia_ban"] ?></span></div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
                                if ($num1>3) 
                                {
                                    echo "</div>";
                                }
                            echo "</div>";
                            } 
                    echo"</div>";
                    




                
                
                
                //sắp xếp
                $orderField = isset($_GET['field']) ? $_GET['field'] : "";
                $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
                
                if(!empty($orderField) && !empty($orderSort))
                {
                    $param .= "field=".$orderField."&sort=".$orderSort."&";
                    $paramsql .= " ORDER BY ".$orderField." ".$orderSort;
                }
                $item_per_page = 6;
                $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
                $offset = ($current_page - 1) * $item_per_page;
                
                //Tìm kiếm
                if ($tk) 
                {
                    $sortParam .=  "search=".$tk."&";
                    $sql = "SELECT * FROM tbl_san_pham a JOIN tbl_loai_san_pham b ON a.ma_loai_san_pham=b.ma_loai_san_pham
                        WHERE ((ten_san_pham like '%$tk%') OR (ten_loai_san_pham like '%$tk%')) and giam_gia=0 ".$paramsql.
                        " LIMIT " . $item_per_page . " OFFSET " . $offset ;
                    $sql_total="SELECT * FROM tbl_san_pham a JOIN tbl_loai_san_pham b ON a.ma_loai_san_pham=b.ma_loai_san_pham
                        WHERE ((ten_san_pham like '%$tk%') OR (ten_loai_san_pham like '%$tk%')) and giam_gia=0 ".$paramsql ;
                }
                else
                {
                    $sql = "SELECT * FROM tbl_san_pham a WHERE giam_gia = 0
                        ".$paramsql."
                        LIMIT " . $item_per_page . " OFFSET " . $offset ;
                    $sql_total= "SELECT * FROM tbl_san_pham a WHERE giam_gia = 0 ".$paramsql ;
                }
                $totalRecords = mysqli_query($con,$sql_total );
                $Records = mysqli_num_rows($totalRecords);
                $totalPages = ceil($Records / $item_per_page);
                        
                $query=mysqli_query($con,$sql);
                $num2 = mysqli_num_rows($query);
                            
                    if ($num2>0) 
                    {
                        
                    ?>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sắp xếp theo</span>
                                    <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                        <option <?php if(isset($_GET['field']) && $_GET['field'] == "gia_ban" && isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=gia_ban&sort=desc">giá từ cao đến thấp</option>
                                        <option <?php if(isset($_GET['field']) && $_GET['field'] == "gia_ban" && isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=gia_ban&sort=asc">giá từ thấp đến cao</option>
                                        <option <?php if(isset($_GET['field']) && $_GET['field'] == "ten_san_pham" && isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=ten_san_pham&sort=desc">Tên sản phẩm z-a</option>
                                        <option <?php if(isset($_GET['field']) && $_GET['field'] == "ten_san_pham" && isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?=$sortParam?>field=ten_san_pham&sort=asc">Tên sản phẩm a-z</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-8 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        while ($row=mysqli_fetch_array($query)) 
                        {?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/<?php echo $row["anh_minh_hoa"] ;?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="./check.php?action=addlove&item=<?php echo $row['ma_san_pham']?>"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="./check.php?action=addcart&item=<?php echo $row['ma_san_pham']?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6 style="font-family: 'Lora', serif;"><a href="./shop-details.php?action=view&item=<?php echo $row["ma_san_pham"] ?>"><?php echo $row["ten_san_pham"] ;?></a></h6>
                                    <h5> <?php echo $row["gia_ban"] ;?> </h5>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        </div>
                    <?php include './pagination.php';
                         ?>
                    </div>
                    <?php
                    }
                    if ($num1==0 && $num2==0) {
                        echo "<h4>không có sản phẩm nào</h4>";
                    }
                             ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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