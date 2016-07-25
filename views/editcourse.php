<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>後台選課系統</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
        <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
        <link rel="stylesheet" type="text/css" media="all" href="/elective_system-2/views/css/form.css">
        <link rel="stylesheet" type="text/css" media="all" href="/elective_system-2/views/css/switchery.min.css">
         <script type="text/javascript" src="/elective_system-2/views/js/switchery.min.js"></script>
        <link href="/elective_system-2/views/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="/elective_system-2/views/css/menu.css" rel="stylesheet" type="text/css" />
        <?php
            session_start(); 
            require_once 'iflogin2.php';
	       // require_once '../models/admincurd.php';
	       // $crud = new AdminCRUD();
           
            $username=$_SESSION["loginid"];
        //      if(isset($_GET['edt_id']))
        //     {
        //      $res=mysql_query("SELECT * FROM course WHERE course_id=".$_GET['edt_id']);
        //      $row=mysql_fetch_array($res);
        //     }
	       	
        ?>
        <script> 
            // function checkLeave(){ 
            // event.returnValue="確定要離開當前頁面嗎？"; 
            // } 
          </script>
        <script language="javascript" type="text/javascript">
        function my_key_down(e){
            var key;
            //console.warn(e.keyCode);
            //console.warn(e.which);
            if(window.event) {
                key = e.keyCode;
            }else if(e.which) {
                key = e.which;
            } else {
                return true;
            }
            //console.log(key);
            if( (key>=48 && key<=57)
                || (key>=96 && key<=105) //數字鍵盤
                || 8==key || 46==key || 37==key || 39==key //8:backspace 46:delete 37:左 39:右 (倒退鍵、刪除鍵、左、右鍵也允許作用)
                ){
                return true;
            }else{
                return false;
            }
        }
        //console.log(String.fromCharCode(229));
        //console.log(String.fromCharCode(0));
</script>
    </head>
    <body onbeforeunload="checkLeave()">
    <?php $row = $data;?>
    
     <div id="wrapper">
  <h1>修改課程</h1>
  
  <form method="post" name="form" action="update">
  <div class="col-2">
    <label>
     課程編號
      <input type="number" placeholder="course_id" id="course_id" name="course_id" value="<?php echo $row['course_id'];?>" readonly tabindex="1" required>
    </label>
  </div>
  <div class="col-2">
    <label>
     課程名稱
      <input placeholder="course_name" id="course_name" name="course_name" value="<?=htmlspecialchars($row['course_name']) ?>" tabindex="2" autocomplete="off" maxlength="20" required>
    </label>
  </div>
  
  <div class="col-3">
    <label>
     教師姓名
      <input placeholder="teacher_name" id="teacher_name" name="teacher_name" value="<?=htmlspecialchars($row['teacher_name']) ?>" tabindex="3" autocomplete="off" maxlength="20" required>
    </label>
  </div>
  <div class="col-3">
    <label>
      上課地點
      <input placeholder="course_place" id="course_place" name="course_place" value="<?=htmlspecialchars($row['course_place']) ?>" tabindex="4" autocomplete="off" maxlength="20" required>
    </label>
  </div>
  
  
  <div class="col-4">
    <label>
     學分
      <input type="number" min="1" max="10"  placeholder="Credit" id="Credit" name="Credit" tabindex="6" value="<?=htmlspecialchars($row['Credit']) ?>" maxlength="5" autocomplete="off" required onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onkeydown="this.value=this.value.replace(/[^\d]/g,'')" onkeypress="return my_key_down(event)">
    </label>
  </div>
  <div class="col-submit">
      <input type="hidden" name="edt_id" value="<?php echo $_GET['edt_id'] ?>">
    <button class="submitbtn" type="submit" name="update">確定修改</button>
  </div>
  
  </form>
  </div>    
   <script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
    var switchery = new Switchery(html);
    });
</script> 
    	
    </body>
</html>