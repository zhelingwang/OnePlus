<?php
include("../controller/Category.class.php");
include("../controller/Good.class.php");
include("../controller/Sku.class.php");
session_start();
$c=new Category();
$g=new Good();
$s=new Sku();
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$category=$c->getCategoryById($id);
	$goods=$g->getGoodsByCid($id);
	foreach ($goods as &$good) {
		$gid=$good['id'];
		$minprice=$s->getMinPriceByGid($good['id']);
		$good['minprice']=$minprice;
	}
	unset($good);
}
?>