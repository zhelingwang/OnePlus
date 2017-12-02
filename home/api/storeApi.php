<?php
include("../controller/Sku.class.php");
include("../controller/Good.class.php");
if(!isset($_SESSION))
session_start();
$s=new Sku();
$g=new Good();

$part_cid=array(1,2,3,4);
$part=array();
foreach ($part_cid as $cid) {
	$goods=$g->getGoodsByCid($cid);
	if(!empty($goods)){
		$good=$goods[0];
		$good['minprice']=$s->getMinPriceByGid($good['id']);
		array_push($part,$good);
	}
}

$life_cid=array(6);
$life=array();
foreach ($life_cid as $cid) {
	$goods=$g->getGoodsByCid($cid);
	for($i=0;$i<4;$i++){
		if(isset($goods[$i])){
			$good=$goods[$i];
			$good['minprice']=$s->getMinPriceByGid($good['id']);
			array_push($life,$good);
		}
	}
}
?>