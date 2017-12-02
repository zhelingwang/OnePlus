<?php include "../api/addressApi.php" ?>
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
		<link rel="stylesheet" href="css/login.css"><link rel="stylesheet" href="css/iconfont.css">	
		

		<link rel="stylesheet" href="css/userOrder.css">

		<link rel="stylesheet" href="css/iconfont.css">

		<script src="js/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	<body>
		<?php include './layout/header.html'; ?>
		<div id="login_box">	
			
			<div class="user-header">
				<img src="img/avatar-default.png" alt="">
				<a href="#">H1507532182718</a>
			</div>

			<div class="user-info" style="height: 705px;">
				<div class="user-nav">
					<div class="user-center">个人中心</div>

					<ul class="center-list">
						<li><a class="active my-order" href="./userOrder.php"><img src="img/order.png" alt=""> 我的订单</a></li>
						<li><a href=""><img src="img/youhui.png" alt=""> 优惠券</a></li>
						<li><a href=""><img src="img/lipinquan.png" alt=""> 礼品券</a></li>
						<li><a href=""><img src="img/number.png" alt=""> 邀请码</a></li>
						<li><a class="address" href="./address.php"><img src="img/position.png" alt=""> 收货地址</a></li>
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

				

				<div   class="content-panel edit-addr addr good_list">

					<div class="content-head">
						<span>地址列表</span>
						
						<span class="new-addr">
							<img src="img/add-addr.png" alt="">
						新增收货地址</span>
					</div>

					<div class="add-addr-info">
						<div class="name hidd">
							<label for="client-name">收货人姓名：</label>
							<input type="text" id="client-name" />
						</div>
						<div class="phone hidd">
							<label for="client-phone">收货人手机：</label>
							<input type="text" id="client-phone" />
						</div>
						<div class="addr hidd">
							<label for="client-addr">收货人地址：</label>
							<input type="text" id="client-addr" />
						</div>
						
						<a class="save hidd" href="#" onclick="saveAddress()">保存</a>
						<a class="cancel hidd" href="javascript:;">取消</a>
					</div>

					<div class="update-addr-info">
						<input type="hidden" id="client-addrid" />
						<div class="name hidd">
							<label for="client-name">收货人姓名：</label>
							<input type="text" id="client-name" />
						</div>
						<div class="phone hidd">
							<label for="client-phone">收货人手机：</label>
							<input type="text" id="client-phone" />
						</div>
						<div class="addr hidd">
							<label for="client-addr">收货人地址：</label>
							<input type="text" id="client-addr" />
						</div>
						
						<a class="save hidd" href="#" onclick="updateAddress()">保存</a>
						<a class="cancel hidd" href="javascript:;">取消</a>
					</div>

					<div class="content-body good_list">

						<div class="addr-box">
							<?php foreach($address as $addr){ ?>
							<div class="inner-box <?php if($addr['is_default']==1) echo 'active-addr-box'; ?>" addr_id="<?php echo $addr['id'];  ?>">
								<p class="name-phone">
									<span class="name"><?php echo $addr['name']; ?></span>
									<span class="pho"><?php echo $addr['phone']; ?></span>
									<img src="img/phoneNum.png" alt="">
								</p>
								<p class="all-addr"><?php echo $addr['addr']; ?></p>

								<div class="default-addr activeText">
									<?php if($addr['is_default']==1){echo "默认地址"; }else {echo "<span  onclick='toBeDefault(this)' >设为默认地址</span>";} ?>
									<img onclick="showUpdateAddr(this)" src="img/modify.png" alt="">
									<img class="delete" src="img/del-addr.png" alt="">
								</div>
							</div>
							<?php } ?>
						</div>
						
					</div>
				</div>

			</div>
			
			<div style="clear: both;"></div>
		</div>
		<script>

			$(".my-order").click(function(){
				$(".user-nav ul li a").removeClass("active");
				$(this).addClass("active");
				$(".edit-addr").css('display','none');
				$(".pay-order").css('display','block');
			});

			$(".address").click(function(){
				$(".user-nav ul li a").removeClass("active");
				$(this).addClass("active");
				$(".edit-addr").css('display','block');
				$(".pay-order").css('display','none');
			});

			$(".add-addr-info").css('display','none');
			$(".update-addr-info").css('display','none');
			var temp = 0;
			$(".order-num").click(function(){
				temp++;
				if(temp%2 === 1){
					$(this).find("img").attr('src','img/arrow-down.png');
				}else{
					$(this).find("img").attr('src','img/arrow-top.png');
				}
				$(".tab").slideToggle();
			});

			$(".cancel").click(function(){
				$(this).parent().slideToggle();
			});

			$(".new-addr").click(function(){
				$(".add-addr-info").slideToggle();
			});

			function showUpdateAddr(e){
				var addrid=$(e).parents(".inner-box").attr("addr_id");
				var name=$(e).parents(".inner-box").find(".name").text();
				var phone=$(e).parents(".inner-box").find(".pho").text();
				var addr=$(e).parents(".inner-box").find(".all-addr").text();
				$(".update-addr-info").find("#client-addrid").val(addrid);
				$(".update-addr-info").find("#client-name").val(name);
				$(".update-addr-info").find("#client-phone").val(phone);
				$(".update-addr-info").find("#client-addr").val(addr);
				$(".update-addr-info").slideDown();
			}
			


			$(".delete").click(function(){
				if(confirm('确定要删除吗？')){
					$(this).parents(".inner-box").remove();
					var addrid=$(this).parents(".inner-box").attr("addr_id");
					$.post("../api/addressApi.php?act=delete",{addrid,addrid})
				}
			});
			function saveAddress(){
				var name=$(".add-addr-info").find("#client-name").val();
				var phone=$(".add-addr-info").find("#client-phone").val();
				var addr=$(".add-addr-info").find("#client-addr").val();
				$.post("../api/addressApi.php?act=add",{name:name,phone:phone,addr:addr},function(data){
					if(data==1){
						window.history.go(0);
					}else{
						alert(data);
					}
				},'json')
			}
			function toBeDefault(e){
				var addrid=$(e).parents(".inner-box").attr("addr_id");
				$.post("../api/addressApi.php?act=setDefault",{addrid:addrid},function(data){
					console.log(data);
					if(data==1)
					window.history.go(0);
				})
			}
			function updateAddress(){
				var addrid=$(".update-addr-info").find("#client-addrid").val();
				var name=$(".update-addr-info").find("#client-name").val();
				var phone=$(".update-addr-info").find("#client-phone").val();
				var addr=$(".update-addr-info").find("#client-addr").val();
				$.post("../api/addressApi.php?act=update",{addrid:addrid,name:name,phone:phone,addr:addr},function(data){
					if(data==1){
						window.history.go(0);
					}
				})
			}
		</script>
    	<?php include './layout/bottom.html'; ?>