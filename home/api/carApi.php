<?php
include("../controller/Car.class.php");
include("../controller/Sku.class.php");
include("../controller/Address.class.php");
$c=new Car();
$s=new Sku();
$a=new Address();
if(isset($_GET['act'])){
	if($_GET['act']=='add'){
		$skuid=$_POST['skuid'];
		$result=$c->addSkuToCart($skuid);
		echo json_encode($result);
	}
	if($_GET['act']=='delete'){
		$skuid=$_POST['skuid'];
		$result=$c->deleteSkuInCar($skuid);
		echo json_encode($result);
	}
	if($_GET['act']=='update'){
		$count=$_POST['count'];
		$skuid=$_POST['skuid'];
		$c->updateCount($count,$skuid);
	}
	if($_GET['act']=="check"){
		echo json_encode($c->checkEmpty());
	}
}else{
	if(!isset($_SESSION)){
		session_start();
	}
	if(!isset($_SESSION['userId'])){
		echo "<script>window.location.href='../view/login.php'</script>";
	}
	$userid=$_SESSION['userId'];
	$skus=$c->getSkusInCar($userid);
	foreach ($skus as &$sku) {
		if($sku['option_name']=="颜色"){
			$sku['option_value']=unserialize($sku['option_value']);
		}
	}
	unset($sku);
	$address=$a->getAddressByUid($userid);
}
?>