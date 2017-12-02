<?php include '../api/detailApi.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>商城</title>
		<link rel="icon" type="image/x-icon" href="img/icon.ico"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/store.css"/>		
		<link rel="stylesheet" type="text/css" href="css/detail.css"/>		
		<script src="js/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>

<?php include './layout/header.html'; ?>
<script type="text/javascript">
$("body").addClass("detail");
</script>

		<div class="wrap">

			<div class="img-wrap">
				<?php echo $good['img']; ?>
			</div>

			<div class="msg-wrap">
				<h1><?php echo $good['name']; ?></h1>
				<div class="price"><?php echo $good['minprice']; ?></div>

				<?php 
					if($good['option_name']!=""){
						if($good['option_name']=="颜色"){
							$tab='<div class="args-block"><p>颜色<span></span></p>';
							foreach ($skus as $sku) {
								$tab.='<div skuid="'.$sku['id'].'" onclick="changeSku(this)" class="block" option_value="'.$sku['option_value']['name'].'">'.$sku['option_value']['img'].'</div>';
							}
							$tab.='</div>';
							echo $tab;
						}else{
							$tab='<div class="args-block"><p>'.$good['option_name'].'<span></span></p><div class="color-block">';
							foreach ($skus as $sku) {
								$tab.='<a skuid="'.$sku['id'].'" option_value="'.$sku['option_value'].'" onclick="changeSku(this)">'.$sku['option_value'].'<div></div></a>';
							}
							$tab.='</div></div>';
							echo $tab;
						}
					}
				?>
				
				<!-- <div class="args-block">
					<p>长度-<span>100</span>cm</p>
					<div class="color-block">
						<a>100cm <div></div></a>
						<a>200cm <div></div></a>
					</div>
				</div> -->
				

				<a href="javascript:;" onclick="buy()">立即购买</a>
				<!-- <a href="#">到货通知</a> -->
			</div>
		</div>
		<script>
			$(".detail .msg-wrap .args-block .block").click(function(){
				$(this).siblings().css('border','2px solid transparent');
				$(this).css('border','2px solid red');
			});

			$(".detail .msg-wrap .args-block a").click(function(){
				$(this).siblings().removeClass('focus');
				$(this).addClass('focus');
				$(this).siblings().find('div').css('display','none');
				$(this).find('div').css('display','block');
			});
		</script>

		<div class="args">
			<div class="args-nav">
				<a href="#info">商品详情</a>
				<a href="#args-num">规格参数</a>
				<a href="#problem">常见问题</a>
			</div>
				
			<div id="info" class="info">
				<div class="info-img">
					<div class="img">
						<!-- <img src="img/img-1.jpg" style="width: 100%" alt=""> -->
						<?php echo htmlspecialchars_decode($good['detail_img']); ?>
					</div>
					<!-- <div class="description">
						<div class="des-title">3D 弧边覆盖，<br />手感顺滑自在。</div>
						<div class="des-text">
							3D 弧边设计，贴合屏幕，与机身融为一体，手感舒适顺滑。蚀刻工艺与 CNC 精雕，开孔位置精准对位。
						</div>
					</div> -->
				</div>

				<!-- <div class="info-img">
					<div class="img">
						<img src="img/img-2.jpg" style="width: 100%" alt="">
					</div>
					<div class="description" style="top:-20%">
						<div class="des-title des-color">3D 弧边覆盖，<br />手感顺滑自在。</div>
						<div class="des-text des-color">
							3D 弧边设计，贴合屏幕，与机身融为一体，手感舒适顺滑。蚀刻工艺与 CNC 精雕，开孔位置精准对位。
						</div>
						<div class="des-tip des-color" style="margin-top: 10%;">
							* 温馨提醒：3D 钢化膜为屏幕提供贴身保护，屏幕边缘约有 0.9 mm 的覆盖；保护膜内腔精雕存在公差，可能会出现小概率不贴合的情况。
						</div>
					</div>
				</div>
				
				<div class="info-img">
					<div class="img">
						<img src="img/img-3.jpg" style="width: 100%" alt="">
					</div>
					<div class="description" style="left: 5%">
						<div class="des-title">3D 弧边覆盖，<br />手感顺滑自在。</div>
						<div class="des-text">
							3D 弧边设计，贴合屏幕，与机身融为一体，手感舒适顺滑。蚀刻工艺与 CNC 精雕，开孔位置精准对位。
						</div>
					</div>
				</div> -->
			</div>

			<div id="args-num" class="args-num">
				<table>
					<tbody>
						<?php
						$tab="";
						foreach ($good['parameter'] as $key => $val) {
							if($val!=""){
								$tab.="<tr><td class='border-line'>".$key."</td>
							<td></td>
							<td class='border-line'>".$val."</td></tr>";
							}
						}
						echo $tab;

						?>
						<!-- <tr>
							<td class="border-line">尺寸</td>
							<td></td>
							<td class="border-line">150.78*70.66*1.47mm</td>
						</tr>
						<tr>
							<td class="border-line">重量</td>
							<td></td>
							<td class="border-line">24g</td>
						</tr>
						<tr>
							<td>材质</td>
							<td></td>
							<td>玻璃</td>
						</tr> -->
					</tbody>
				</table>
			</div>

			<div id="problem" class="problem">
				<!-- <div class="pro-innerwrap"> -->
					<div class="problem-block">
						<div class="title">三包服务介绍</div>
						<div class="text">
							<ul>
								<li>
                                承保周期：充电器、数据线、移动电源、耳机（有线/无线耳机），自签收之日起，可享受七天无理由退货，十五天换货，一年内保修（森海塞尔耳机两年内保修）；皮套、保护壳、屏幕保护膜、所有生活馆商品，自签收之日起，可享受七天无理由退货，十五天换货。
	                            </li>
	                            <li>
	                                承保周期：充电器、数据线、移动电源、耳机（有线/无线耳机），自签收之日起，可享受七天无理由退货，十五天换货，一年内保修（森海塞尔耳机两年内保修）；皮套、保护壳、屏幕保护膜、所有生活馆商品，自签收之日起，可享受七天无理由退货，十五天换货。
	                            </li>
							</ul>
						</div>
					</div>

					<div class="problem-block">
						<div class="title">三包服务介绍</div>
						<div class="text">
							<ul>
								<li>
                                承保周期：充电器、数据线、移动电源、耳机（有线/无线耳机），自签收之日起，可享受七天无理由退货，十五天换货，一年内保修（森海塞尔耳机两年内保修）；皮套、保护壳、屏幕保护膜、所有生活馆商品，自签收之日起，可享受七天无理由退货，十五天换货。
	                            </li>
	                            <li>
	                                承保周期：充电器、数据线、移动电源、耳机（有线/无线耳机），自签收之日起，可享受七天无理由退货，十五天换货，一年内保修（森海塞尔耳机两年内保修）；皮套、保护壳、屏幕保护膜、所有生活馆商品，自签收之日起，可享受七天无理由退货，十五天换货。
	                            </li>
							</ul>
						</div>
					</div>
					
				<!-- </div> -->
			</div>

		</div>
		<script>
			$(window).scroll(function(){
				if($(window).scrollTop() > 950 ){
					$(".detail .args-nav").css('position','fixed');
					$(".detail .args-nav").css('top','0');
				}else{
					$(".detail .args-nav").css('position','static');
				}

				var info = $("#info").offset().top;
				var args = $("#args-num").offset().top;
				var problem = $("#problem").offset().top;

				console.log(args);

				if($(window).scrollTop() < info){
					$(".detail .args-nav>a").removeClass('active');
				}
   
				if($(window).scrollTop() >= info){
					$(".detail .args-nav>a").removeClass('active');
				 	$(".detail .args-nav>a:nth-child(1)").addClass('active');
				}

				if($(window).scrollTop() >= args){
					$(".detail .args-nav>a").removeClass('active');
				 	$(".detail .args-nav>a:nth-child(2)").addClass('active');
				}

				if($(window).scrollTop() >= problem){
					$(".detail .args-nav>a").removeClass('active');
				 	$(".detail .args-nav>a:nth-child(3)").addClass('active');
				}
				 
				 // console.log("cur"+$(window).scrollTop());
			});
		</script>
		<script type="text/javascript">
			var chose_sku_id=<?php if($good['option_name']!="") echo json_encode("");else echo json_encode($skus[0]['id']) ?>;
			function changeSku(e){
				var option_value=$(e).attr("option_value");
				var skus=<?php echo json_encode($skus); ?>;
				var option_name=<?php echo json_encode($good['option_name']); ?>;
				chose_sku_id=$(e).attr("skuid");
				if(option_name!=""){
					if(option_name=="颜色"){
					for(var i=0;i<skus.length;i++){
						if(skus[i]['option_value']['name']==option_value){
							var chose_sku=skus[i];
						}
					}
					var good_name=<?php echo json_encode($good['name']); ?>;
					$(".msg-wrap>h1").html(good_name+" "+chose_sku['option_value']['name']);
					$(".price").html(chose_sku['price']);
					$(".args-block span").html("-"+chose_sku['option_value']['name']);
					$(".img-wrap").html(chose_sku['img']);
				}else{
					for(var i=0;i<skus.length;i++){
						if(skus[i]['option_value']==option_value){//如果是颜色 则是skus[i]['option_value']
							var chose_sku=skus[i];
						}
					}
					var good_name=<?php echo json_encode($good['name']); ?>;
					$(".msg-wrap>h1").html(good_name+" "+chose_sku['option_value']);
					$(".price").html(chose_sku['price']);
					$(".args-block span").html("-"+chose_sku['option_value']);
					$(".img-wrap").html(chose_sku['img']);
				}
				}
			}
			function buy(){
				if(chose_sku_id==""){
					alert("请选择商品");
				}else{
					$.post("../api/carApi.php?act=add",{skuid:chose_sku_id},function(data){
						if(data==1){
							window.location.href="./car.php";
						}else if(data==-1){
							alert("请先登录");
							window.location.href="./login.php";
						}else{
							alert("加入购物车错误");
						}
					},'json');
				}
			}
		</script>
	
<?php include './layout/bottom.html'; ?>