
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-订单</title>
<link href="./css/css.css" rel="stylesheet" type="text/css" />
<script  src="./js/jquery2.14.min.js"></script>
<script type="text/javascript" src="./js/company.js"></script>
<style type="text/css">
	td>img{
		height: 100%;
	}
</style>
</head>

<body>
  <?php
include('./head.php');
?>
<div id="list">
  <?php
include('./link.php');
?>
<!--link-->
  <div id="cnt"><!--cnt--->
  	<div class="menu" id="menu">
    <!----------------------->
    <div id="updata_lanmu"><!--管理栏目-->
      	<div class="title">销售订单---&gt;管理订单---&gt;订单明细</div>
      	<?php
      		include("../Api/orderApi.php");
        ?>
	<table width="803" border="0" cellspacing="0" cellpadding="0">
		
		<tr>
		  <td>名称</td>
		  <td>图片</td>
		  <td>价格</td>
		  <td>数量</td>
		</tr>
 		<?php  foreach($rows as $row){ ?>
		<tr>
		  <td><?php echo $row['name']; ?></td>
		  <td><?php echo $row['img']; ?></td>
		  <td><?php echo $row['price']; ?></td>
		  <td><?php echo $row['count']; ?></td>
		</tr>
		<?php } ?>

	</table>

      </div><!---updatalanmu---->
    <!--------------------------------->  
  	</div>
  	<!--menu-->
  
  </div><!---cnt---->
</div><!--list-->
  <?php
include('./footer.php');
?>
</body>
<script type="text/javascript">
	$(".lanmu").eq(5).addClass("lanmu_active");
  $("#cnt").fadeIn();
</script>
</html>
