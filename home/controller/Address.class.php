<?php
include_once("../model/Db.class.php");
class Address{
	protected $db;
	protected $tab;
	public function __construct(){
		$this->db=new Db();
		$this->tab="address";
	}

	public function getAddressByUid($userid){
		$sql="select * from {$this->tab} where user_id = '{$userid}'";
		return $this->db->selectRows($sql);
	}
	
	public function saveAddress($userid,$name,$phone,$addr){
		if($name==""){
			return "请输入收货人姓名";
		}
		if($phone==""){
			return "请输入收货人手机";
		}
		if($addr==""){
			return "请输入收货人地址";
		}
		$sql="insert into {$this->tab}(user_id,name,phone,addr) values('$userid','$name','$phone','$addr')";
		$result=$this->db->otherData($sql);
		if($result>0){
			return 1;
		}else{
			return 0;
		}
	}

	public function setDefault($userid,$addrid){
		$this->db->otherData("update {$this->tab} set is_default = '0' where user_id='$userid' ");
		$result=$this->db->otherData("update {$this->tab} set is_default = '1' where user_id='$userid' and id = '$addrid' ");
		if($result>0){
			return 1;
		}else{
			return 0;
		}
	}

	public function deleteAddress($addrid){
		$this->db->otherData("delete from {$this->tab} where id = '$addrid' ");
	}

	public function updateAddress($addrid,$userid,$name,$phone,$addr){
		$sql="update {$this->tab} set name='$name',phone='$phone',addr='$addr' where user_id='$userid' and id = '$addrid' ";
		$result=$this->db->otherData($sql);
		if($result>=0){
			return 1;
		}else{
			return 0;
		}
	}
}