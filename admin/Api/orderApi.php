<?php
header("content-type:text/html;charset=utf-8;");
require('../Model/Db.class.php');
require('../Controller/Order.class.php');
$db=new Db();
$o=new Order($db,'order',5);
if(isset($_GET['act'])){
	if($_GET['act']=="changeStatus"){
		$orderid=$_POST['orderid'];
		$status=$_POST['status'];
		$o->changeStatusById($orderid,$status);
	}
}else if(isset($_GET['id'])){
	$id=$_GET['id'];
	$rows=$o->getSkusInOrder($id);
	
}
else{
	$o->init();
	$rows=$o->getCntByPage();
	$links=$o->makeTxtLinks();
}