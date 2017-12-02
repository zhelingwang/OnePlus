<?php
include("../controller/Order.class.php");
include("../controller/Car.class.php");
session_start();
$c=new Car();
$o=new Order();
if(isset($_GET['act'])){
	if($_GET['act']=="add"){
		$userid=$_POST['userid'];
		$client_name=$_POST['client_name'];
		$client_phone=$_POST['client_phone'];
		$client_addr=$_POST['client_addr'];
		$skus=$_POST['skus'];
		$result=$o->submitOrder($userid,$skus,$client_name,$client_phone,$client_addr);
		if($result==1){
			$c->clear($userid);
			echo json_encode($result);
		}else{
			echo json_encode($result);
		}
	}
}else{
	if(!isset($_SESSION)){
		session_start();
	}
	$userid=$_SESSION['userId'];
	$orders=$o->getOrdersByUserId($userid);
	foreach ($orders as &$order) {
		$order['skuInfo']=$o->getSkusInOrder($order['id']);
	}
	unset($order);

}



?>