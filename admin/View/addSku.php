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
	#goods_tab{
		width:100%;
		overflow: hidden;
	}
	#goods_tab span{
		display: block;width:120px;height:40px;line-height: 40px;background: #ccc;text-align: center;float:left;margin-right:20px;
		margin-top:10px;
		cursor:pointer;
	}
	.whites{
		color:#fff;
	}
	#img_box1 img{
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
      		<div class="title">SKU---&gt;添加商品SKU</div>
		      	<div id="edit_cnt">
			      <?php 
			      include('../Api/skuApi.php');
			      ?>
			      	<form action="../Api/skuApi.php?act=add" method="post">
				      	<div id="goods_base" style="clear:both" >		      
							<table width="470" border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td width="86" class="align_r">所属分类:</td>
							  <td  class="align_l">
							       <select name="cid" onchange="changeGood(this)">
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
							  <td width="86" class="align_r">所属商品:</td>
							  <td  class="align_l">
							       <select name="gid" id="selectGood" onchange="showOption(this)">
									<option value=0>----请选择商品----</option>
							  </select>
							  </td>
							</tr>
							<tr>
							  <td class="align_r" width="86">价格:</td>
							  <td class="align_l"><input type="text" name="price"  /></td>
							  </tr>
							  <tr>
							  <td class="align_r" width="86">库存:</td>
							  <td class="align_l"><input type="text" name="count"  /></td>
							  </tr>
								<tr>
								  <td class="align_r">图片:</td>
								  <td class="align_l">
								  	<input type="button" onClick="upImage1()" value="上传图片"> 
								  	<input type="text" id="srcTxt1" name="img" />
									<div id="img_box1">				
									</div>	
								  </td>
								</tr>
								
							</table>					
						</div>


						<input type="submit" id="btn" name="btn" class="btn" value="保存" />
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
<script type="text/plain" id="j_ueditorupload1" style="height:5px;display:none;" ></script> 
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
<script>
	function changeGood(e){
      var cid=$(e).val();
      $.get('../Api/goodApi.php?cid='+cid,function(data){
          var tab="<option value=0 >请选择</option>";
          for(var i in data){
            var row=data[i];
            tab+='<option value="'+row['id']+'">'+row['name']+'</option>';
          }
          $("#selectGood").html(tab);
          $(".newOption").remove();
      },'json')
      }

     function showOption(e){
     	var gid=$(e).val();
		$.get('../Api/goodApi.php?gid='+gid,function(data){
			if(data.option_name!=""){
				if(data.option_name=="颜色"){
					var tab='<tr class="newOption"><td class="align_r" width="86">'+data['option_name']+':</td><td class="align_l"><input placeholder="颜色名称" type="text" name="option_value"  /><input type="button" onClick="upImage2()" value="上传图片"><input placeholder="颜色图片" type="text" id="srcTxt2" name="color_img" /><div id="img_box2"></td></tr>';
				}else{
					var tab='<tr class="newOption"><td class="align_r" width="86">'+data['option_name']+':</td><td class="align_l"><input type="text" name="option_value"  /></td></tr>';
				}
				$(".newOption").remove();
				$("table").append(tab);
			}
		},'json')
     }
</script>
</body>
<script type="text/javascript">
	$(".lanmu").eq(4).addClass("lanmu_active");
  $("#cnt").fadeIn();
</script>
</html>
