<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-管理员</title>
<link href="./css/css.css" rel="stylesheet" type="text/css" />
<script  src="./js/jquery2.14.min.js"></script>
<script  src="./js/fun.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
	// $(function(){

	// 	alert('aa');
	// })
</script>
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
    <div id="add_lanmu"><!----add_lanmu---->
      	<div class="title">管理员---&gt;管理管理员---&gt;编辑管理员</div>
      	<?php 
      		include('../Api/adminApi.php');
      	?>
<form action="../Api/adminApi.php?act=update" method="post">
	<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
	<table width="470" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td class="align_r">管理员名称:</td>
		  <td class="align_l"><input type="text" name="name"  value="<?php echo $admin['name'];?>" /></td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
    <tr>
      <td class="align_r">管理员密码:</td>
      <td class="align_l"><input type="text" name="password"  value="<?php echo $admin['password'];?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
		<tr>
		  <td class="align_r"><input type="submit" name="btn" id="btn" class="btn" value="保存信息" /></td>
		  <td>&nbsp;</td>
		  </tr>
	</table>
</form>
      </div><!---addlanmu---->


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
  $(".lanmu").eq(0).addClass("lanmu_active");
  $("#cnt").fadeIn();
</script>
</html>
