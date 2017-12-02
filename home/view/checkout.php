<?php include '../api/carApi.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>我的购物车</title>
		<link rel="icon" type="image/x-icon" href="img/icon.ico"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/store.css"/>	
		<link rel="stylesheet" href="css/car.css">	
		<link rel="stylesheet" href="css/checkout.css">	
		<script src="js/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>

<?php include './layout/header.html'; ?>
		<div class="content_wrap">	
			<div id="main"> 
				<div class="main_flow">
					<div class="flow_line">
						<span class="car red_active">购物车</span>
						<span class="list red_active">填写订单</span>
						<span class="finish">完成支付</span>
						<div class="line">
							<div class="sub_line"></div>
						</div>
						<span class="circle c_left red_active bg_active"></span>
						<span class="circle c_center bg_active"></span>
						<span class="circle c_right"></span>
					</div>
				</div>

				<div class="good_box empty">
					<div class="top_bar"></div>
					<div class="good_list">
						<img src="img/shop_car.png" alt="">
						<p>您的购物车中没有商品！</p>
						<button>去购物
							<div></div>
						</button>
					</div>
				</div>
	
				<div class="good_box show">
					<div class="top_bar">
						<ul>
							<li>收货人信息</li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
					
					<div class="good_list">

						<!-- <div class="name">
							<label for="client-name">收货人姓名：</label>
							<input type="text" id="client-name" />
						</div>
						<div class="phone">
							<label for="client-phone">收货人手机：</label>
							<input type="text" id="client-phone" />
						</div>
						<div class="addr">
							<label for="client-addr">收货人地址：</label>
							<input type="text" id="client-addr" />
						</div> -->

						<div class="addr-box">
							<?php foreach($address as $a){ ?>
							<div class="inner-box <?php if($a['is_default']==1) echo 'active-addr-box'; ?> " addr_id="<?php echo $a['id']; ?>"> <!--active-addr-box-->
								<p class="name-phone">
									<span class="name"><?php echo $a['name']; ?></span>
									<span class="pho"><?php echo $a['phone']; ?></span>
									<img src="img/phoneNum.png" alt="">
								</p>
								<p class="all-addr">
									<?php echo $a['addr']; ?>
								</p>

								<div class="default-addr activeText">
									<?php if($a['is_default']==1){echo "默认地址"; }else {echo "<a onclick='toBeDefault(this)' href='javascript:;'>设为默认地址</a>";} ?>
								</div>
							</div>
							<?php } ?>

							<div class="add-addr">
								<img src="img/add-addr.png" alt="">
								增加地址
							</div>
						</div>
						
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
						<a class="save hidd" onclick="saveAddress()">保存</a>
						<a class="cancel hidd" href="#">取消</a>
						<script>
							$(".hidd").css('display','none');
							$(".add-addr").click(function(){
								$(".hidd").toggle();
							});
							function saveAddress(){
								var name=$("#client-name").val();
								var phone=$("#client-phone").val();
								var addr=$("#client-addr").val();
								$.post("../api/addressApi.php?act=add",{name:name,phone:phone,addr:addr},function(data){
									if(data==1){
										window.history.go(0);
									}else{
										alert(data);
									}
								},'json')
							}
							$(".inner-box").click(function(){
								$(".inner-box").removeClass("active-addr-box");
								$(this).addClass("active-addr-box");
							})
							function toBeDefault(e){
								event.stopPropagation();
								var addrid=$(e).parents(".inner-box").attr("addr_id");
								$.post("../api/addressApi.php?act=setDefault",{addrid:addrid},function(data){
									console.log(data);
									if(data==1)
									window.history.go(0);
								})
							}

						</script>

						
						<div class="list-content">
							商品清单
						</div>

						<ul>
							<?php foreach($skus as $sku){ ?>
							<li>
								<ul class="good-ul">
									<li>¥  <?php echo $sku['car_count']*$sku['price']; ?></li>
									<li>X <?php echo $sku['car_count']; ?></li>
									<li>¥  <?php echo $sku['price']; ?><br />
										<span class="less">节省0.0¥</span></li>
									<li>
										<a href="#"><?php echo $sku['img']; ?></a>
									</li>
									<li><span><?php echo $sku['good_name']; ?> <?php if($sku['option_name']=="颜色") echo $sku['option_value']['name']; else echo $sku['option_value']; ?></span></li>
								</ul>
							</li>
							<?php } ?>
						</ul>

						<!-- <div id="good-args">
							<ul>
								<li>参数1</li>
								<li>参数22</li>
							</ul>
											</div> -->

					</div>

					<div class="sum">
						<p>商品总金额：<span>¥ <?php $totalprice=0; foreach($skus as $sku){$totalprice+=$sku['price']*$sku['car_count'];}echo  $totalprice; ?></span></p>
						<p>优惠金额：<span>¥ 0.0</span></p>
						<p>运费：<span>¥ 0.0</span></p>
						<p>支付方式：<span>在线支付</span></p>
						<div class="up-order">
							<div>应付金额：<span>¥ <?php echo  $totalprice; ?></span></div>
							<a href="javascript:;" onclick="submitOrder()">提交订单</a>
						</div>
					</div>
					<script type="text/javascript">
						function submitOrder(){
							var userid=<?php if(!isset($_SESSION)) session_start(); echo json_encode($_SESSION['userId']); ?>;
							if($(".inner-box").length!=0){
								if($(".active-addr-box").length!=0){
									var client_name=$(".active-addr-box").find(".name").text();
									var client_phone=$(".active-addr-box").find(".pho").text();
									var client_addr=$(".active-addr-box").find(".all-addr").text();
									var skus=<?php echo json_encode($skus); ?>;
									$.post("../api/orderApi.php?act=add",{userid:userid,client_name:client_name,client_phone:client_phone,client_addr:client_addr,skus:skus},function(data){
										//console.log(data);
										if(data==1){
											alert("生成订单成功");
											window.location.href="./userOrder.php";
										}else{
											alert("生成订单失败");
										}
									},'json')
								}else{
									alert("请选择地址");
								}
							}else{
								alert("请添加地址");
							}
						}
					</script>
				</div>
				

			</div>
		</div>
		
<?php include './layout/bottom.html'; ?>