<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-商品</title>
<link href="./css/css.css" rel="stylesheet" type="text/css" />
<script  src="./js/jquery2.14.min.js"></script>
<!-- <script  src="./js/fun.js"></script> -->
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./ueditor/lang/zh-cn/zh-cn.js"></script>
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
      	<div class="title">商品---&gt;管理商品</div>
      	<?php
      		include('../Api/goodApi.php');
      	 ?>
	<table width="803" border="0" cellspacing="0" cellpadding="0">
		
		<tr>
		  <td>操作</td>
		  <td>商品编号</td>
		  <td>商品类型 </td>
		  <td>商品名称</td>
		</tr>
		<?php
			//print_r($rows);
			if(!$rows){exit;}
			$tab='';
			foreach($rows as $row){
				$category_name="";
				foreach ($categorys as $category) {
					if($category['id']==$row['cid']){
						$category_name=$category['name'];
					}
				}
				$tab.='<tr>
					<td width="113"><a href="../View/upGoods.php?id='.$row['id'].'   ">编辑</a><a href="../Api/goodApi.php?act=delete&id='.$row['id'].'  ">删除</a></td>
					<td width="95">'.$row['id'].'</td>
					<td width="95">'.$category_name.'</td>
					<td width="330">'.$row['name'].'</td>
				 </tr>';
			 }
			 echo $tab;
		?>

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
	$(".lanmu").eq(3).addClass("lanmu_active");
  $("#cnt").fadeIn();
</script>
</html>
