<?php
//header("content-type:text/html;charset=utf-8;");
include(realpath(__DIR__.'/config.php'));//绝对路径
class Db{
	protected $conn;//受保护的
	//private $conn;//私有的
	public function __construct(){//构造函数
		$this->conn=mysqli_connect(HOST,USER,PWD);//登录服务器
		mysqli_select_db($this->conn,DB);//选数据库
		mysqli_query($this->conn,'set names utf8');//防止乱码
	}
	//选取一条记录
	/*
	*  作用：选取一条记录
	*  参数：sql语句(字符串)
	* 返回值：一维数组
	*/
	public function selectRow($sql){
		$row='';		
		$res=mysqli_query($this->conn,$sql);//执行$sql语句，返回结果集
		$row=mysqli_fetch_assoc($res);//从结果集中取一条记录
		return $row;
	}
	//选取多条记录
	public function selectRows($sql){
		$rows=array();
		$res=mysqli_query($this->conn,$sql);//执行$sql语句，返回结果集
		if(empty($res)){
			return false;
		}
		while($row=mysqli_fetch_assoc($res)){
			$rows[]=$row;
		}
		return $rows;
	}
	//处理数据(insert 、delete、update、)
	public function otherData($sql){
		mysqli_query($this->conn,$sql);
		return mysqli_affected_rows($this->conn);
	}

	public function __destruct(){
		if($this->conn){
			mysqli_close($this->conn);
		}		
	}
}//类结束

