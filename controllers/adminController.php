<?php
class adminController extends Controller {
    
    
    //確認管理者資料
    function admin() {
       $crud= $this->model("admincurd");
        //$crud = new admincurd();
        if(isset($_POST['pwd1'])) {
        //mysql_real_escape_string 過濾特殊符號 
        $user   = mysql_real_escape_string($_POST['pwd1']);
        $pass   = mysql_real_escape_string(sha1($_POST['pwd2']));
        
        // check
        $row = $crud->check($user,$pass);
        if($row){
            $_SESSION["iflogin"]=1;
            $_SESSION["loginid"]=$user;
            //echo "<meta http-equiv='refresh' content='0;url=adminclass'>";
            $this->readcourse();
            exit;
        }else{
            $_SESSION["iflogin"]=0;
            $_SESSION["alert"]="帳密錯誤或未輸入帳密!!";
            echo "<script>alert('帳密錯誤或未輸入帳密!!'); </script>";
            echo "<script>location.href = 'admin';</script>";
            
            }
        }
        $this->view("admin");
    }
    //讀取課程清單
    function readcourse() {
        $crud =  $this->model("admincurd");

        $res = $crud->readclass();
        
        $dataArray = array();
        
        if((mysql_num_rows($res)>0)){
            while($row = mysql_fetch_array($res)){
                $data['course_id'] = $row['course_id'];
                $data['course_name'] = $row['course_name'];
                $data['teacher_name'] = $row['teacher_name'];
                $data['course_place'] = $row['course_place'];
                $data['Credit'] = $row['Credit'];
                
                
                $dataArray[] = $data;
            }
        }
        
       $this->view("adminclass", $dataArray);
        
        
    }
    //修改課程資料
    function update() {
        $crud =  $this->model("admincurd");

         $course_id    = mysql_real_escape_string($_POST['edt_id']);
         $course_name  = mysql_real_escape_string($_POST['course_name']);
         $teacher_name = mysql_real_escape_string($_POST['teacher_name']);
         $course_place = mysql_real_escape_string($_POST['course_place']);
         $Credit       = mysql_real_escape_string($_POST['Credit']);
         $crud->update($course_name,$teacher_name,$course_place,$Credit,$course_id);
           echo "<script>alert('修改成功!!'); </script>";
          $this->readcourse();
         
        
    
    }
    //讀取課程ID
    function readmodify() {
        
        $crud =  $this->model("admincurd");
        $res=$crud->readid($_GET['edt_id']);
        $row=mysql_fetch_assoc($res);

        $this->view("editcourse",$row);
    }
    //新增課程
    function addcourse() {
        $crud =  $this->model("admincurd");
        if(isset($_POST['insert'])) {
            $course_id      = mysql_real_escape_string($_POST['course_id']);
            $course_name    = mysql_real_escape_string($_POST['course_name']);
            $teacher_name   = mysql_real_escape_string($_POST['teacher_name']);
            $course_place   = mysql_real_escape_string($_POST['course_place']);
            $Credit         = mysql_real_escape_string($_POST['Credit']);
            //inser
            $num = $crud->createclass($course_id,$course_name,$teacher_name,$course_place,$Credit);
             if($num == 0)
    		{
    		   
    			$crud->newclass($course_id,$course_name,$teacher_name,$course_place,$Credit);
                echo "<script>alert('新增成功!!'); </script>";
                 $this->readcourse();
                 exit;
    		}
    		else
    		{
    		    echo "<script>alert('課程代號重複!!'); </script>";
                $this->view("addcourse");
    		}
        }
       
      $this->view("addcourse");
        
    }
    //讀取學生資料
    function adminstu() {
        $crud =  $this->model("admincurd");

        $res = $crud->readstu();
        
        $dataArray = array();
        
        if((mysql_num_rows($res)>0)){
            while($row = mysql_fetch_array($res)){
                $data['student_id'] = $row['student_id'];
                $data['student_name'] = $row['student_name'];
                $data['Dept'] = $row['Dept'];
                $data['sex'] = $row['sex'];
                $data['class'] = $row['class'];
                
                
                $dataArray[] = $data;
            }
        }
        
       $this->view("adminstu", $dataArray);
        
        
    }
    //新增學生資料
    function addstu() {
    $crud =  $this->model("admincurd");
    //接受新增學生資料
    if(isset($_POST['insertstu']))
        {
            $student_id   = mysql_real_escape_string($_POST['student_id']);
            $student_name = mysql_real_escape_string($_POST['student_name']);
            $Dept         = mysql_real_escape_string($_POST['Dept']);
            $sex          = mysql_real_escape_string($_POST['sex']);
            $class        = mysql_real_escape_string($_POST['class']);
            $password     = mysql_real_escape_string(sha1($_POST['password']));
            //inser
          $num = $crud->createstu($student_id,$student_name,$Dept,$sex,$class,$password);
             if($num==0)
    		{
    			$crud->newstu($student_id,$student_name,$Dept,$sex,$class,$password);
                echo "<script>alert('新增成功!!'); </script>";
                $this->adminstu();
                exit;
    		}
    		else
    		{
    		    echo "<script>alert('學號重複!!'); </script>";
                $this->view("addstu");
    		}
           
        }
        $this->view("addstu");
        
    }
    //登出系統
    function loginout2() {
       	$_SEESION["iflogin"]=0;
    	//header("refresh:0;url=login2.php");
    	//銷毀現有的 Session連線紀錄
        session_destroy();
        //echo "<script>alert('已登出!!'); </script>";
        $this->view("admin");
    }
}