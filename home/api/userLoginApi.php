<?php
include("../controller/User.class.php");
session_start();
$user=new User();
$param=[
	'username'=>$_POST["username"],
	'password'=>$_POST["password"],
	'slidercode'=>$_POST["slidercode"]
];
$result=$user->checkLoginInfo($param);
if(is_string($result)){
	echo json_encode(array('msg'=>$result,'redirect'=>''));
}else{
	if($user->login($param)){
		echo json_encode(array('msg'=>'登录成功!','redirect'=>'../view/store.php'));
	}else{
		echo json_encode(array('msg'=>'登录失败!','redirect'=>''));
	}
}
?>