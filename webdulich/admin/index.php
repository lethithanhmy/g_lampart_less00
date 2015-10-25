<?php
define("EXE", 1);

include_once "../config/config.php";
include_once ROOT."/config/ini.php";

$obj = new db();
$tt = new tinhtoan();

$admin = new admin();
$u = isset($_POST["txtUserAD"])?$_POST["txtUserAD"]:"";
$p = isset($_POST["txtPassAD"])?MD5($_POST["txtPassAD"]):"";

$admin->checkLogDB($u, $p);
if ($admin->isLogged())
{		
	include ROOT."/admin/index1.php";
}
else
{
	include ROOT."/admin/index0.php";	
}
?>
