<?php
session_start();
if(isset($_SESSION["userId"])&&isset($_SESSION["userName"])){
	echo json_encode(array('status'=>1));
}else{
	echo json_encode(array('status'=>0));
}
?>