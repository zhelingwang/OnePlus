<?php
include("../controller/User.class.php");
$user=new User();
if($user->logout()){
	echo "<script> window.location.href='../';</script>";
}