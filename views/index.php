<?php 
    session_start(); 
    // require_once '../models/curd.php';
    // $crud = new CRUD();
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>登入系統</title>
    <link rel="stylesheet" href="/elective_system-2/views/css/reset.css">
    <link rel="stylesheet" href="/elective_system-2/views/css/style.css">
     <!-- This is alert -->
    <script src="js/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    
   </head>
  <body>
    <div class="container">
      <div class="login">
  	    <h1 class="login-heading">
        <strong>Welcome.</strong> Please login.</h1>
        <form method="post" id="form" name="reg" action="index" onsubmit="return check()">
          <input type="text" name="user" placeholder="Username"  class="input-txt" autocomplete="off" required/>
          <input type="password" name="password" placeholder="Password"  class="input-txt" autocomplete="off" required/>
      <div class="login-footer">
            <button type="submit" name="check" class="btn btn--right" >Sign in</button>
      </div>
      <br>
      <br>
     
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  </body>
</html>

