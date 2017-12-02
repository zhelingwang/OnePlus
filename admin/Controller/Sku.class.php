<?php
header("content-type:text/html;charset=utf-8;");
include_once(dirname(__DIR__).'/Common/Fpage.class.php');
class Sku extends Fpage{
	protected $db;
	protected $tab;
	public function __construct($db,$tab='sku',$size=1,$nums=5){
		$this->db=$db;
		$this->tab=$tab;
		 parent::__construct($db,$tab,$size,$nums);		
	}
	public function addSku(){
		$cid=$_POST['cid'];
		if($cid==0){
			return "请选择分类";
		}
		$gid=$_POST['gid'];
		if($gid==0){
			return "请选择商品";
		}
		$price=$_POST['price'];
		if(empty($price)){
			return "请输入价格";
		}
		$count=$_POST['count'];
		if(empty($count)){
			return "请输入数量";
		}
		$img=$_POST['img'];
		if(empty($img)){
			return "请上传图片";
		}
		if(isset($_POST['option_value'])){
			$option_value=$_POST['option_value'];
		}else{
			$option_value="";
		}
		
		if(isset($_POST['color_img'])){
			$arr=array();
			$arr['name']=$option_value;
			$arr['img']=$_POST['color_img'];
			$option_value=serialize($arr);
		}
		$pro=array();
		$keys=array_keys($_POST);
		$vals=array_values($_POST);
		for($i=5;$i<count($_POST)-1;$i++){
				$pro[$keys[$i]]=$vals[$i];
		}
		$option=serialize($pro);//序列化属性
		$sql="insert into {$this->tab} (gid,option_value,price,count,img) values('{$gid}','{$option_value}','{$price}','{$count}','{$img}')";
		if($this->db->otherData($sql)>0){
			return true;
		}else{
			return "添加SKU失败";
		}
	}

	public function getSkuByGid(){
		$gid=$_GET['gid'];
		$sql="select * from {$this->tab} where gid={$gid}";
		return $this->db->selectRows($sql);
	}

	public function oneSku(){
		$id=$_GET['id'];
		$sql="select * from {$this->tab} where id={$id}";
		return $this->db->selectRow($sql);
	}

	public function deleteSkuById(){
		$id=$_GET['id'];
		$sql="delete from {$this->tab} where id=$id  ";
		$res=$this->db->otherData($sql);
		if($res>0){
			return 1;
		}else{
			return 0;
		}
	}

	public function updateSkuById(){
		$id=$_GET['id'];
		$price=$_POST['price'];
		if(empty($price)){
			return "请输入价格";
		}
		$count=$_POST['count'];
		if(empty($count)){
			return "请输入数量";
		}
		$img=$_POST['img'];
		if(empty($img)){
			return "请上传图片";
		}
		$option_value=$_POST['option_value'];
		if(isset($_POST['color_img'])){
			$arr=array();
			$arr['name']=$_POST['option_value'];
			$arr['img']=$_POST['color_img'];
			$option_value=serialize($arr);
		}
		$pro=array();
		$keys=array_keys($_POST);
		$vals=array_values($_POST);
		for($i=3;$i<count($_POST)-1;$i++){
				$pro[$keys[$i]]=$vals[$i];
		}
		$option=serialize($pro);//序列化属性
		$sql="update {$this->tab} set price='$price',count='$count',img='$img',option_value='$option_value'  where id = $id ";
		if($this->db->otherData($sql)>=0){
			return true;
		}else{
			return "修改SKU失败";
		}
	}
}
