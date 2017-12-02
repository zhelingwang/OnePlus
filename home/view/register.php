<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>一加手机 - 不将就</title>
		<link rel="icon" type="image/x-icon" href="img/icon.ico"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>	
		<link rel="stylesheet" type="text/css" href="css/store.css"/>	
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="css/register.css">
		<link rel="stylesheet" href="css/iconfont.css">
		<link rel="stylesheet" href="css/slideunlock.css">
		<script src="js/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.slideunlock.js"></script> 
	</head>
	<body>

<?php include './layout/header.html'; ?>


		<div id="login_box">	
			<div class="inner_box">
				<div class="login">
					<div class="text_title">登  录</div>
					<input type="text" placeholder="手机、邮箱或用户名" id="username" name="username"/>
					<div class="pwd">
						<input type="password" placeholder="密码6~16位，数字/字母/字符至少两种" id="password" name="password" />
						<i class="iconfont icon-htmal5icon08"></i>
					</div>	
					<div class="pwd">
						<input type="password" placeholder="确认密码" id="password_again" name="password_again" />
						<i class="iconfont icon-htmal5icon08"></i>
					</div>	

					<div id="slider">
			   			<div id="slider_bg"></div>
			    		<span id="label">|||</span> <span id="labelTip">拖动滑块验证</span> 
			    		<input type="hidden" id="sliderCode" value="0">
					</div>

					<div class="note">
								注册一加，即表示您同意一加的 <a href="http://account.oneplus.cn/agreement" target="_blank" class="user" track-key="6c9d0be1e66a35744ab1ff87d17a4e6c" et-attached="1" without-text-key="af7310c1cf4b18a78d35f50096090d0c" et-attached-click="1">用户协议</a>
					</div>

					<button id="register">确认</button>
					
					<div class="ft-operate"><a href="./login.php" class="link" track-key="48df6ff97941182586eaa834c996a91c" et-attached="1" without-text-key="b20e340edd60b2c4787606e318bc9c6e" et-attached-click="1"><i class="arrow"></i>登录</a></div>
				</div>

				<div class="other_ways">
					<div class="text_title">选择其他方式登录</div>
					<a href="" class="qq">
						<i class="iconfont icon-qq"></i>
						QQ 快捷登录
					</a>
					<a href="" class="xinlang">
						<i class="iconfont icon-xinlang"></i>
						新浪快捷登录
					</a>
				</div>
			</div>
		</div>
			
<?php include './layout/bottom.html'; ?>