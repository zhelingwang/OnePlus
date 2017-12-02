<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-商品参数</title>
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
      	<div class="title">参数---&gt;管理商品参数</div>
      	<?php 
      		include('../Api/parameterApi.php');
      	?>
<form action="../Api/parameterApi.php?act=update" method="post">
	<table width="470" border="0" cellspacing="0" cellpadding="0" id="edittable">
		<tr>
		  <td  >商品分类:</td>
		  <td  colspan="3">
			  <select name="cid" id="cid">
			  	<option value=0 selected='selected'>请选择</option>
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
		  <td >参数名称:</td>
		  <td >操作:</td>
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
  $(".lanmu").eq(2).addClass("lanmu_active");
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
          	var img='<img width="100px" src="'+pp+'"/>';
       	//$("#src").attr("src",pp);  
          	var old=$("#srcTxt").val();
          	alert(pp)
          	$("#srcTxt").val(old+img);      		
          	$("#img_box").append(img);
        });  
         });           
      //弹出图片上传的对话框  
      function upImage() {  
        	var myImage = o_ueditorupload.getDialog("insertimage");  
        	myImage.open();  
      }

      $("#cid").change(function(){
      	var cid=$(this).val();
    		$.get("../api/parameterApi.php?cid="+cid,function(data){
    			var content="";
    			for(var i=0;i<data.length;i++){
    				content=content+"<tr class='newparameter'>";
    				if(data[i]['type']==1){
    					var type="手工输入";
    				}else{
    					var type="选择";
    				}
    				content=content+"<td >"+data[i]['name']+"</td><td><a href='../view/upParameter.php?id="+data[i]['id']+"'>编辑</a><a href='../api/parameterApi.php?act=delete&id="+data[i]['id']+"'>删除</a></td>";
    				content=content+"</tr>";
    			}
          $(".newparameter").remove();
    		$("#edittable").append(content);
  		},'json');
      })

      //页面刷新的时候
      $(document).ready(function(){ 
        var cid=$("#cid").val();
        $.get("../api/parameterApi.php?cid="+cid,function(data){
          var content="";
          for(var i=0;i<data.length;i++){
            content=content+"<tr class='newparameter'>";
            if(data[i]['type']==1){
              var type="手工输入";
            }else{
              var type="选择";
            }
            content=content+"<td >"+data[i]['name']+"</td><td><a href='../view/upParameter.php?id="+data[i]['id']+"'>编辑</a><a href='../api/parameterApi.php?act=delete&id="+data[i]['id']+"'>删除</a></td>";
            content=content+"</tr>";
          }
          $(".newparameter").remove();
        $("#edittable").append(content);
      },'json');
        }) 

</script>
</html>
