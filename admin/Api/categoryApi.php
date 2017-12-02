<?php
header("content-type:text/html;charset=utf-8;");
require('../Model/Db.class.php');
require('../Controller/Category.class.php');
require('../Common/function.php');
$db=new Db();
$c=new Category($db,'category',3);
if(isset($_GET['act'])){//编辑删除操作
	if($_GET['act']=='update'){
		$result=$c->updateCategoryById();
		if(is_string($result)){
			echo "<script> alert('{$result}'); window.history.go(-1); </script>";
		}else{
			echo "<script> window.location.href='../View/editCategory.php'; </script>";
		}
	}
}else if(isset($_GET['id'])){//进入编辑页面
	$row=$c->oneCategory();
}
else{//进入分类管理页面或分类添加页面
	$c->init();
	$rows=$c->getCntByPage();
	$links=$c->makeTxtLinks();
}