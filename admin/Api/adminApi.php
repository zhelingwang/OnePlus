<?php
header("content-type:text/html;charset=utf-8;");
require('../Model/Db.class.php');
require('../Controller/Admin.class.php');
$db=new Db();
$a=new Admin($db,'admin',3);
if(isset($_GET['act'])){//编辑删除操作
	if($_GET['act']=='add'){
		$result=$a->addAdmin();
		if(is_string($result)){
			echo '<script> alert("'.$result.'"); window.history.go(-1); </script>';
		}else{
			echo "<script> window.location.href='../View/addAdmin.php'; </script>";
		}
	}
	if($_GET['act']=='delete'){
		$result=$a->deleteAdminById();
		if(is_string($result)){
			echo "<script> alert('{$result}'); window.history.go(-1); </script>";
		}else{
			echo "<script> window.location.href='../View/editAdmin.php'; </script>";
		}
	}
	if($_GET['act']=='update'){
		$result=$a->updateAdminById();
		if(is_string($result)){
			echo '<script> alert("'.$result.'"); window.history.go(-1); </script>';
		}else{
			echo "<script> window.location.href='../View/editAdmin.php'; </script>";
		}
	}
	if($_GET['act']=='login'){
		$result=$a->adminLogin();
		if(is_string($result)){
			echo '<script> alert("'.$result.'"); window.history.go(-1); </script>';
		}else{
			echo "<script> window.location.href='../View/index.php'; </script>";
		}
	}
	if($_GET['act']=='logout'){
		if($a->logout()){
			echo "<script> window.location.href='../View/login.php'; </script>";
		}else{
			echo '<script> alert("登出错误"); window.history.go(-1); </script>';
		}

	}
}else if(isset($_GET['id'])){//进入编辑页面
	$id=$_GET['id'];
	$admin=$a->oneAdmin($id);
}
else{//进入添加页面和管理页面
	$a->init();
	$admins=$a->getCntByPage();
	$links=$a->makeTxtLinks();
}