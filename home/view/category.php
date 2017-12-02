<?php include '../api/categoryApi.php'; ?>


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
		<script src="js/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		
<?php include './layout/header.html'; ?>
		
		<div class="store1">
			<div class="storeAll">	
				<div class="store1Con">
					<div class="store1Part store1Part1">
						<a href="./category.php?id=1">
							<span class=""></span>
							<h2>手机</h2>
						</a>
					</div>
					<div class="store1Part store1Part2">
						<a href="./category.php?id=2">
							<span class=""></span>
							<h2>耳机/音箱</h2>
						</a>
					</div>
					<div class="store1Part store1Part3">
						<a href="./category.php?id=3">
							<span class=""></span>
							<h2>壳/后盖/膜</h2>
						</a>
					</div>
					<div class="store1Part store1Part4">
						<a href="./category.php?id=4">
							<span class=""></span>
							<h2>适配器/数据线</h2>
						</a>
					</div>
					<div class="store1Part store1Part5">
						<a href="./category.php?id=5">
							<span class=""></span>
							<h2>套装</h2>
						</a>
					</div>
					<div class="store1Part store1Part6">
						<a href="./category.php?id=6">
							<span class=""></span>
							<h2>生活馆</h2>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="store1Nav">
				<div class="store1NavOne">
					<div>
						<a href="">手机</a>
					</div>
					<div>
						<a href="">耳机/音箱</a>
					</div>
					<div>
						<a href="">壳/后盖/膜</a>
					</div>
					<div>
						<a href="">适配器/数据线</a>
					</div>
					<div>
						<a href="">套装</a>
					</div>
					<div>
						<a href="">生活馆</a>
					</div>
					<!--<a href="#"><span class="store1NavTwo glyphicon glyphicon-menu-down"></span></a>-->
				</div>
				<a href="#" class="store1NavTwo"><span class="glyphicon glyphicon-menu-down"></span></a>
		</div>
		
		
		<div class="store2">
			<span class="store4Pic">
				<a class="store4Big" href="javascript:;" style="height: 340px;background: url(<?php echo $category['banner_img']; ?>) no-repeat center center;"></a>
				<a class="store4Small" href="javascript:;">
					<img src="img/store3.2.1.small.jpg" />
				</a>
			</span>
		</div>
		
		

				
		<!--store4 begin-->
		<div class="store4">
			<div class="storeAll">
				<div class="store4One">
					<div class="store4Con">
						<?php
							foreach ($goods as $good) {
								echo "<div class='store4Part'>
									<a href='./detail.php?id=".$good["id"]."''>".$good["img"]."
										<h2>".$good["name"]."</h2>
										<span>¥&nbsp;".$good["minprice"]."</span>
									</a>
									</div>";
							}
						?>
						<div class="clearfix"></div>
					</div>
				</div>

			</div>
		</div>
		<!--store4 end-->
		
<?php include './layout/bottom.html'; ?>