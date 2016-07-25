$(document).ready(function(){

/*SelArea*/
$("#SelArea").css('height', $(window).height()-16);
$(window).resize(function(){ $("#SelArea").css('height', $(window).height()-16); }); 
$("#content_1").css('height', $(window).height()-160);
$(window).resize(function(){ $("#content_1").css('height', $(window).height()-160); }); 

var wborder=240+16; //左側視窗總寬
/*Body-Top*/
$("#Body-Top").css('width', $(window).width()-wborder);
$(window).resize(function(){ $("#Body-Top").css('width', $(window).width()-wborder); }); 

/*Body-Fot*/
$("#Body-Fot").css('width', $(window).width()-wborder);
$(window).resize(function(){ $("#Body-Fot").css('width', $(window).width()-wborder); }); 

/*Body-iframe*/
$("#Body-iframe").css('width', $(window).width()-wborder);
$(window).resize(function(){ $("#Body-iframe").css('width', $(window).width()-wborder); }); 
$("#Body-iframe").css('height', $(window).height()-100);
$(window).resize(function(){ $("#Body-iframe").css('height', $(window).height()-100); }); 

});

function MsgYesNoOn() { $('#MsgBg').fadeIn(500); $("#MsgYesNo").show(500); };
function MsgYesNoOff() { $('#MsgBg').fadeOut(500);  $("#MsgYesNo").hide(500); };
function MsgAlertOn() { $("#MsgBg").fadeIn(100); $("#MsgAlert").show(500); };
function MsgAlertOff() { $("#MsgBg").fadeOut(100); $("#MsgAlert").hide(500); };

$('.formsty').ready(function(){
	$('input[type="text"], input[type="password"], input[type="file"], select, textarea').css("background-color","#f6f6f6");
	$('input[type="text"], input[type="password"], input[type="file"], select, textarea').focus(function(e) { $(this).css("background-color","#FCE6F2"); });
	$('input[type="text"], input[type="password"], input[type="file"], select, textarea').blur(function(e){ $(this).css("background-color","#f6f6f6"); });
});

$(document).ready(function(){
	setTimeout(function(){ $('.loginimg').fadeOut(1000); }, 1000);
	setTimeout(function(){ $('.logintab').animate({top:"900px"}); }, 1500);
	$('#LoginBg').show();
	$('form input, select, textarea').each(function() { $(this).addClass('MsgDefBorder'); });
	$('#SendBtn').click(function (){ 
		$('form input, select, textarea').each(function() { $(this).removeClass('MsgErrBorder'); });
		$('.chkval').each(function() {
			var cval= $(this).val(); 
			if (cval=='') {
			$(this).addClass('MsgErrBorder');
			MsgAlertOn(); $('.MsgTxt').text('資料尚未填寫齊全...'); 
			$(this).css("background-color","#FCE6F2");
			err='1'; return false; }  else { 
				if ($(this).hasClass('chkdual')) {
					var chkpwd1=$('#chkpwd1').val();
					var chkpwd2=$('#chkpwd2').val(); 
					if (chkpwd1 != chkpwd2) {
							MsgAlertOn(); $('.MsgTxt').text('請再次確定您輸入的認証碼。'); 
							$(this).css("background-color","#FCE6F2"); err='1'; return false; }
				}
				if ($(this).hasClass('chkennum')) {
					var isEnnum = /^[0-9a-zA-Z]+$/;
					var Ennum = $(this).val();
					if (!isEnnum.test(Ennum)) {
						MsgAlertOn(); $('.MsgTxt').text('您填寫的格式有誤，只限英文大小寫及數字。'); 
						$(this).css("background-color","#FCE6F2"); err='1'; return false; }
				}
			err='0';
			} //else end
		}); //each end

if (err==0) {
		var path=$('#SendBtn').attr("path");
		if (path=='index_chk') {
			$.ajax({url:'index_chk.php', cache:false, dataType:'html', type:'POST', data: $("#CodeForm").serialize(),
				beforeSend:function(){ $('#loadingImg').show(); $('#formhide').hide(); },
				success:function(response){ $('#loadingImg').hide(); $('#formhide').show(); $('#msg').html(response); }
			}); }
		if (path=='chtypes') {
			$.ajax({url:'chtypes', cache:false, dataType:'html', type:'POST', data: $("#CodeForm").serialize(),
				beforeSend:function(){ $('#FormImg').show(); $('#SendBtn').hide(); },
				success:function(response){ $('#FormMsg').html(response); }
			}); }
		if (path=='z') {
			$.ajax({url:'z.php', cache:false, dataType:'html', type:'POST', data: $("#CodeForm").serialize(),
				beforeSend:function(){ $('#FormImg').show(); $('#SendBtn').hide(); },
				success:function(response){ $('#FormMsg').html(response); }
			}); }
} else { return false; } //err==0 end
	}); //click end
});
