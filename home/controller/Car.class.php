<?php
include_once("../model/Db.class.php");
class Car{
	protected $db;
	protected $tab;
	public function __construct(){
		$this->db=new Db();
		$this->tab="car";
	}

	public function addSkuToCart($skuid){
		if(!isset($_SESSION)){
			session_start();
		}
		if(!isset($_SESSION['userId'])){
			return -1;
		}
		$userid=$_SESSION['userId'];
		$sql="select * from {$this->tab} where user_id='$userid' and sku_id='$skuid' ";
		$already=$this->db->selectRow($sql);
		if(count($already)==0){
			$count=1;
			$sql="insert into {$this->tab} (user_id,sku_id,count) values('$userid','$skuid','$count')";
		}else{
			$count=$already['count']+1;
			$sql="update {$this->tab} set count='$count' where sku_id = '$skuid' ";
		}
		$result=$this->db->otherData($sql);
		if($result>0){
			return 1;
		}else{
			return 0;
		}
	}

	public function getSkusInCar($userid){
		$sql="select sku.*,good.name as good_name,good.option_name,car.count as car_count from sku , good ,  car where sku.id=car.sku_id and car.user_id='$userid' and sku.gid=good.id ";
		$skus=$this->db->selectRows($sql);
		return $skus;
	}

	public function deleteSkuInCar($skuid){
		if(!isset($_SESSION)){
			session_start();
		}
		$userid=$_SESSION['userId'];
		$sql="delete from {$this->tab} where user_id='$userid' and sku_id = '$skuid'  ";
		if($this->db->otherData($sql)>0){
			return 1;
		}else{
			return 0;
		}
	}

	public function updateCount($count,$skuid){
		if(!isset($_SESSION)){
			session_start();
		}
		$userid=$_SESSION['userId'];
		$sql="update {$this->tab} set count = '$count' where user_id = '$userid' and sku_id = '$skuid' ";
		$this->db->otherData($sql);
	}

	public function clear($userid){
		$sql="delete from {$this->tab} where user_id = '$userid' ";
		if($this->db->otherData($sql)>0){
			return 1;
		}else{
			return 0;
		}
	}

	public function checkEmpty(){
		if(!isset($_SESSION)){
			session_start();
		}
		$userid=$_SESSION['userId'];
		$sql="select * from {$this->tab} where user_id = '$userid'";
		$result=$this->db->selectRows($sql);
		if(count($result)>0){
			return 1;
		}else{
			return 0;
		}
	}
}