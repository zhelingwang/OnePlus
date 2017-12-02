<?php
include_once("../model/Db.class.php");
class Good{
	protected $db;
	protected $tab;
	public function __construct(){
		$this->db=new Db();
		$this->tab="good";
	}

	public function getGoodsByCid($cid){
		$sql="select * from {$this->tab} where cid = $cid";
		$goods=$this->db->selectRows($sql);
		return $goods;
	}

	public function oneGood($id){
		$sql="select * from {$this->tab} where id={$id}";
		return $this->db->selectRow($sql);
	}

	public function searchGoodByKey($key){
		$sql="select * from {$this->tab} where name like '%{$key}%' ";
		return $this->db->selectRows($sql);
	}
}