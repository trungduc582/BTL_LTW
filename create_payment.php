<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once("./vnpay_php/config.php");
require_once("./config.php");

$ten = $_POST['txtTen'];
$ho = $_POST['txtHo'];
$ten_duong = $_POST['txtTenDuong'];
$so_nha = $_POST['txtSoNha'];
$tinh_thanh_pho = $_POST['txtThanhPho'];
$quan_huyen = $_POST['txtQuan'];
$phuong_xa = $_POST['txtPhuong'];
$dien_thoai = $_POST['txtSDT'];
$email = $_POST['txtEmail'];

$_SESSION['ten']=$ten;
$_SESSION['ho']=$ho;
$_SESSION['ten_duong']=$ten_duong;
$_SESSION['so_nha']=$so_nha;
$_SESSION['tinh_thanh_pho']=$tinh_thanh_pho;
$_SESSION['quan_huyen']=$quan_huyen;
$_SESSION['phuong_xa']=$phuong_xa;
$_SESSION['dien_thoai']=$dien_thoai;
$_SESSION['email']=$email;

$vnp_TxnRef = $_POST['order_id']; 
$vnp_OrderInfo = $_POST['txtLoiNhan'];
$vnp_Amount = $_POST['amount'];
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['phuong_thuc']) && $_POST['phuong_thuc'] == "vnpay") 
{
    $inputData = array
    (
    "vnp_Version" => "2.0.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount*100,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => "vn",
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
    "vnp_Ten" => $ten,
    );
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . $key . "=" . $value;
        } else {
            $hashdata .= $key . "=" . $value;
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
       // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
       	$vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
        $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
    header('Location: '.$vnp_Url);
}

if (isset($_POST['phuong_thuc']) && $_POST['phuong_thuc'] == "tm") 
{
   


    $sql2="INSERT INTO tbl_hoa_don_ban(ma_HDB,sdt_dki_nguoi_dung,danh_sach_san_pham,loi_nhan,tong_tien,ten,ho_ten_dem,ten_duong,so_nha,tinh_thanh_pho,quan_huyen,phuong_xa,dien_thoai,email) 
    VALUES ('".$vnp_TxnRef."','".$_SESSION['sdt']."','".json_encode($_SESSION['cart'])."','".$vnp_OrderInfo."','".$vnp_Amount."','".$ten."','".$ho."','".$ten_duong."','".$so_nha."','".$tinh_thanh_pho."','".$quan_huyen."','".$phuong_xa."','".$dien_thoai."','".$email."')";
      mysqli_query($con, $sql2);
                unset($_SESSION['cart']);
                unset($_SESSION['giam_gia']);
                echo "<script type='text/javascript'>
                                window.alert('Đặt hàng thành công!');
                            </script>";
                echo "<script type='text/javascript'>
                   window.location.href='./index.php'
                </script>";

  }
    ?> 