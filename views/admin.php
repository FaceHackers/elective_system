<?php 
    session_start(); 
    
    // require_once '../models/admincurd.php';
    // $crud = new AdminCRUD();
  
?>
 
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="utf-8">
<title>後台登入系統</title>
<link rel="stylesheet" href="/elective_system-2/views/css/admin.css">
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="/elective_system-2/views/css/layout.js"></script>
<link rel="shortcut icon" href="/elective_system-2/views/images/urlicon.ico"/>
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script language="javascript" type="text/javascript">
	var isVerifyPass = false;
	
	var verifyCallback = function(response) {
        if(response.length >= 0){
        	isVerifyPass = true;
        }
    };


	var onloadCallback = function() {
	    grecaptcha.render('html_element', {
	      'sitekey' : '6LfiUSUTAAAAACsX_ijeXadb1Dq-yMfi0WEAkYcD',
	      'callback' : verifyCallback
	    });
	};


$( document ).ready(function() {
	$('#SendBtn').click(function(){
		if(isVerifyPass){
			$('#CodeForm').submit();
		}else{
			alert("請通過機器人驗證");
		}
	});
});



</script>


</head>
<body>

<form id="CodeForm" method="post" class="formsty" action="/elective_system-2/admin/admin">
<div class="logintab">

	<li class="img2"><img src="/elective_system-2/views/images/login2.png"></li>

	<li class="tab1"><span class="c2">※</span> 登入帳號：<input type="text" name="pwd1" id="pwd1" class="chkval" size="50" autocomplete="off" required/></li>
	<li class="tab1"><span class="c2">※</span> 登入密碼：<input type="password" name="pwd2" id="pwd2" class="chkval" size="50" autocomplete="off" required/></li>
	
    
	<li class="tab1" style="text-align:center;margin-top:18px;padding-bottom:10px;" id="formhide"><input type="button" id="SendBtn" class="formbtn" name="check" value="登入管理系統" ></li>
	<br>
	<!--<div class="g-recaptcha" id="g-recaptcha-response" data-sitekey="6LfiUSUTAAAAACsX_ijeXadb1Dq-yMfi0WEAkYcD" data-callback="recaptchaCallback"></div>-->
	<div id="html_element"></div>

</div>
</form>


<div id="msg"></div>
<div class="loginimg"><img src="/elective_system-2/views/images/loading-14.gif"></div>
<div id="LoginBg"></div>
<!--<div id="MsgAlert">-->
	<!--<div class="MsgArea">-->
	<!--	<li class="tit">系統訊息確認視窗</li><img src="images/alert.png" class="imgs">-->
	<!--	<li class="msg"><span class="MsgTxt"></span></li>-->
	<!--	<li class="btn">-->
	<!--		<a class="btnYes" onclick="MsgAlertOff();">確定<span class="MsgTxtBtn"></span></a>-->
	<!--	</li>-->
<!--	</div>-->
<!--</div>-->
</body>
</html>



