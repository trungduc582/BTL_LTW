<?php
    include './header.php'; include '../config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thực hiện cập nhật</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
    <?php
        // 1. KẾT NỐI ĐẾN CSDL

        // 2. Lấy ra dữ liệu thu được từ FORM trước chuyển sang
        $id = $_POST["txtMa"];
        $loai_bv = $_POST["txtLoaiBV"];
        

        
            
            $sql="
                UPDATE `tbl_loai_bai_viet` 
                SET `loai_bai_viet` = '".$loai_bv."' 
                WHERE `tbl_loai_bai_viet`.`ma_loai_bai_viet` = '".$id."' 
            ";

        // echo $sql; exit();

        // 4. Thực hiện truy vấn để thêm mới tin tức
        mysqli_query($con, $sql);

        // 5. Thông báo việc thêm mới tin tức thành công & đẩy người dùng quay về trang quan trị tin tức
        
        echo 
        "
            <script type='text/javascript'>
                window.location.href='../admin/danh_muc_bai_viet.php'
            </script>
        "
    ;?>
</body>
</html> 