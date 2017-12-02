<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>登录</title>
		<link rel="icon" type="image/x-icon" href="img/icon.ico"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/store.css"/>	
		<link rel="stylesheet" href="css/login.css"><link rel="stylesheet" href="css/iconfont.css">	
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
					<input type="text" placeholder="手机、邮箱或用户名" name="username" id="username" />
					<div class="pwd">
						<input type="password" placeholder="密码" name="password" id="password" />
						<i class="iconfont icon-htmal5icon08"></i>
					</div>	

					<div id="slider">
			   			<div id="slider_bg"></div>
			    		<span id="label">|||</span> <span id="labelTip">拖动滑块验证</span> 
			    		<input type="hidden" id="sliderCode" value="0">
					</div>

					<a href="">忘记密码？</a>				
					<button id="login">确认</button>
					<p>没有一加账户？<a href="./register.php">立即注册</a></p>
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
