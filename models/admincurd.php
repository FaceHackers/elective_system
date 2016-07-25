  <?php
  session_start();
    echo "<meta charset='utf-8'>"; 
    require_once 'dbconfig.php';
    //require_once 'iflogin.php';
    class admincurd {
        public function __construct() {
            $db = new DB_con();
        }
        //確認使用者
        public function check($user,$pass) {
            $sql="SELECT * FROM teacher WHERE teacher_id='$user' AND password='$pass';";
            $result = mysql_query($sql);
            return mysql_fetch_row($result);
        }
        //讀取課程資料
        public function readclass() {
            return mysql_query("select * from course order by course_id");
        }
        //判斷課程資料
        public function createclass($course_id,$course_name,$teacher_name,$course_place,$Credit) {
            $sql = "select * from course where course_id=".$course_id;
            $result = mysql_query($sql);
		    return mysql_num_rows($result);
        }
        //新增課程資料
        public function newclass($course_id,$course_name,$teacher_name,$course_place,$Credit) {
            
            $sql = "INSERT INTO course (course_id,course_name,teacher_name,course_place,Credit) VALUES ('$course_id','$course_name','$teacher_name','$course_place','$Credit')";
            $result = mysql_query($sql);
            return $result;
        }
        //修改課程
        public function update($course_name,$teacher_name,$course_place,$Credit,$course_id)
         {
            return mysql_query("UPDATE course SET course_name='$course_name', teacher_name='$teacher_name', course_place='$course_place', Credit='$Credit' WHERE course_id=".$course_id);
         }
        //判斷學生資料
        public function createstu($student_id,$student_name,$Dept,$sex,$class,$password) {
            $sql = "select * from student where student_id=".$student_id;
            $result = mysql_query($sql);
		    return mysql_num_rows($result);
        }
        //新增學生資料
        public function newstu ($student_id,$student_name,$Dept,$sex,$class,$password){
            $sql = "INSERT INTO student (student_id,student_name,Dept,sex,class,password) VALUES ('$student_id','$student_name','$Dept','$sex','$class','$password')";
            $result = mysql_query($sql);
            return $result;
        }
        //讀取學生資料
        public function readstu() {
            return mysql_query("select * from student order by student_id");
        }
        //讀取修改資料
        public function readid($edt_id) {
        return mysql_query("SELECT * FROM course WHERE course_id=".$edt_id);
        }
    }