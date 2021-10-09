<?php
include './header.php'; include '../config.php';
    if(isset($_GET['id_delete']) && $_GET['id_delete'] != null)
    {
        mysqli_query($con,"DELETE from tbl_hoa_don_ban where ma_HDB=".$_GET['id_delete']);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Quản trị đơn hàng</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrap"> <!-- sử dụng 1 div bao hết nội dung web lại -->    
        <div id="header"> <!-- phần header -->
          <div id="menu">
          <ul>
                    <li><a href="./quan_tri_don_hang.php">Quản trị đơn hàng</a></li>
                    <li><a href="./quan_tri_san_pham.php">Quản trị sản phẩm</a></li>
                    <li><a href="./quan_tri_blog.php">Quản trị bài viết</a></li>
                    <li><a href="./quan_tri_phan_hoi.php">Quản trị phản hồi</a></li>
                    <li>Quản trị danh mục
                      <ul class="sub-menu">
                        <li><a href="./danh_muc_san_pham.php">Loại sản phẩm</a></li>
                        <li><a href="./danh_muc_bai_viet.php">Loại bài viết</a></li>
                      </ul>
                    </li>
                </ul>
            </li>
          </ul>
      </div>
        </div>
  <div class="container-fluid" style="display: flex;">
    <div class="row" style="width: 100%">
        <div class="col-lg-9 col-md-9 col-sm-9" id="nd">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="page-header" style="box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
                  <a href="#menu-toggle" class="btn" id="menu-toggle" style="padding: 0"></a>
                <h1 style="text-align: center;">QUẢN LÝ ĐƠN HÀNG</h1> 
            </div>
                
              </div>
          <div class="col-lg-12">
          <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="80%">
                <thead>
                    <tr>
                        <th class="th-sm" align="center">Tên khách hàng</th>
                        <th class="th-sm" align="center">Số điện thoại</th>
                        <th class="th-sm" align="center">Email</th>
                         <th class="th-sm" align="center">Tổng tiền</th>
                         <th class="th-sm" align="center">Thao tác</th>
                      
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $TT=0;
                    $sql="SELECT * FROM tbl_hoa_don_ban  ORDER BY ma_HDB DESC ";
                     
                    $noi_dung=mysqli_query($con,$sql);
                   
                    while ($row=mysqli_fetch_array($noi_dung)){ ;?>
                    <tr>
                      <td align="center"><?php echo $row["ho_ten_dem"];echo " ";echo $row["ten"];?></td>
                      <td align="center"><?php echo $row["dien_thoai"] ;?></td>
                      <td><?php echo $row["email"] ;?></td>
                      
                      <td align="center"><?php echo $row["tong_tien"] ;?></td>
                      <td><center><a href="./quan_tri_don_hang.php?id_delete=<?php echo $row['ma_HDB'] ?>" title='Hủy' onclick="return confirm('Bạn chắc chắn muốn hủy?')"><img src="../img/icon_delete.jpg" style="width: 30px; height: auto; text-align: center;"></a></center></td>
                    </tr>

                  <?php $TT+=  $row["tong_tien"] ;
                } 
                ;?>
                </tbody> 
            </table>
              <h3 >Tổng tiền: <?= $TT?><h3>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    
  <!--BOOSTSTRAP-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
     
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script  type="text/javascript"src="../js/dataTables.bootstrap4.min.js"></script>
    <script  type="text/javascript"src="../css/dataTables.bootstrap4.min.css"></script>
    <script type="text/javascript" src="../js/datatables.min.js"></script> 
  <script>
      $(document).ready(function () {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
      });
    </script> 
</body>
</html>