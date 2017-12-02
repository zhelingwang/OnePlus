<?php include "../api/storeApi.php"; ?>
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
				<a class="store4Big" href="detail.php?id=7" style="background: url(./img/store3.2.1.jpg) no-repeat center center;cursor: auto;"></a>
				<a class="store4Small" href="detail.php?id=7">
					<img src="img/store3.2.1.small.jpg" />
				</a>
			</span>
		</div>
		
		
		<!--store3 begin-->
		<div class="storeAll">			
			<div class="store3">								 
				<div class="store3Part">
					<a href="#">
						<img src="img/store3.3.1.jpg" />
					</a>
				</div>
				<div class="store3Part">
					<a href="#">
						<img src="img/store3.3.2.jpg" />
					</a>
				</div>
				<div class="store3Part">
					<a href="#">
						<img src="img/store3.3.3.jpg" />
					</a>
				</div>
				<div class="clearfix"></div> <!--撑开外面的div，高度自适应-->
			</div>				
		</div>
		<!--store3 end-->
				
		<!--store4 begin-->
		<div class="store4">
			<div class="storeAll">
				<div class="store4One">
					<h3>OnePlus 5 热销商品</h3>
					<div class="store4Con">
						<?php foreach($part as $p){ ?>
						<div class="store4Part">
							<a href="./detail.php?id=<?php echo $p['id']; ?>">
								<?php echo $p['img'] ?>
								<h2><?php echo $p['name'] ?></h2>
								<span>¥&nbsp;<?php echo $p['minprice'] ?></span>
							</a>
						</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<div class="store4Two">
					<h3>一加生活周边</h3>
					<div class="store4Con">
						<?php foreach($life as $l){ ?>
						<div class="store4Part">
							<a href="./detail.php?id=<?php echo $l['id']; ?>">
								<?php echo $l['img'] ?>
								<h2><?php echo $l['name'] ?></h2>
								<span>¥&nbsp;<?php echo $l['minprice'] ?></span>
							</a>
						</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<!--store4 end-->
		
<?php include './layout/bottom.html'; ?>