<?php
function loadClass($c)
{
	include ROOT."/classes/".$c.".class.php";
}
spl_autoload_register("loadClass");
if (!isset($_SESSION)) session_start();


?>