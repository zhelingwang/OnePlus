<?php
header("content-type:text/html;charset=utf-8;");
include_once(dirname(__DIR__).'/Common/Fpage.class.php');
class Admin extends Fpage{
	protected $db;
	protected $tab;
	public function __construct($db,$tab='admin',$size=1,$nums=5){
		$this->db=$db;
		$this->tab=$tab;
		 parent::__construct($db,$tab,$size,$nums);		
	}
	public function addAdmin(){
		$name=$_POST['name'];
		if($name==""){
			return "管理员名称不能为空";
		}
		$password=$_POST['password'];
		if($password==""){
			return "密码不能为空";
		}
		$sql="insert into {$this->tab} (name,password) values('$name','$password')";
		if($this->db->otherData($sql)>0){
			return true;
		}else{
			return "添加管理员失败";
		};
	}
	public function getAllAdmin(){
		$sql="select * from {$this->tab}";
		return $this->db->selectRows($sql);
	}
	public function oneAdmin($id){
		$sql="select * from {$this->tab} where id = '$id' ";
		return $this->db->selectRow($sql);
	}
	public function updateAdminById(){
		$id=$_POST['id'];
		$name=$_POST['name'];
		if($name==""){
			return "管理员名称不能为空";
		}
		$password=$_POST['password'];
		if($password==""){
			return "密码不能为空";
		}
		$sql="update {$this->tab} set name='$name',password='$password' where id ='$id' ";
		if($this->db->otherData($sql)>=0){
			return true;
		}else{
			return "修改管理员失败";
		};
	}

	public function deleteAdminById(){
		$id=$_GET['id'];
		$sql="delete from {$this->tab} where id=$id  ";
		$res=$this->db->otherData($sql);
		if($res>0){
			return true;
		}else{
			return "管理员删除失败";
		}
	}

	public function adminLogin(){
		$name=$_POST['name'];
		$password=$_POST['password'];

		if(count($this->db->selectRows("select * from {$this->tab} where name='".$name."'"))==0){
			return "该管理员不存在";
		}

		if(count($this->db->selectRows("select * from {$this->tab} where name='".$name."' and password='".$password."'"))==0){
			return "管理员名称或密码错误";
		}
		$admin=$this->db->selectRow("select * from {$this->tab} where name='".$name."'");
		session_start();
		$_SESSION['adminName']=$name;
		$_SESSION['adminId']=$password;
		return true;
	}
	public function logout(){
		session_start();
		if(isset($_SESSION['adminName'])){
			unset($_SESSION['adminName']);
			unset($_SESSION['adminId']);
			return true;
		}else{
			return false;
		}
	}
}//类结束
