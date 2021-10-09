<?php
session_start(); 
include("./vnpay_php/config.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="./vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="./vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="./vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }

        //$secureHash = md5($vnp_HashSecret . $hashData);
		$secureHash = hash('sha256',$vnp_HashSecret . $hashData);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo ($_GET['vnp_Amount']/100) ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "GD Thanh cong";
        $sql2="INSERT INTO tbl_hoa_don_ban(ma_HDB,sdt_dki_nguoi_dung,danh_sach_san_pham,loi_nhan,tong_tien,ten,ho_ten_dem,ten_duong,so_nha,tinh_thanh_pho,quan_huyen,phuong_xa,dien_thoai,email) 
        VALUES ('".$_GET['vnp_TxnRef']."','".$_SESSION['sdt']."','".json_encode($_SESSION['cart'])."','".$_GET['vnp_OrderInfo']."','".($_GET['vnp_Amount']/100)."','".$_SESSION['ten']."','".$_SESSION['ho']."','".$_SESSION['ten_duong']."','".$_SESSION['so_nha']."','".$_SESSION['tinh_thanh_pho']."','".$_SESSION['quan_huyen']."','".$_SESSION['phuong_xa']."','".$_SESSION['dien_thoai']."','".$_SESSION['email']."')";
          mysqli_query($con, $sql2);
                unset($_SESSION['cart']);
                unset($_SESSION['giam_gia']);
                            } else {
                                echo "GD Khong thanh cong";
                            }
                        } else {
                            echo "Chu ky khong hop le";
                        }
                        ?>

                    </label>
                </div> 
            <h3><a href="./index.php" style="color:green;">Quay về trang chủ</a></h3>
            </div>
            <footer class="footer">
                <p>&copy; VNPAY 2015</p>
            </footer>
        </div>  
    </body>
</html>
