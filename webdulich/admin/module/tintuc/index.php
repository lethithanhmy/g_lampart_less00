<?php 
	$action = isset($_REQUEST["ac"])?$_REQUEST["ac"]:"";
	
	$path2 = "module/tintuc/danhmuc.php";	
	if ($action=="frm_addedit")
	{
		$path2 = "module/tintuc/frm_addedit.php";	
		
	}
		
	if ($action=="del")
	{
		$path2 = "module/tintuc/del.php";	
	}
	if ($action=="save_edit" ||$action=="save_new")
	{
		$path2 = "module/tintuc/save.php";	
	}
	include $path2;
	
	

?>