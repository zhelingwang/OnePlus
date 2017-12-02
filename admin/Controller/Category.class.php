<?php
header("content-type:text/html;charset=utf-8;");
include_once(dirname(__DIR__).'/Common/Fpage.class.php');
class Category extends Fpage{
	protected $db;
	protected $tab;
	public function __construct($db,$tab='category',$size=1,$nums=5){
		$this->db=$db;
		$this->tab=$tab;
		 parent::__construct($db,$tab,$size,$nums);		
	}
	//选取全部分类内容
	public function getAllCategory(){
		$sql="select * from {$this->tab}";	
		return $this->db->selectRows($sql);
	}

	//根据id取单个菜单内容
	public function oneCategory(){
		$id=$_GET['id'];
		$sql="select * from {$this->tab} where id={$id}";
		return $this->db->selectRow($sql);
	}

	//根据id 更新分类
	public function updateCategoryById(){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$banner_img=($_POST['banner_img']!="")?$_POST['banner_img']:$_POST['old_img'];
		$sql="update {$this->tab} set name='{$name}',banner_img='{$banner_img}' where id={$id}";
		if($this->db->otherData($sql)<0){
			return "分类更新失败";
		}else{
			return true;
		}
	}

}//类结束
