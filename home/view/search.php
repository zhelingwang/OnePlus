<?php include '../api/searchApi.php' ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>商城</title>
		<link rel="icon" type="image/x-icon" href="img/icon.ico"/>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/search.css"/>		
		<script src="js/jquery-1.11.3.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
	<body>
		<?php include './layout/header.html'; ?>
		
		<div class="store2">
			<span class="store4Pic">
				<span class="store4Big">
					<div class="search-text">
						<p>搜索'<span class="search-title"><?php echo $key; ?></span>'的结果</p>
					<p>共<span class="search-number"><?php echo count($goods); ?></span>件商品</p>
					</div>
				</span>	
			</span>
		</div>

		<!--store4 begin-->
		<div class="store4">
			<div class="storeAll">
				<div class="store4One">

					<?php if(count($goods)!=0){ ?>
					<!-- 搜索结构不为空时显示 -->
					<div class="store4Con">
						<?php foreach($goods as $good){ ?>
						<div class="store4Part">
							<a href="./detail.php?id=<?php echo $good['id']; ?>">
								<?php echo $good['img']; ?>
								<h2><?php echo $good['name']; ?></h2>
								<span>¥&nbsp;<?php echo $good['minprice']; ?></span>
							</a>
						</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
					<?php }else{ ?>
					<!-- 搜索结果为空时显示 -->
					<div class="noresult">
						<img src="img/noresult.png" alt="">
						<p class="result">没有搜索到与 '<span><?php echo $key; ?></span>' 有关的结果</p>
						<p class="tip">请仔细检查所输入的字词是否正确无误。</p>
					</div>
					<?php } ?>
				</div>
				
				
			</div>
		</div>
		<!--store4 end-->
		

<?php include './layout/bottom.html'; ?>