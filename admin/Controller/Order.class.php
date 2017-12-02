<?php
header("content-type:text/html;charset=utf-8;");
include_once(dirname(__DIR__).'/Common/Fpage.class.php');
class Order extends Fpage{
	protected $db;
	protected $tab;
	public function __construct($db,$tab='order',$size=1,$nums=5){
		$this->db=$db;
		$this->tab=$tab;
		parent::__construct($db,$tab,$size,$nums);		
	}
	public function changeStatusById($orderid,$status){
		$time=time();
		switch ($status) {
			case 0:
				$sql="update `{$this->tab}` set status='$status',submit_time='$time',pay_time='',delivery_time='',finish_time='' where id = '$orderid' ";
				break;
			case 1:
				$sql="update `{$this->tab}` set status='$status',pay_time='$time',delivery_time='',finish_time='' where id = '$orderid' ";
				break;
			case 2:
				$sql="update `{$this->tab}` set status='$status',delivery_time='$time',finish_time='' where id = '$orderid' ";
				break;
			case 3:
				$sql="update `{$this->tab}` set status='$status',finish_time='$time' where id = '$orderid' ";
				break;
			default:
				break;
		}
		$this->db->otherData($sql);
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
