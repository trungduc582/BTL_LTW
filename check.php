<?php
session_start();
ob_start();
include './config.php';
    if (!isset($_SESSION["cart"])) 
    {
        $_SESSION["cart"] = array();
    }
    if (isset($_GET['action']) && isset($_GET['item']) && $_GET['action'] != null && $_GET['item'] != null) 
    {   
        $id=(int)$_GET['item'];
        $sql="SELECT * FROM tbl_san_pham WHERE ma_san_pham=$id"; 
        $query=mysqli_query($con,$sql);
        if(mysqli_num_rows($query)!=0)
        {
            switch ($_GET['action']) 
            {
                case "addcart":
                    if (isset($_SESSION['cart']))
                    {
                        if(isset($_SESSION['cart'][$id]))
                        { 
                            $_SESSION['cart'][$id]++; 
                        }
                        else
                        { 
                            $_SESSION['cart'][$id]=1; 
                        }
                    }
                    else
                    {
                        $_SESSION['cart'][$id]=1;
                    }

                        
                    echo 
                        "
                            <script type='text/javascript'>
                                window.alert('Đã thêm vào giỏ hàng!');
                            </script>
                        ";
                        break;
                
                case "addclick":
                    $qt=$_POST['sl'];
                    if (isset($_SESSION['cart']))
                    {
                        if(isset($_SESSION['cart'][$id]))
                        { 
                            $_SESSION['cart'][$id]+=$qt; 
                        }
                        else
                        { 
                            $_SESSION['cart'][$id]=$qt; 
                        }
                    }
                    else
                    {
                        $_SESSION['cart'][$id]=$qt;
                    }
                    echo 
                        "
                            <script type='text/javascript'>
                                window.alert('Đã thêm vào giỏ hàng!');
                            </script>
                        ";
                    break;
                case "delete":
                    if (isset($_GET['item'])) 
                    {
                        unset($_SESSION["cart"][$_GET['item']]);
                    }
                    break;
                
                case "addlove":
                    if(isset($_SESSION['da_dang_nhap']) && $_SESSION['da_dang_nhap']==1)
                    {
                        $sdt = $_SESSION['sdt'];
                        $sql_check = "SELECT ma_san_pham FROM tbl_sp_yeu_thich WHERE sdt = '".$sdt."' AND ma_san_pham = '".$id."'";
                        $check=mysqli_query($con, $sql_check);
                        $check_rows = mysqli_num_rows($check);
                        if($check_rows==0)
                        {
                            $sql= "INSERT INTO `tbl_sp_yeu_thich` (`ma_yeu_thich`, `ma_san_pham`, `sdt`) VALUES (NULL, '".$id."', '".$sdt."')";
                            $sp_da_xem=mysqli_query($con,$sql);
                            echo 
                            "
                                <script type='text/javascript'>
                                    window.alert('Bạn đã yêu thích thành công!');
                                </script>
                            ";
                            
                        }
                        else
                        {
                            echo 
                            "
                                <script type='text/javascript'>
                                    window.alert('Bạn yêu thích sản phẩm này rồi!');
                                </script>
                            ";
                        }
                    }
                    else
                    {
                        echo 
                        "
                            <script type='text/javascript'>
                                window.alert('Bạn cần đăng nhập để thực hiện thao tác này!');
                            </script>
                        ";
                    }

                    break;

                case "unlove":
                    {
                        $sdt = $_SESSION['sdt'];
                        $sql = "DELETE FROM tbl_sp_yeu_thich WHERE ma_san_pham = '".$id."' AND sdt='".$sdt."'";
                        $sp_da_xem=mysqli_query($con,$sql);
                        echo 
                            "
                                <script type='text/javascript'>
                                    window.alert('Bạn đã bỏ yêu thích thành công!');
                                </script>
                            ";
                    }
                    break;
            }
            if (isset($_SESSION['sdt'])) 
                    {
                        $sdt = $_SESSION['sdt'];
                        $sql = "SELECT * FROM tbl_sp_yeu_thich WHERE sdt = '".$sdt."'";
                        $san_pham=mysqli_query($con,$sql);
                        $k= mysqli_num_rows($san_pham);
                        $_SESSION['love']=$k;
                    }
                    
        }
        else
            {
                echo "Khong ton tai sp trong csdl" ;
            }
    }
    elseif (isset($_GET['action']) && $_GET['action'] == "submit") 
    {
                    if (isset($_POST["update_click"])) 
                    { //Cập nhật số lượng sản phẩm
                        foreach ($_POST["qty"] as $id => $quantity) 
                        {
                            if ($quantity == 0) 
                            {
                                unset($_SESSION["cart"][$id]);
                            } 
                            else 
                            {
                                $_SESSION["cart"][$id] = $quantity;
                            }
                        }
                    }
                    elseif (isset($_POST["discount_click"])) 
                    { //Đặt hàng sản phẩm\
                        if(isset($_SESSION['da_dang_nhap']) && $_SESSION['da_dang_nhap']==1)
                        {
                            $sql='SELECT * FROM tbl_ma_giam_gia WHERE ma_giam_gia = "'.$_POST["txtMaGiamGia"].'"'; 
                            $query=mysqli_query($con,$sql);
                            $ti_le=mysqli_fetch_array($query);
                            if(mysqli_num_rows($query)!=0)
                            { 
                                $_SESSION['giam_gia']=1;
                                $_SESSION['ti_le']=$ti_le['ti_le'];
                            }
                            else{
                                $_SESSION['giam_gia']=0;
                                echo 
                            "
                                <script type='text/javascript'>
                                    window.alert('ma ko ton tai or het han!');
                                </script>
                            ";
                            }
                        }
                        else
                        {
                        echo 
                        "
                            <script type='text/javascript'>
                                window.alert('Bạn cần đăng nhập để thực hiện thao tác này!');
                            </script>
                        ";
                        }
                    }
    }
                    
echo 
    "
        <script type='text/javascript'>
            history.back();
        </script>
    ";
?>