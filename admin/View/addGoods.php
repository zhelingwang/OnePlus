<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-商品</title>
<link href="./css/css.css" rel="stylesheet" type="text/css" />
<script  src="./js/jquery2.14.min.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./ueditor/lang/zh-cn/zh-cn.js"></script>

<style>	
	#goods_tab{
		width:100%;
		overflow: hidden;
	}
	#goods_tab span{
		display: block;width:120px;height:40px;line-height: 40px;background: #ccc;text-align: center;float:left;margin-right:20px;
		margin-top:5px;
		cursor:pointer;
	}
	.whites{
		color:#eb0028;
	}
	#img_box img{
		width: 100px;
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
      		<div class="title">商品---&gt;添加商品</div>
		      	<div id="edit_cnt">
			      <?php 
			      include('../Api/goodApi.php');
			      ?>
			      	<div id="goods_tab">
						<span id="gt_base" class="whites">基本设置</span><span id="gt_other">商品参数</span>
			      	</div>
			      	<form action="../Api/goodApi.php?act=add" method="post">
				      	<div id="goods_base" style="clear:both" >		      
							<table width="470" border="0" cellspacing="0" cellpadding="0">
								<tr>
							  <td width="86" class="align_r">所属分类:</td>
							  <td  class="align_l">
							       <select name="cid" onchange="changePro(this)">
									<option value=0>----请选择分类----</option>
									<?php
										$tab="";
										foreach($categorys as $category){
											$tab.="<option value={$category['id']}>{$category['name']}</option>";
										}
										echo $tab;
									?>
							  </select>
							  </td>
							</tr>
								<tr>
								  <td class="align_r" width="86">商品名称:</td>
								  <td class="align_l"><input type="text" name="name" id="name" /></td>
								  </tr>
								  <tr>
								  <td class="align_r" width="86">商品选项:</td>
								  <td class="align_l"><input type="text" name="option_name" id="option_name" /></td>
								  </tr>
								<tr>
								  <td class="align_r">商品图片:</td>
								  <td class="align_l">
								  	<input type="button" onClick="upImage()" value="上传图片"> 
								  	<input type="text" id="srcTxt" name="img" />
									<div id="img_box">				
									</div>	
								  </td>
								</tr>
								<tr>
								  <td class="align_r">商品详情:</td>
								  <td class="align_l">
								  <textarea id="editor" name="detail_img" style="width:700px;height:400px;"></textarea>
								  
								  </td>
								</tr>
								<tr>
								  <td class="align_r"></td>
								  <td>&nbsp;</td>
								  </tr>
							</table>					
						</div>
						<div id="goods_other" style="clear:both;display: none;">
							<table id="goods_other_tab" width="470" border="0" cellspacing="0" cellpadding="0">
								<!-- <tr>
							  <td width="86" class="align_r">所属分类:</td>
							  <td  class="align_l">
							       <select name="cid" onchange="changePro(this)">
									<option value=0>----请选择分类----</option>
									<?php
										$tab="";
										foreach($rows as $row){
											$tab.="<option value={$row['id']}>{$row['html']}{$row['name']}</option>";
										}
										echo $tab;
									?>
									

							  </select>
							  </td>
							</tr> -->
							</table>
						</div>


						<input type="submit" id="btn" name="btn" class="btn" value="添加商品" />
					</form>
		     	 </div>

      		</div>
  
  		</div>
  	</div>
</div>
  <?php
include('./footer.php');
?>
<script>
 //实例化编辑器
 //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
 var ue = UE.getEditor('editor');

</script>
 
<div id="test"><img width="200px" id="src"/></div> 
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
          	var img='<img  src="'+pp+'"/>';
       	//$("#src").attr("src",pp);  
          	var old=$("#srcTxt").val();
          	$("#srcTxt").val(old+img);
          	//$("#srcTxt").val(old+img);         		
          	$("#img_box").append(img);
        });  
         });           
      //弹出图片上传的对话框  
      function upImage() {  
        	var myImage = o_ueditorupload.getDialog("insertimage");  
        	myImage.open();  
      }  
</script>
<script>
	//切换选项卡
	$(function(){
		$("#gt_base").click(function(){
			$(this).addClass('whites').siblings().removeClass('whites');
			$("#goods_base").css("display",'block');
			$("#goods_other").css("display",'none');
		})
		$("#gt_other").click(function(){
			$(this).addClass('whites').siblings().removeClass('whites');
			$("#goods_base").css("display",'none');
			$("#goods_other").css("display",'block');
		})
	})
	//所属分类下拉列表发生变化
	function changePro(e){
		//alert($(e).val());
		var id=$(e).val();//根据分类id，在goods_prototype表中取其全部属性
		$.get('../Api/parameterApi.php?cid='+id,function(data){
				var tab="";
				for(var i in data){
					var row=data[i];
					tab+='<tr><td width="86" class="align_r">'+row.name+':</td><td class="align_l"><input type="text" name="'+row.name+'"  /></td></tr>'
				}
				$("#goods_other_tab").html(tab);

		},'json')
	}

</script>
</body>
<script type="text/javascript">
	$(".lanmu").eq(3).addClass("lanmu_active");
  $("#cnt").fadeIn();
</script>
</html>
