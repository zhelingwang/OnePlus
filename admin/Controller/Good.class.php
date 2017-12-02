<?php
header("content-type:text/html;charset=utf-8;");
include_once(dirname(__DIR__).'/Common/Fpage.class.php');
class Good extends Fpage{
	protected $db;
	protected $tab;
	public function __construct($db,$tab='good',$size=1,$nums=5){
		$this->db=$db;
		$this->tab=$tab;
		 parent::__construct($db,$tab,$size,$nums);		
	}

	public function addGood(){
		$cid=$_POST['cid'];
		if($cid==0){
			return "请选择分类";
		}
		$name=$_POST['name'];
		if(empty($name)){
			return "请输入商品名";
		}
		$option_name=$_POST['option_name'];
		$img=$_POST['img'];
		$detail_img=$_POST['detail_img'];
		$pro=array();
		$keys=array_keys($_POST);
		$vals=array_values($_POST);
		for($i=5;$i<count($_POST)-1;$i++){
				$pro[$keys[$i]]=$vals[$i];
		}
		$parameter=serialize($pro);//序列化属性
		$sql="insert into {$this->tab} (cid,name,option_name,parameter,img,detail_img) values('{$cid}','{$name}','$option_name','{$parameter}','{$img}','{$detail_img}')";
		if($this->db->otherData($sql)>0){
			return true;
		}else{
			return "添加商品失败";
		}
	}

	public function deleteGoodById(){
		$id=$_GET['id'];
		$sql="delete from {$this->tab} where id=$id  ";
		$res=$this->db->otherData($sql);
		if($res>0){
			return true;
		}else{
			return "商品删除失败";
		}
	}

	public function oneGood($id){
		$sql="select * from {$this->tab} where id={$id}";
		return $this->db->selectRow($sql);
	}

	public function updateGoodById(){
		$id=$_GET['id'];
		$cid=$_POST['cid'];
		$name=$_POST['name'];
		$option_name=$_POST['option_name'];
		$img=$_POST['img'];
		$detail_img=htmlspecialchars($_POST['detail_img']);
		$param=array();
		$keys=array_keys($_POST);
		$vals=array_values($_POST);
		for($i=5;$i<count($_POST)-1;$i++){
				$param[$keys[$i]]=$vals[$i];
		}
		$parameter=serialize($param);//序列化属性
		$sql="update {$this->tab}  set cid='{$cid}',name='{$name}',option_name='{$option_name}',img='{$img}',detail_img='{$detail_img}',parameter='{$parameter}' where id='{$id}'";
		if($this->db->otherData($sql)>0){
			return true;
		}else{
			return "商品更新失败";
		}
	}

	public function getGoodByCid(){
		$cid=$_GET['cid'];
		$sql="select * from {$this->tab} where cid={$cid}";
		return $this->db->selectRows($sql);
	}
}
