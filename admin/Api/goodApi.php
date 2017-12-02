<?php
header("content-type:text/html;charset=utf-8;");
require('../Model/Db.class.php');
require('../Controller/Good.class.php');
require('../Controller/Category.class.php');
require('../Common/function.php');
$db=new Db();
$g=new Good($db,'good',5);
$c=new Category($db,'category');
if(isset($_GET['act'])){//编辑删除操作
	if($_GET['act']=='add'){
		$result=$g->addGood();
		if(is_string($result)){
			echo '<script> alert("'.$result.'"); window.history.go(-1); </script>';
		}else{
			echo "<script> window.location.href='../View/addGoods.php'; </script>";
		}
	}
	if($_GET['act']=='delete'){
		$result=$g->deleteGoodById();
		if(is_string($result)){
			echo "<script> alert('{$result}'); window.history.go(-1); </script>";
		}else{
			echo "<script> window.location.href='../View/editGoods.php'; </script>";
		}
	}
	if($_GET['act']=='update'){
		$result=$g->updateGoodById();
		if(is_string($result)){
			echo "<script> alert('{$result}'); window.history.go(-1); </script>";
		}else{
			echo "<script> window.location.href='../View/editGoods.php'; </script>";
		}
	}
}else if(isset($_GET['id'])){//进入编辑页面
	$good=$g->oneGood($_GET['id']);
	$good['parameter']=unserialize($good['parameter']);
	$categorys=$c->getAllCategory();
}else if(isset($_GET['gid'])){//ajax根据id取得good
	$good=$g->oneGood($_GET['gid']);
	echo json_encode($good);
}else if(isset($_GET['cid'])){//根据cid获取商品
	$res=$g->getGoodByCid();
	echo json_encode($res);
}
else{//商品管理页面或添加页面
	$g->init();
	$rows=$g->getCntByPage();
	$links=$g->makeTxtLinks();
	$categorys=$c->getAllCategory();
}