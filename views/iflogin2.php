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
//require_once '../models/dbconfig.php';    
if($_SESSION["iflogin"]==0){
  //echo "<script>swal('請登入系統!!'); </script>";
  echo "<meta http-equiv='refresh' content='0;url=admin'>";
	
	}
 
?>
</body>
</html>