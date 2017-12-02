<?php
header("content-type:text/html;charset=utf-8;");
require('../Model/Db.class.php');
require('../Controller/Sku.class.php');
require('../Controller/Good.class.php');
require('../Controller/Category.class.php');
require('../Common/function.php');
$db=new Db();
$s=new Sku($db,'sku',3);
$g=new Good($db,'good');
$c=new Category($db,'category');
if(isset($_GET['act'])){//编辑删除操作
	if($_GET['act']=='add'){
		$result=$s->addSku();
		if(is_string($result)){
			echo '<script> alert("'.$result.'"); window.history.back(-1); </script>';
		}else{
			echo "<script> window.location.href='../View/addSku.php'; </script>";
		}
	}
	if($_GET['act']=='update'){
		$result=$s->updateSkuById();
		if(is_string($result)){
			echo '<script> alert("'.$result.'"); window.history.back(-1); </script>';
		}else{
			echo "<script> window.location.href='../View/editSku.php'; </script>";
		}
	}
	if($_GET['act']=='delete'){
		$result=$s->deleteSkuById();
		echo $result;
	}
}else if(isset($_GET['gid'])){//编辑页
	$rows=$s->getSkuByGid();
	$good=$g->oneGood($_GET['gid']);
	if($good['option_name']=="颜色"){
		foreach ($rows as &$row) {
			$row['option_value']=unserialize($row['option_value']);
		}
	}
	echo json_encode($rows);
}else if(isset($_GET['id'])){//进入编辑页面
	$sku=$s->oneSku();
	$good=$g->oneGood($sku['gid']);
	if($good['option_name']=="颜色"){
		$sku['option_value']=unserialize($sku['option_value']);
	}
}
else{//进入sku管理页面或添加页面
	$s->init();
	$rows=$s->getCntByPage();
	$links=$s->makeTxtLinks();
	$categorys=$c->getAllCategory();
}