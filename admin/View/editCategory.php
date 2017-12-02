<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-商品分类</title>
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
      	<div class="title">商品分类---&gt;管理商品分类</div>
      	<?php
      		include('../Api/categoryApi.php');
      	 ?>
	<table width="803" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td>操作</td>
		  <td>分类编号</td>
		  <td>分类名称 </td>
		  <td>分类图片</td>
		</tr>
		<?php
			if(!$rows){exit;}
			$tab='';
			foreach($rows as $row){
				$tab.='<tr>
					<td width="113"><a href="../View/upCategory.php?id='.$row['id'].'   ">编辑</a></td>
					<td width="95">'.$row['id'].'</td>
					<td width="95">'.$row['name'].'</td>
					<td width="330"><img style="width:80%;" src="'.$row['banner_img'].'" >'.'</td>
				 </tr>';
			 }
			 echo $tab;
		?>

	</table>
	<div id="fpage"><?php  echo $links; ?></div>
      </div><!---updatalanmu---->
	 <!-- <div id="fpage"><?php  echo $link; ?></div> -->
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
	$(".lanmu").eq(1).addClass("lanmu_active");
  $("#cnt").fadeIn();
</script>
</html>
