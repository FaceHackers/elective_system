<?php
class curdController extends Controller {
     
     //確認學生資料
     function index() {
       $crud= $this->model("curd");
        if(isset($_POST['check'])) {
        
             $user   =  mysql_real_escape_string($_POST['user']);
             $pass   =  mysql_real_escape_string(sha1($_POST['password']));
            // check
            $row = $crud->check($user,$pass);
            if($row){
                 $_SESSION["iflogin"]=1;
                 $_SESSION["loginid"]=$user;
                echo "<meta http-equiv='refresh' content='0;url=classview'>";
            }else{
                 $_SESSION["iflogin"]=0;
              echo "<script>alert('帳密錯誤或未輸入帳密!!'); </script>";
                $this->view("index");
            }
            
        }
        $this->view("index");
    }
    //讀取選修課程清單
    function classview() {
        $crud =  $this->model("curd");

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
        
       $this->view("classview", $dataArray);
    
    }
    //新增選修課程
    function addcourse() {
        $crud =  $this->model("curd");

        
        if(isset($_GET['addid'])) {
       
            $addid   = $_GET['addid'];
            $username= $_SESSION["loginid"];
            
            //inser
            $num = $crud->createclass($username,$addid);
             if($num==0)
    		{
    			
    			$crud->newclass($username,$addid);
                echo "<script>alert('新增成功!!'); </script>";
                //$this->classview();
    		}
    		else
    		{
    		    echo "<script>alert('已有選課資料，不能重複選課!!'); </script>";
                //$this->classview();
    		}
            
            //header("Location: index.php");
        }
         $this->classview();
        
    }
    //讀取學生選課課程
    function readstu() {
        $crud =  $this->model("curd");

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
        
       $this->view("stu", $dataArray);
        
    }
    //讀取學生課程
    function readstuu() {
         $crud =  $this->model("curd");

        $res = $crud->readviewclass();
        
        $dataArray = array();
        if((mysql_num_rows($res)>0)){
            while($row = mysql_fetch_array($res)){
                $classID = $crud->readClassID($row['course_id']);
                
            if((mysql_num_rows($classID)>0)){
                while($row2 = mysql_fetch_array($classID)){
                    $data2['course_id'] = $row['course_id'];
                    $data2['course_name'] = $row2['course_name'];
                    $data2['teacher_name'] = $row2['teacher_name'];
                    $data2['course_place'] = $row2['course_place'];
                    $data2['Credit'] = $row2['Credit'];

                    $dataArray[] = $data2;

                    }
                }
            }
        }
        
       $this->view("viewclass", $dataArray);
    }
    //刪除選修課程
    function delcourse() {
        
        $crud =  $this->model("curd");
        
        if(isset($_GET['delid']))
        {
            $delid   = $_GET['delid'];
            $crud->delete($delid);
            echo "<script>alert('退選成功!!'); </script>";
            $this->readstuu();
            //header("Location: index.php");
        }
    }
    //登出系統
    function loginout() {
       	$_SEESION["iflogin"]=0;
    	//header("refresh:0;url=login2.php");
    	//銷毀現有的 Session連線紀錄
        session_destroy();
        //echo "<script>alert('已登出!!'); </script>";
        $this->view("index");
    	
    	
    }
    
}