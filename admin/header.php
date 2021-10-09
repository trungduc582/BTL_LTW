<?php
session_start();
    if(!isset($_SESSION['da_dang_nhap_admin']))
    {
        echo 
        "
            <script types='text/javascript'>
            window.alert('Bạn không có quyền truy cập')
            </script>   
        ";
        echo 
        "
            <script types='text/javascript'>
            window.location.href='./dang_nhap_admin.php'
            </script>   
        ";

    }
   
;?>