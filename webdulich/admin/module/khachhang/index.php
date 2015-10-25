<?php 
	$action = isset($_REQUEST["ac"])?$_REQUEST["ac"]:"";
	
	$path2 = "module/khachhang/danhmuc.php";	
	
	if ($action=="chan")
	{
		$path2 = "module/khachhang/chan.php";	
	}
	if ($action=="bochan")
	{
		$path2 = "module/khachhang/bochan.php";	
	}
	include $path2;
	
	

?>