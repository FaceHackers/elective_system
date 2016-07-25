<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>檢視選課清單</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/elective_system-2/views/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="/elective_system-2/views/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="/elective_system-2/views/css/table.css" rel="stylesheet" type="text/css" />
        <script src="/elective_system-2/views/js/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="/elective_system-2/views/css/sweetalert.css">
        <?php
            require_once 'iflogin.php';
	       // require_once '../models/curd.php';
	       //  $crud = new CRUD();
             if(isset($_SESSION["loginid"])){
                $username=$_SESSION["loginid"];
            }
        ?>
    </head>
    <body>
        <?php
        require_once 'menu.php';
        ?>
        <table class="table-fill">
            <thead>
                <tr>
                    <th class="text-left">課程編號</th>
                    <th class="text-left">課程名稱</th>
                    <th class="text-left">教師姓名</th>
                    <th class="text-left">上課地點</th>
                    <th class="text-left">學分</th>
                    <th class="text-left">選課</th>
                </tr>
            </thead>
        <tbody class="table-hover">
       
             <?php
               
                foreach ($data as $row) {
             ?>
       
            <tr>
                <td class="text-left"><?=htmlspecialchars($row["course_id"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["course_name"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["course_name"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["course_place"]);?></td>
                <td class="text-left"><?=htmlspecialchars($row["Credit"]);?></td>
                <td class="text-left"><a href="/elective_system-2/curd/delcourse?delid=<?=htmlspecialchars($row["course_id"]);?>" >退選</a></td>
            </tr>
        <?php } ?>
            </tbody>
        </table>
    	
    </body>
</html>