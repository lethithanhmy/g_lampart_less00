<?php
$khachhang = new khachhang();
$u = isset($_POST["txtUser"])?$_POST["txtUser"]:"";
$p = isset($_POST["txtPass"])?MD5($_POST["txtPass"]):"";

$khachhang->checkLogDB($u, $p);
if ($khachhang->isLogged())
{		
		include "module/khachhang/formlogin_1.php";
}
else
{
	include "module/khachhang/formlogin_0.php";	
}
?>
