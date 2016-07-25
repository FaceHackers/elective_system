<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>個人基本資料表</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/elective_system-2/views/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="/elective_system-2/views/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="/elective_system-2/views/css/table.css" rel="stylesheet" type="text/css" />
        <script src="/elective_system-2/views/js/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="/elective_system-2/views/css/sweetalert.css">
        <?php
            require_once 'iflogin.php';
	       // require_once '../models/curd.php';
	       // $crud = new CRUD();
             if(isset($_SESSION["loginid"])){
                $username=$_SESSION["loginid"];
            }
	        //MySqli Select Query
	        //$results = $mysqli->query("select * from student where student_id='".$_SESSION["loginid"]."'");	
        ?>
    </head>
    <body>
    <?php
        require_once 'menu.php';
    ?>
     <table class="table-fill">
        
            <thead>
                <tr>
                    <th class="text-left">學號</th>
                    
                    <th class="text-left">姓名</th>
                    <th class="text-left">科系</th>
                    <th class="text-left">性別</th>
                    <th class="text-left">班級</th>
                </tr>
            </thead>
        <tbody class="table-hover">
         <?php
            
                foreach ($data as $row) {
                         
        ?>
            <tr>
                <td class="text-left"><?=htmlspecialchars($row["student_id"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["student_name"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["Dept"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["sex"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["class"]);?></td>
            </tr>
           <?php } ?>
               
        </tbody>
    </table>
    </body>
</html>