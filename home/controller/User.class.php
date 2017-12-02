<?php
include("../model/Db.class.php");
class User{
	protected $db;
	protected $tab;
	public function __construct(){
		$this->db=new Db();
		$this->tab="user";
	}

	public function checkRegInfo($param){
		if(strlen($param['username'])==0){
			return "请输入用户名";
		}
		if(strlen($param['password'])==0){
			return "请输入密码";
		}
		if(strlen($param['password_again'])==0){
			return "请再次输入密码";
		}
		if($param['slidercode']!=1){
			return "滑块验证失败";
		}
		if(count($this->db->selectRows("select * from {$this->tab} where username='".$param['username']."'"))>0){
			return "该用户已存在";
		}
		if($param['password']!=$param['password_again']){
			return "两次输入密码不一致";
		}
		return true;
	}
	public function checkLoginInfo($param){
		if(strlen($param['username'])==0){
			return "请输入用户名";
		}
		if(strlen($param['password'])==0){
			return "请输入密码";
		}
		if($param['slidercode']!=1){
			return "滑块验证失败";
		}
		if(count($this->db->selectRows("select * from {$this->tab} where username='".$param['username']."'"))==0){
			return "该用户不存在";
		}
		if(count($this->db->selectRows("select * from {$this->tab} where username='".$param['username']."' and password='".$param['password']."'"))==0){
			return "用户名或密码错误";
		}
		return true;
	}
	public function register($param){
		$sql="insert into {$this->tab}(username,password) values('".$param['username']."','".$param['password']."')";
		$result=$this->db->otherData($sql);
		if($result>0){
			return true;
		}else{
			return false;
		}
	}
	public function login($param){
		$user=$this->db->selectRow("select * from {$this->tab} where username='".$param['username']."'");
		$_SESSION['userName']=$user['username'];
		$_SESSION['userId']=$user['id'];
		return true;
	}
	public function logout(){
		session_start();
		if(isset($_SESSION['userName'])){
			unset($_SESSION['userName']);
			unset($_SESSION['userId']);
			return true;
		}else{
			return false;
		}
	}
}