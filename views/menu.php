 <html>
  <ul id="nav">
            <li><a href="#"><?=$username?> 你好!!</a></li>
            <li><a href="readstu?<?=htmlspecialchars($_SESSION["loginid"])?>">個人基本資料</a>
            </li>
            <li><a href="classview">選修課清單</a>
            </li>
            <li><a href="readstuu">檢視選修課清單</a></li>
            <li><a href="loginout">登出系統</a></li>
  </ul>
      
</html>