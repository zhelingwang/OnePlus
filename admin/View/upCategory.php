<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-商品分类</title>
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
      	<div class="title">商品分类---&gt;管理商品分类---&gt;编辑商品分类</div>
      	<?php 
      		include('../Api/categoryApi.php');
      	?>
<form action="../Api/categoryApi.php?act=update" method="post">
	<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
	<input type="hidden" name="old_img" value="<?php echo $row['banner_img']; ?>">
	<table width="470" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td class="align_r">分类名称:</td>
		  <td class="align_l"><input type="text" name="name" id="categoryName" value="<?php echo $row['name']; ?>" /></td>
		</tr>
		<tr>
		  <td class="align_r">&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td class="align_r">分类图片:</td>
		  <td class="align_l"><img style="width: 50%;" src="<?php echo $row['banner_img'] ?>"></td>
		</tr>
		<tr>
		  <td class="align_r">&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td class="align_r">修改图片</td>
		  <td class="align_l">
			  	<input type="button" onClick="upImage()" value="上传图片"> 
			  	<input type="text" id="srcTxt" name="banner_img" />
				<div id="img_box">				
				</div>
			</td>
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
	$(".lanmu").eq(1).addClass("lanmu_active");
  $("#cnt").fadeIn();
</script>
<script type="text/plain" id="j_ueditorupload" style="height:5px;display:none;" ></script> 
<script>
 //实例化编辑器  
      var o_ueditorupload = UE.getEditor('j_ueditorupload',  
      {  
        autoHeightEnabled:false  
      });  
      o_ueditorupload.ready(function ()  
      {  
        o_ueditorupload.hide();//隐藏编辑器  
        
        //监听图片上传  
        o_ueditorupload.addListener('beforeInsertImage', function (t,arg)  
         {  
          	var pp = (arg[0].src);  
          	var img='<img src="'+pp+'"/>';
       	//$("#src").attr("src",pp);  
          	var old=$("#srcTxt").val();
          	$("#srcTxt").val(old+pp);      		
          	$("#img_box").append(img);
        });  
         });           
      //弹出图片上传的对话框  
      function upImage() {  
        	var myImage = o_ueditorupload.getDialog("insertimage");  
        	myImage.open();  
      }  
</script>
</html>
