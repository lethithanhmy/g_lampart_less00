<?php
$path ="info/trangchu.php";

	$mod = isset($_GET["mod"])?$_GET["mod"]:"";
	$ac = isset($_GET["ac"])?$_GET["ac"]:"";	
		
	if($mod=="tour")
	{
			$path ="module/tour/index.php";
	}
	if($mod=="phieudattour")
	{
			$path ="module/phieudattour/index.php";
	}
	if($mod=="tintuc")
	{
			$path ="module/tintuc/index.php";
	}
	if($mod=="loai")
	{
			$path ="module/loai/index.php";
	}
	if($mod=="khachhang")
	{
			$path ="module/khachhang/index.php";
	}
	if($mod=="diadanh")
	{
			$path ="module/diadanh/index.php";
	}
	if($mod=="kttour")
	{
			$path ="module/kttour.php";
	}
include $path;
?>