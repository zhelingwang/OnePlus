<?php
header("content-type:text/html;charset=utf-8;");
require('../Model/Db.class.php');
require('../Controller/Parameter.class.php');
require('../Controller/Category.class.php');
require('../Common/function.php');
$db=new Db();
$p=new Parameter($db,'parameter',3);
$c=new Category($db,'category');
if(isset($_GET['act'])){//编辑删除操作
	if($_GET['act']=='add'){
		$result=$p->addParameter();
		if(is_string($result)){
			echo "<script> alert('{$result}'); window.history.go(-1); </script>";
		}else{
			echo "<script> window.location.href='../View/addParameter.php'; </script>";
		}
	}
	if($_GET['act']=='update'){
		$result=$p->updateParameterById();
		if(is_string($result)){
			echo "<script> alert('{$result}'); window.history.go(-1); </script>";
		}else{
			echo "<script> window.location.href='../View/editParameter.php'; </script>";
		}
	}
	if($_GET['act']=='delete'){
		$result=$p->deleteParameterById();
		if(is_string($result)){
			echo "<script> alert('{$result}'); window.history.go(-1); </script>";
		}else{
			echo "<script> window.location.href='../View/editParameter.php'; </script>";
		}
	}
}else if(isset($_GET['id'])){//进入编辑页面
	$row=$p->oneParameter();
}else if(isset($_GET['cid'])){//根据cid获取所有参数
	$res=$p->getPrototypeByCid();
	echo json_encode($res);
}
else{//进入参数管理页面或参数添加页面

	$p->init();
	$rows=$p->getCntByPage();
	$links=$p->makeTxtLinks();
	$categorys=$c->getAllCategory();
}