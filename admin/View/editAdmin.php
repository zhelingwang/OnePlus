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
      	<div class="title">管理员---&gt;管理员管理</div>
      	<?php 
      		include('../Api/adminApi.php');
      	?>
<form action="../Api/parameterApi.php?act=update" method="post">
	<table width="470" border="0" cellspacing="0" cellpadding="0" id="edittable">
		<tr>
		  <td >管理员编号:</td>
		  <td >管理员名称:</td>
      <td >管理员密码:</td>
		  <td >操作:</td>
		 </tr>
     <?php
      if(!$admins){exit;}
      $tab='';
      foreach($admins as $admin){
        $tab.='<tr>
          <td>'.$admin['id'].'</td>
          <td>'.$admin['name'].'</td>
          <td>'.$admin['password'].'</td>
          <td><a href="../View/upAdmin.php?id='.$admin['id'].' ">编辑</a><a href="../Api/adminApi.php?act=delete&id='.$admin['id'].'">删除</a></td>
         </tr>';
       }
       echo $tab;
    ?>
	</table>
  <div id="fpage"><?php  echo $links; ?></div>
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
