<?php
include("../controller/Sku.class.php");
include("../controller/Good.class.php");
session_start();
$s=new Sku();
$g=new Good();
if(isset($_GET['id'])){
	$gid=$_GET['id'];
	$good=$g->oneGood($gid);
	$good['parameter']=unserialize($good['parameter']);
	$good['minprice']=$s->getMinPriceByGid($good['id']);
	$skus=$s->getSkuByGid($gid);//找到这个商品的所有sku
	if($good['option_name']=="颜色"){
		foreach ($skus as &$sku) {
			$sku['option_value']=unserialize($sku['option_value']);
		}
	}
	unset($sku);
}
?>