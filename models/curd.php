<?php
    session_start();
    echo "<meta charset='utf-8'>"; 
    require_once 'dbconfig.php';
    
    class curd {
        public function __construct() {
            $db = new DB_con();
        }
        //確認使用者
        public function check($user,$pass) {
            $sql="SELECT * FROM student WHERE student_id='$user' AND password='$pass';";
            $result = mysql_query($sql);
            return  mysql_fetch_row($result);
        }
        //讀取課程資料
        public function readclass() {
            return mysql_query("select * from course order by course_id");
        }
        //判斷課程資料
        public function createclass($username,$addid) {
            $sql = "select * from stu_class where course_id=".$addid;
            $result = mysql_query($sql);
		    return mysql_num_rows($result);
        }
         //新增課程資料
        public function newclass ($username,$addid){
            $sql = "INSERT INTO stu_class (student_id, course_id) VALUES ('$username', '$addid')";
            $result = mysql_query($sql);
            return $result;
        }
         //讀取選課課程資料
        public function readviewclass() {
            $stu = $_SESSION["loginid"];
            return mysql_query("select * from stu_class where student_id='".$stu."'");
        }
        //刪除課程資料表
		public function delete($delid) {
		    return mysql_query("DELETE FROM stu_class WHERE course_id=".$delid);
		}
		//讀取學生基本資料
		public function readstu() {
		    return mysql_query("select * from student where student_id='".$_SESSION["loginid"]."'");
		}
		
		public function readClassID($course_id){
		    return mysql_query("select * from course where course_id ='".$course_id."'");
		}
    }
?>