<?php date_default_timezone_set("Asia/Shanghai"); ?>
<?php include '../api/orderApi.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>完善用户信息</title>
		<link rel="icon" type="image/x-icon" href="img/icon.ico"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/store.css"/>	
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="css/iconfont.css">

		<link rel="stylesheet" href="css/car.css">
		<link rel="stylesheet" href="css/userOrder.css">

		<link rel="stylesheet" href="css/iconfont.css">

		<script src="js/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	<body>

		<?php include './layout/header.html'; ?>

		<div id="login_box">	
			<div class="user-header">
				<img src="img/avatar-default.png" alt="">
				<a href="#"><?php if(!isset($_SESSION)){session_start();} echo $_SESSION['userName']; ?></a>
			</div>

			<div class="user-info" <?php if(count($orders)==0) echo 'style="height: 705px;"'; ?>>  <!-- 购物车空的时候加 style="height: 705px;" -->
				<div class="user-nav">
					<div class="user-center">个人中心</div>

					<ul class="center-list">
						<li><a class="active" href="#"><img src="img/order.png" alt=""> 我的订单</a></li>
						<li><a href=""><img src="img/youhui.png" alt=""> 优惠券</a></li>
						<li><a href=""><img src="img/lipinquan.png" alt=""> 礼品券</a></li>
						<li><a href=""><img src="img/number.png" alt=""> 邀请码</a></li>
						<li><a href="./address.php"><img src="img/position.png" alt=""> 收货地址</a></li>
						<li><a href=""><img src="img/gift2.png" alt=""> 我的奖品</a></li>
					</ul>

					<div class="user-center">账户管理</div>
					<ul class="center-list">
						<li><a href="#"><img src="img/account.png" alt=""> 我的账户</a></li>
						<li><a href=""><img src="img/check.png" alt=""> 产品认证</a></li>
					</ul>

					<div class="user-center">售后服务</div>
					<ul class="center-list">
						<li><a href="#"><img src="img/baozhang.png" alt=""> 一加加多宝</a></li>
						<li><a href="#"><img src="img/date.png" alt=""> 退货单</a></li>
						<li><a href="#"><img src="img/exchange.png" alt=""> 换货单</a></li>
						<li><a href="#"><img src="img/repair.png" alt=""> 维修单</a></li>
					</ul>
				</div>
				<div class="content-panel">
					<?php if(count($orders)==0) { ?>
					<div class="content-head">
					</div>
					<div class="content-body" style=" min-height: 645px;">
						<div class="no-order" style="display: block;" >
							<img src="img/orderpage.png" alt="">
							<p>您还没有任何订单</p>
						</div>
					</div>
					<?php } ?>

					<?php foreach($orders as $order){ ?>
					<div class="content-head">
						<div class="order-num"> <!-- 购物车空的时候注释-->
							订单号：<span><?php echo $order['order_number']; ?></span>
							<img src="img/arrow-top.png" alt="">
						</div>
						<?php if($order['status']==0){ ?>
						<a href="#" class="pay">支付</a>
						<a href="#" class="cancel">取消订单</a>
						<?php }else if($order['status']==1||$order['status']==2){ ?>
						<a href="#" class="cancel">取消订单</a>
						<?php } ?>
						<span><?php $status=array('下单成功','支付成功','商品出库','交易完成'); echo $status[$order['status']]; ?></span>
					</div>

					<div class="content-body">
						<div class="order-detail"><!-- 购物车空的时候注释-->
							<div class="tab">
								<div class="order-state">
									<ul>
										<div class="state-line"></div>
										<div class="state-line white" style="width: <?php echo ($order['status'])*25; ?>%;"></div>
										<li>
											<span class="date"><?php if($order['submit_time']!=NULL) echo date("Y.m.d H:i",$order['submit_time']);  ?></span>
											<div class="dot">
												<div class="circle-dot <?php if($order['status']>=0) echo 'active'; ?>"></div>
											</div>
											<span class="state">下单成功</span>
										</li>
										<li>
											<span class="date"><?php if($order['pay_time']!=NULL) echo date("Y.m.d H:i",$order['pay_time']);  ?></span>
											<div class="dot">
												<div class="circle-dot <?php if($order['status']>=1) echo 'active'; ?>  "></div>
											</div>
											<span class="state">支付成功</span>
										</li>
										<li>
											<span class="date"><?php if($order['delivery_time']!=NULL) echo date("Y.m.d H:i",$order['delivery_time']);  ?></span>
											<div class="dot">
												<div class="circle-dot  <?php if($order['status']>=2) echo 'active'; ?> " ></div>
											</div>
											<span class="state">商品出库</span>
										</li>
										<li>
											<span class="date"><?php if($order['finish_time']!=NULL) echo date("Y.m.d H:i",$order['finish_time']);  ?></span>
											<div class="dot">
												<div class="circle-dot  <?php if($order['status']>=3) echo 'active'; ?>  " ></div>
											</div>
											<span class="state">交易成功</span>
										</li>
									</ul>
								</div>
						
								<div class="order-addr">
									<p>收货人：<span><?php echo $order['client_name']; ?></span></p>
									<p>收货地址：<span><?php echo $order['client_addr']; ?></span></p>
									<p>联系电话：<span><?php echo $order['client_phone']; ?></span></p>
								</div>
							</div>
						
							<div class="good_box show">
								<div class="top_bar">
									<ul>
										<li>商品</li>
										<li></li>
										<li>小计</li>
										<li>数量</li>
										<li>价格</li>
									</ul> 
								</div>
											
								<div class="good_list" style="padding: 0;">
									<ul>
										<?php foreach($order['skuInfo'] as $info){ ?>
										<li>
											<ul class="good-ul">
												<li>¥  <?php echo $info['count']*$info['price']; ?></li>
												<li>
													<span class="number">
													<span class="num"><?php echo $info['count']; ?></span>
													</span>
												</li>
												<li>¥  <?php echo $info['price']; ?></li>
												<li><span><?php echo $info['name']; ?></span></li>
												<li>
													<a href="#"><?php echo $info['img']; ?></a>
												</li>
											</ul>
										</li>
										<?php } ?>

									</ul>
								</div>
								<div class="sum">
									<p>订单金额：<span>¥  <?php echo $order['total_price']; ?></span></p>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>

				</div>
				<div style="clear: both;"></div>
			</div>

		</div>
		<script>
			var temp = 0;
			$(".order-num").click(function(){
				temp++;
				if(temp%2 === 1){
					$(this).find("img").attr('src','img/arrow-down.png');
				}else{
					$(this).find("img").attr('src','img/arrow-top.png');
				}
				//$(".tab").slideToggle();
				$(this).parents(".content-head").next().find(".tab").slideToggle();
			});
		</script>

<?php include './layout/bottom.html'; ?>
