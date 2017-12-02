<?php
include_once("../model/Db.class.php");
class Order{
	protected $db;
	protected $tab;
	public function __construct(){
		$this->db=new Db();
		$this->tab="order";
	}
	public function submitOrder($userid,$skus,$client_name,$client_phone,$client_addr){
		$order_number=uniqid().rand(1000,99999);
		$skuInfo=array();
		$totalprice=0;
		foreach ($skus as $sku) {
			$s=array();
			$s['skuid']=$sku['id'];
			$s['count']=$sku['car_count'];
			array_push($skuInfo,$s);
			$totalprice+=$sku['price']*$sku['car_count'];
		}
		$skuInfo=serialize($skuInfo);
		$time=time();
		$sql="insert into `{$this->tab}` (user_id,order_number,skuInfo,client_name,client_phone,client_addr,total_price,submit_time) value('$userid','$order_number', '$skuInfo' , '$client_name' ,  '$client_phone' , '$client_addr' ,'$totalprice','$time'  ) ";
		$result=$this->db->otherData($sql);
		if($result>0){
			return 1;
		}else{
			return 0;
		}
	}

	public function getOrdersByUserId($userid){
		$sql="select * from `{$this->tab}`   where user_id = '$userid' order by submit_time desc";
		return $this->db->selectRows($sql);
	}

	public function getSkusInOrder($id){
		$order=$this->db->selectRow("select * from `{$this->tab}` where id=$id ");
		$skuinfo=unserialize($order['skuInfo']);
		foreach ($skuinfo as &$info) {
			$skuid=$info['skuid'];
			$sku=$this->db->selectRow("select good.name as good_name ,good.option_name, sku.* from good , sku where sku.id='$skuid' and sku.gid=good.id ");
			if($sku['option_name']=="颜色"){
				$sku['option_value']=unserialize($sku['option_value'])['name'];
			}
			$info['name']=$sku['good_name']." ".$sku['option_value'];
			$info['price']=$sku['price'];
			$info['img']=$sku['img'];
		}
		return $skuinfo;
	}
}