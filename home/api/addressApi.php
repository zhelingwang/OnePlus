<?php
include("../controller/Address.class.php");
$a=new Address();
if(!isset($_SESSION['userId'])){
	session_start();
}
if(isset($_GET['act'])){
	if($_GET['act']=='add'){
		$userid=$_SESSION['userId'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$addr=$_POST['addr'];
		$result=$a->saveAddress($userid,$name,$phone,$addr);
		echo json_encode($result);
	}
	if($_GET['act']=='update'){
		$userid=$_SESSION['userId'];
		$addrid=$_POST['addrid'];
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$addr=$_POST['addr'];
		$result=$a->updateAddress($addrid,$userid,$name,$phone,$addr);
		echo json_encode($result);
	}
	if($_GET['act']=='setDefault'){
		$userid=$_SESSION['userId'];
		$addrid=$_POST['addrid'];
		$result=$a->setDefault($userid,$addrid);
		echo json_encode($result);
	}
	if($_GET['act']=='delete'){
		$addrid=$_POST['addrid'];
		$result=$a->deleteAddress($addrid);
	}
}else{
	$userid=$_SESSION['userId'];
	$address=$a->getAddressByUid($userid);
}
?>