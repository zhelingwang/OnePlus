
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-订单</title>
<link href="./css/css.css" rel="stylesheet" type="text/css" />
<script  src="./js/jquery2.14.min.js"></script>
<script type="text/javascript" src="./js/company.js"></script>
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
      	<div class="title">销售订单---&gt;管理订单</div>
      	<?php
      		include('../Api/orderApi.php');
      	 ?>
	<table width="803" border="0" cellspacing="0" cellpadding="0">
		
		<tr>
		  <td>订单id</td>
		  <td>订单编号</td>
		  <td>下单用户id</td>
		  <td>订单总金额</td>
		  <td>收件人姓名</td>
		  <td>收件人手机</td>
		  <td>收件人地址</td>
		  <td>订单状态</td>
		  <td>订单明细</td>
		</tr>

		<?php  foreach($rows as $row){ ?>
		<tr>
		  <td><?php echo $row['id']; ?></td>
		  <td><?php echo $row['order_number']; ?></td>
		  <td><?php echo $row['user_id']; ?></td>
		  <td><?php echo $row['total_price']; ?></td>
		  <td><?php echo $row['client_name']; ?></td>
		  <td><?php echo $row['client_phone']; ?></td>
		  <td><?php echo $row['client_addr']; ?></td>
		  <td>
		  	<select onchange="changeStatus(this)">
		  		<?php $status=array('下单成功','支付完成','商品出库','交易成功'); foreach($status as $key => $value){ ?>
		  		<option <?php if($row['status']==$key) echo 'selected = "selected"'; ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
		  		<?php } ?>
		  	</select>
		  </td>
		  <td><a href="./orderDetail.php?id=<?php echo $row['id']; ?>">明细</a></td>
		</tr>
		<?php } ?>
		<script type="text/javascript">
			function changeStatus(e){
				var orderid=$(e).parent().parent().find("td:first").text();
				var status=$(e).val();
				$.post("../Api/orderApi.php?act=changeStatus",{orderid:orderid,status:status},function(data){
					
				},'json')
			}
		</script>

	</table>

      </div><!---updatalanmu---->
	 <div id="fpage"><?php  echo $links; ?></div>
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
