<?php
include("../controller/Good.class.php");
include("../controller/Sku.class.php");
$g=new Good();
$s=new Sku();
if(isset($_GET['key'])){
	$key=$_GET['key'];
	$goods=$g->searchGoodByKey($key);
	for($i=0;$i<count($goods);$i++){
		$goods[$i]['minprice']=$s->getMinPriceByGid($goods[$i]['id']);
	}
	
	//var_dump($goods);
}
?>