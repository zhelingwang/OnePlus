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
						<span class="list">填写订单</span>
						<span class="finish">完成支付</span>
						<div class="line">
							<div class="sub_line" style="width: 37.5%;"></div>
						</div>
						<span class="circle c_left red_active bg_active"></span>
						<span class="circle c_center"></span>
						<span class="circle c_right"></span>
					</div>
				</div>

				<div class="good_box <?php if(count($skus)==0) echo 'show'; else echo 'empty'; ?>">
					<div class="top_bar"></div>
					<div class="good_list">
						<img src="img/shop_car.png" alt="">
						<p>您的购物车中没有商品！</p>
						<button onclick="javascript:window.location.href='./store.php'">去购物
							<div></div>
						</button>
					</div>
				</div>

				<div class="good_box <?php if(count($skus)==0) echo 'empty'; else echo 'show'; ?>">
					<div class="top_bar">
						<ul>
							<li>商品</li>
							<li></li>
							<li>操作</li>
							<li>小计</li>
							<li>数量</li>
							<li>价格</li>
						</ul>
					</div>
					
					<div class="good_list hasgoods">
						<ul>
							<?php foreach($skus as $sku){ ?>
							<li>
								<ul class="good-ul" skuid='<?php echo $sku['id'] ?>' >
									<li><img class="removeGood" onclick="removeCar(this)"  src="img/car-cancel.png" alt="" style="cursor: pointer;"></li>
									<li>¥  <span class="subtotal"><?php echo sprintf('%.2f',$sku['price']*$sku['car_count']); ?></span></li>
									<li>
										<span class="number">
											<span class="reduce-num">-</span>
											<span class="num"><?php echo $sku['car_count']; ?></span>
											<span class="add-num">+</span>
										</span>
									</li>
									<li>¥  <span class="price"><?php echo $sku['price']; ?></span></li>
									<li>
										<a href="#"><?php echo $sku['img']; ?></a>
									</li>
									<li><span><?php echo $sku['good_name']; ?> <?php if($sku['option_name']=="颜色") echo $sku['option_value']['name']; else echo $sku['option_value']; ?></span></li>
								</ul>
							</li>
							<?php } ?>
						</ul>
					</div>

					<script>

						function updateNum(){
							$(".sum>p>span").text($(".good_list>ul>li").length);
							console.log($(".sum>p>span").text());	
						}

						$(".add-num").click(function(){
							var temp = parseInt($(this).parent().find('.num').text());
							temp++;
							$(this).parent().find('.num').text(temp);
							renewTotalPrice();
							//ajax
							var skuid=$(this).parent().parent().parent().attr("skuid");
							$.post("../api/carApi.php?act=update",{count:temp,skuid:skuid})
						});
						$(".reduce-num").click(function(){
							var temp = parseInt($(this).parent().find('.num').text());
							if(temp !== 1){
								temp--;
								$(this).parent().find('.num').text(temp);
								renewTotalPrice();
								//ajax
								var skuid=$(this).parent().parent().parent().attr("skuid");
								$.post("../api/carApi.php?act=update",{count:temp,skuid:skuid})
							}

						});

			            function removeCar(e){
			                if(confirm('确定要删除吗？') === true){
			                    var skuid=$(e).parent().parent().attr("skuid");
			                    $.post("../api/carApi.php?act=delete",{skuid:skuid},function(data){
			                    	if(data==1){
			                    		$(e).parent().parent().parent().remove();
			                    		if($(".good-ul").length==0){
			                    			window.history.go(0);
			                    		}
			                    		renewTotalPrice();
			                    	}
			                    },'json');
			                }   
			            }

			            function renewTotalPrice(){
			            	var totalprice=0;
			            	$(".good-ul").each(function(){
			            		var subtotal=parseInt($(this).find(".num").html())*parseFloat($(this).find(".price").html());
			            		$(this).find(".subtotal").html(subtotal.toFixed(2));
			            		totalprice+=subtotal;
			            	})
			            	$(".totalprice").html(totalprice.toFixed(2));
			            }
					</script>

					<div class="sum">
						<p>已选择<span><?php echo count($sku); ?></span>件商品</p>
						<div class="price">
							<dl>
								<dt>购物车商品小计</dt>
								<dd>￥<span class="totalprice">
									<?php 
									$totalprice=0;
									foreach($skus as $sku){
										$totalprice+=$sku['price']*$sku['car_count'];
									}
									echo $totalprice;
									?>
								</span>
								</dd>
								<dt class="clear">运费</dt>
								<dd>￥0</dd>
							</dl>
							<dl>
								<dt class="clear">总价</dt>
								<dd class="sumprice">￥ <span class="totalprice"><?php  echo $totalprice; ?></span></dd>
							</dl>
							<a class="shopping" href="../">继续购物</a>
							<a class="pay" href="./checkout.php">去结算</a>
						</div>
					</div>
				</div>
				
				<script>
					$(function(){
						
						 updateNum();
					});
				</script>

				<div class="server_bar">
					<ul>
						<li>
							<a href=""><img src="img/return.png" alt="">
							<p>7天无理由退货</p></a>
						</li>
						<li>
							<img src="img/protection.png" alt="">
							<p>15天退货保障</p>
						</li>
						<li>
							<img src="img/return_date.png" alt="">
							<p>30天换货保障</p>
						</li>
						<li>
							<img src="img/gift.png" alt="">
							<p>99元全场包邮</p>
						</li>
					</ul>
				</div>

			</div>
		</div>
		

<?php include './layout/bottom.html'; ?>