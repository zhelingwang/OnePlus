<?php
include("../controller/User.class.php");
session_start();
$user=new User();
$param=[
	'username'=>$_POST["username"],
	'password'=>$_POST["password"],
	'password_again'=>$_POST["password_again"],
	'slidercode'=>$_POST["slidercode"]
];
$result=$user->checkRegInfo($param);
if(is_string($result)){
	echo json_encode(array('msg'=>$result,'redirect'=>''));
}
else{
	if($user->register($param)){
		echo json_encode(array('msg'=>'注册成功!','redirect'=>'../view/login.php'));
	}else{
		echo json_encode(array('msg'=>'注册失败!','redirect'=>''));
	}
}
?>