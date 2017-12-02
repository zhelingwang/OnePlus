<?php
include_once("../model/Db.class.php");
class Sku{
	protected $db;
	protected $tab;
	public function __construct(){
		$this->db=new Db();
		$this->tab="sku";
	}
	public function getSkuByGid($gid){
		$sql="select * from {$this->tab} where gid = {$gid}";
		return $this->db->selectRows($sql);
	}

	public function getMinPriceByGid($gid){
		$sql="select min(price) from {$this->tab} where gid = {$gid}";
		$minprice=$this->db->selectRow($sql);
		return $minprice['min(price)'];
	}

	public function getOneSkuByGid($gid){
		$sql="select * from {$this->tab} where gid = {$gid}";
		return $this->db->selectRow($sql);
	}
}