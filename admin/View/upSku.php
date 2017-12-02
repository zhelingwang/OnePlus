<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-商品SKU</title>
<link href="./css/css.css" rel="stylesheet" type="text/css" />
<script  src="./js/jquery2.14.min.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./ueditor/lang/zh-cn/zh-cn.js"></script>
<style>	
	#skus_tab{
		width:100%;
		overflow: hidden;
	}
	#skus_tab span{
		display: block;width:120px;height:40px;line-height: 40px;background: #ccc;text-align: center;float:left;margin-right:20px;
		margin-top:10px;
		cursor:pointer;
	}
	.whites{
		color:#fff;
	}
	#img_box img{
		width:83px;
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
  	<div id="cnt">
  		<div class="menu" id="menu">
      		<div class="title">SKU---&gt;管理商品SKU---&gt;修改商品SKU</div>
		      	<div id="edit_cnt">
			      <?php 
			      include('../Api/skuApi.php');
			      ?>
			      	<form action="../Api/skuApi.php?act=update&id=<?php echo $sku['id'];?>" method="post">
				      	
				      	<div id="skus_base" style="clear:both" >		      
							<table width="470" border="0" cellspacing="0" cellpadding="0">
								<?php if($good['option_name']!=""){ ?>
								<tr>
								  <td class="align_r" width="86"><?php echo $good['option_name'];?>:</td>
								  <?php if($good['option_name']=="颜色"){
								  	echo "<td class='align_l'><input type='text' name='option_value'  value='".$sku['option_value']['name']."'/><input type='button' onClick='upImage2()' value='上传图片'><input placeholder='颜色图片' type='text' id='srcTxt2' name='color_img' value='".$sku['option_value']['img']."'/><div id='img_box2'></td>
								  </tr>";
								  }else{
								  	echo '<td class="align_l"><input type="text" name="option_value"  value="'.$sku['option_value'].'"/></td>
								  </tr>';
								  }
								  ?>
								  <?php } ?>
								<tr>
								  <td class="align_r" width="86">价格:</td>
								  <td class="align_l"><input type="text" name="price"  value="<?php echo $sku['price'];?>"/></td>
								  </tr>
								<tr>
								  <td class="align_r" width="86">库存:</td>
								  <td class="align_l"><input type="text" name="count" id="sku_name" value="<?php echo $sku['count'];?>"/></td>
								  </tr>
								<tr>
								  <td class="align_r">商品相册:</td>
								  <td class="align_l">
								  	<input type="button" onClick="upImage()" value="上传图片"> 
								  	<input type="text" id="srcTxt" name="img"  value="<?php
											if($sku['img']){
												echo htmlspecialchars($sku['img']);
											}
										?>	"   />
									<div id="img_box">
										<?php echo htmlspecialchars_decode($sku['img']);?>			
									</div>	
								  </td>
								</tr>
								<!-- <?php
									$tab="";
									foreach(unserialize($sku['option']) as $key=>$val){
										$tab.="<tr><td class='align_r' width='86'>{$key}:</td><td class='align_l'><input type='text' name='{$key}' id='sku_name' value='{$val}'/></td></tr>";
									}
									echo $tab;
								?> -->
							</table>					
						</div>


						<input type="submit" id="btn" name="btn" class="btn" value="更新商品" />
					</form>
		     	 </div>

      		</div>
  
  		</div>
  	</div>
</div>
  <?php
include('./footer.php');
?>
 
<div id="test"><img width="200px" id="src"/></div> 
<script type="text/plain" id="j_ueditorupload" style="height:5px;display:none;" ></script> 
<script type="text/plain" id="j_ueditorupload2" style="height:5px;display:none;" ></script> 
<script>
 //实例化编辑器  
       	var o_ueditorupload1 = UE.getEditor('j_ueditorupload1',  
      {  
        autoHeightEnabled:false  
      });  
      o_ueditorupload1.ready(function ()  
      {  
        o_ueditorupload1.hide();//隐藏编辑器  
        
        //监听图片上传  
        o_ueditorupload1.addListener('beforeInsertImage', function (t,arg)  
         {  
         	console.log(arg);
          	var pp = (arg[0].src);  
          	var img='<img  src="'+pp+'"/>';
       	//$("#src").attr("src",pp);  
          	var old=$("#srcTxt1").val();
          	$("#srcTxt1").val(old+img);
          	//$("#srcTxt").val(old+img);         		
          	$("#img_box1").append(img);
        });  
         });


      //弹出图片上传的对话框  
      function upImage1() { 
        	var myImage1 = o_ueditorupload1.getDialog("insertimage");  
        	myImage1.open();  
      }  
</script>
<script>
 //实例化编辑器  


      var o_ueditorupload2 = UE.getEditor('j_ueditorupload2',  
      {  
        autoHeightEnabled:false  
      });  
      o_ueditorupload2.ready(function ()  
      {  
        o_ueditorupload2.hide();//隐藏编辑器  
        
        //监听图片上传  
        o_ueditorupload2.addListener('beforeInsertImage', function (t,arg)  
         {  
         	console.log(arg);
          	var pp = (arg[0].src);  
          	var img='<img  src="'+pp+'"/>';
       	//$("#src").attr("src",pp);  
          	var old=$("#srcTxt2").val();
          	$("#srcTxt2").val(old+img);
          	//$("#srcTxt").val(old+img);         		
          	$("#img_box2").append(img);
        });  
         });


      //弹出图片上传的对话框  
      function upImage2() {
        	var myImage2 = o_ueditorupload2.getDialog("insertimage");  
        	myImage2.open();  
      }  
</script>
</body>
<script type="text/javascript">
	$(".lanmu").eq(4).addClass("lanmu_active");
  $("#cnt").fadeIn();
</script>
</html>
