<?php
include_once("../model/Db.class.php");
class Category{
	protected $db;
	protected $tab;
	public function __construct(){
		$this->db=new Db();
		$this->tab="category";
	}

	public function getCategoryById($id){
		$sql="select * from {$this->tab} where id = $id";
		return $this->db->selectRow($sql);
	}

	public function getCategoryByGid($gid){
		$sql="select * from {$this->tab} where gid = $gid";
		return $this->db->selectRows($sql);
	}
}