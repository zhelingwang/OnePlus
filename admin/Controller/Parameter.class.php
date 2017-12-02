<?php
header("content-type:text/html;charset=utf-8;");
include(dirname(__DIR__).'/Common/Fpage.class.php');
class Parameter extends Fpage{
	protected $db;
	protected $tab;
	public function __construct($db,$tab='parameter',$size=1,$nums=5){
		$this->db=$db;
		$this->tab=$tab;
		 parent::__construct($db,$tab,$size,$nums);		
	}
	public function addParameter(){
		$cid=$_POST['cid'];
		if($cid==0) return "请选择分类";
		$name=$_POST['name'];
		if($name=="") return "参数名不能为空";
		$sql="insert into {$this->tab}(cid,name) values('{$cid}','{$name}')";
		if($this->db->otherData($sql)>0){
			return true;
		}else{
			return "添加参数失败";
		};
	}

	public function oneParameter(){
		$id=$_GET['id'];
		$sql="select * from {$this->tab} where id={$id}";
		return $this->db->selectRow($sql);
	}

	public function updateParameterById(){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$sql="update {$this->tab} set name='{$name}' where id={$id}";
		if($this->db->otherData($sql)<0){
			return "参数更新失败";
		}else{
			return true;
		}
	}

	public function deleteParameterById(){
		$id=$_GET['id'];
		$sql="delete from {$this->tab} where id=$id  ";
		$res=$this->db->otherData($sql);
		if($res>0){
			return true;
		}else{
			return "参数删除失败";
		}
	}

	public function getPrototypeByCid(){
		$cid=$_GET['cid'];
		$sql="select * from {$this->tab} where cid={$cid}";
		return $this->db->selectRows($sql);
	}

}
