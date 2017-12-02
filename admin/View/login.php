<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-登陆</title>
<script src="./js/jquery2.14.min.js"></script>
<script src="./js/jquery.cookie.js"></script>

<script>
//刷新cookie中的计数器清零
function freshen(){
	$.cookie('clickCount',0);
}
//$(freshen);
//单击图片重新生成验证码
function mdImg(){
	$("#reflash").click(function(){
		//alert('ppp');
		//$("#img").css('cursor','pointer');
		$.cookie('clickCount',0);
		$("#imgs").attr('src',"../Api/bgCodeApi.php?t="+Math.random());
		setTimeout(getChars,200);
	})
}
$(mdImg);
//失去焦点提交验证码
function checkCode(){
	$("#txt").blur(function(){
			$.post("{:U('Index/checkCode')}",{"codes":$("#txt").val()},function(data){
			//alert(data)
				if(data=="check_code_ok"){
						//$("#tishi").html("<img src='__PUBLIC__/images/ok.png' >");
						$("#tishi").css("background","url('__PUBLIC__/images/ok.png') no-repeat center");
				}else{		
						//$("#tishi").html("<img src='__PUBLIC__/images/ng.png' >");
						$("#tishi").css("background","url('__PUBLIC__/images/ng.png') no-repeat center");
				}
			
			});
	})

}
$(checkCode)
</script>
<style>
*{
	text-align: center;
}
html,body{
	padding: 0;
	margin: 0;
}
body{
	font-family: "Microsoft YaHei",Arial;
	background: #e5e5e5;
}
#regbox{
	position: relative;
	width:600px;
	min-height:320px;
	margin: 0 auto;
	margin-top: 150px;
	padding: 20px;
	border-radius: 20px;
	background-color: #efefef;
	box-shadow: 0 0 7px rgba(6,0,1,.2);
}
h1{
	display: inline-block;
	color:#eb0028;
	font-size:28px;
	font-weight: 100;
	vertical-align: middle;
}
h3{
	font-weight: normal;
	color: #333;
}
#txt{
	width:120px;

}

#img ,#txt{
	margin-top:12px;
	float:left;
}
input{
	margin:10px 0px;
	text-align: left;
	outline: none;
}
#sub{
	clear:both;
	margin-top: 30px;
	width:436px;
	height:40px;
	line-height:40px;
	font-size:20px;
	cursor:pointer;
	text-align: center;
	color: #fff;
	background-color: #eb0028;
	border-radius: 4px;
	border: none;
}
#sub:hover{
	background-color: #ff002b;
}
</style>
<link href="__PUBLIC__/css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>

<form method="post" name="form" action="../Api/adminApi.php?act=login"}>
<div id="regbox">
<img src="http://statics.oneplus.cn/v2/img/home/logo.png?20171018193601" style="position:absolute;top:32px;left:30px;">
<h1>一加手机网上商城后台管理系统<h1>
	<h3>管理员登录</h3>
	用&nbsp;&nbsp;户&nbsp;&nbsp;名：<input type="text" name="name"/><br/>
	密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"/><br/>
	
	<!-- <img src="../Api/codeApi.php" id="img" /><br/> -->
	<div id="tishi" width="1000px" height='32px'></div>
	<!-- <img src="../Api/bgCodeApi.php" id="imgs"/>
	
	<span id="reflash" style="cursor:move;">换一张</span>
	<br/> -->

	<input type="submit" name="sub" id="sub" value="登录"/>
</div>
</form>

<include file="./Public/tpl/foot.html" />
</body>
</html>
