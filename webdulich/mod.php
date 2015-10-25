<?php
$path ="module/info/trangchu.php";

	$mod = isset($_GET["mod"])?$_GET["mod"]:"";
	$ac = isset($_GET["ac"])?$_GET["ac"]:"";	
		
	if($mod=="info")
	{
		if ($ac=="gioithieu") 
			$path ="module/info/gioithieu.php";
		if ($ac=="lienhe") 
			$path ="module/info/lienhe.php";
	}
	if($mod=="new")
	{
		if($ac=="read")
			$path="module/new/read.php";
		if($ac=="read_one")
			$path="module/new/read_one.php";
		if($ac=="read_tk")
			$path="module/new/read_timkiem.php";
	}
	if($mod=="tour")
	{
		if ($ac=="loai") 
			$path ="module/tour/tour_loai.php";
		if ($ac=="diadanh") 
			$path ="module/tour/tour_diadanh.php";
		if ($ac=="chitiet") 
			$path ="module/tour/tour_chitiet.php";
		if ($ac=="timkiem") 
			$path ="module/tour/tour_timkiem.php";

	}
	if ($mod=="lienhe") 
		$path ="module/lienhe/guimail.php";
	if ($mod=="khachhang") 
	{
		if ($ac=="dangky") 
			$path ="module/khachhang/formdangky.php";
		if ($ac=="dattour") 
			$path ="module/khachhang/dattour.php";
 		if ($ac=="xemdattour") 
			$path ="module/khachhang/xemdattour.php";

	}
include $path;
?>