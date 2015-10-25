<?php 
	$action = isset($_REQUEST["ac"])?$_REQUEST["ac"]:"";
	
	$path2 = "module/diadanh/danhmuc.php";	
	if ($action=="frm_addedit")
	{
		$path2 = "module/diadanh/frm_addedit.php";	
		
	}
		
	if ($action=="del")
	{
		$path2 = "module/diadanh/del.php";	
	}
	if ($action=="save_edit" ||$action=="save_new")
	{
		$path2 = "module/diadanh/save.php";	
	}
	include $path2;
	
	

?>