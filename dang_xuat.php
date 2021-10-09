<?php
session_start();
if (isset($_SESSION['da_dang_nhap'])){
session_destroy();
}
echo
"
	<script types='text/javascript'>
	window.alert('Bạn đã đăng xuất thành công!')
	</script>	
";
echo 
"
	<script types='text/javascript'>
	window.location.href='./index.php'
	</script>	
";
?>