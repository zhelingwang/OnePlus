<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一加后台-SKU</title>
<link href="./css/css.css" rel="stylesheet" type="text/css" />
<script  src="./js/jquery2.14.min.js"></script>
<script  src="./js/fun.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./ueditor/lang/zh-cn/zh-cn.js"></script>
<style>
table img{
  height: 100%;
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
	<!--link-->
  <div id="cnt"><!--cnt--->
  	<div class="menu" id="menu">
    <!----------------------->
    <div id="add_lanmu"><!----add_lanmu---->
      	<div class="title">SKU---&gt;管理商品SKU</div>
      	<?php 
      		include('../Api/skuApi.php');
      	?>
<form  method="post">
	<table width="470" border="0" cellspacing="0" cellpadding="0" id="edittable">
		<tr>
      <td >商品分类:</td>
      <td  colspan="4">
        <select name="cid" id="cid" onchange="changeGood(this)">
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
      <td  >商品:</td>
      <td  colspan="4">
        <select name="gid" id="gid" onchange="changeSku(this)">
          <option value=0 >请选择</option>
        </select>
      </td>
     </tr>
		 <tr>
      <td >选项:</td>
		  <td >价格:</td>
		  <td >库存:</td>
      <td >图片:</td>
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
  $(".lanmu").eq(4).addClass("lanmu_active");
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

      function changeGood(e){
      var cid=$(e).val();
      $.get('../Api/goodApi.php?cid='+cid,function(data){
          var tab="";
          for(var i in data){
            var row=data[i];
            tab+='<option class="newOption" option_name="'+row['option_name']+'" value="'+row['id']+'">'+row['name']+'</option>';
          }
          $(".newOption").remove();
          $("#gid").append(tab);
      },'json')
      }

      function changeSku(e){
      var gid=$(e).val();
      var option_name=$("#gid>option[value='"+gid+"']").attr("option_name");
      $.get('../Api/skuApi.php?gid='+gid,function(data){
        var tab="";
        for(var i in data){
          var row=data[i];
          var option="";
          if(option_name=="颜色"){
            var option_value=row['option_value']['img'];
          }else{
            var option_value=row['option_value'];
          }
          
          tab+="<tr class='newSku' sku_id="+row['id']+"><td>"+option_value+"</td><td>"+row['price']+"</td><td>"+row['count']+"</td><td>"+row['img']+"</td><td><a href='./upSku.php?id="+row['id']+"'>编辑</a><a href='javascript:;' onclick='deleteSku(this)'>删除</a>";
        }
        $(".newSku").remove();
        $("table").append(tab);
      },'json')
      }

      function deleteSku(e){
        var id=$(e).parent().parent().attr("sku_id");
        $.get('../Api/skuApi.php',{act:'delete',id:id},function(data){
          console.log(data);
          if(data==0){
            alert("删除失败");
          }
        })
        $(e).parent().parent().remove();
      }

      //页面刷新的时候
      $(document).ready(function(){ 

        var cid=$("#cid").val();
      $.get('../Api/goodApi.php?cid='+cid,function(data){
          var tab="";
          for(var i in data){
            var row=data[i];
            tab+='<option option_name="'+row['option_name']+'" value="'+row['id']+'">'+row['name']+'</option>';
          }
          $("#gid").append(tab);
      },'json')


        }) 
</script>
</html>
