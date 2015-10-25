
<?php 
	$action = isset($_REQUEST["ac"])?$_REQUEST["ac"]:"";
	
	$path2 = "module/phieudattour/danhmuc.php";	
	
	if ($action=="huy")
	{
		$path2 = "module/phieudattour/del.php";	
	}
	if ($action=="duyet")
	{
		$path2 = "module/phieudattour/duyet.php";	
	}
	include $path2;
	
	

?>