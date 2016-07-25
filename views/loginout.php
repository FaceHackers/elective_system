<?php session_start(); ?>
<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <meta charset="UTF-8">
    <!-- This is what you need -->
    <script src="js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
</head>
<body>
<?php
require_once '../models/dbconfig.php';  
  	$_SEESION["iflogin"]=0;
	//header("refresh:0;url=login2.php");
	//銷毀現有的 Session連線紀錄
    session_destroy();
    //echo "<script>alert('已登出!!'); </script>";
	echo "<meta http-equiv='refresh' content='0;url=index.html'>";

?>
</body>
</html>