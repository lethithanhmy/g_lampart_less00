<?php
class admin extends db
{
	private $usernameAD="";
	private $dadangnhapAD;
	function __construct()
	{
		parent::__construct();	
		if(isset($_SESSION["dadangnhapAD"])) 
		{	$this->dadangnhapAD= $_SESSION["dadangnhapAD"];
		}
		if(isset($_SESSION["usernameAD"]))
		{
		$this->usernameAD = $_SESSION["usernameAD"];
		}
		$this->logOut();
	}
	function isLogged()
	{
		return $this->dadangnhapAD;
	}
	
	function getUserName()
	{
		return $this->usernameAD;
	}
	
	function logOut()
	{
		$action= isset($_REQUEST["ac"])?$_REQUEST["ac"]:"";
		if($action=="logoutAD")
		{
		unset($_SESSION["dadangnhapAD"]);
		unset($_SESSION["usernameAD"]);
		$this->dadangnhapAD=false;
		$this->usernameAD="";
		}
	}
	function checkLogDB($id, $pass)
	{
		$rows =$this->query("SELECT * FROM admin WHERE Ten_dang_nhap = '".$id."'");
		if ($id=="")
		{
			$_SESSION['thongbao_loginAD'] = 'Chưa nhập username!';
			return false;	
		}
		if (count($rows)<=0) 
		{  
			$_SESSION['thongbao_loginAD'] = 'Thông tin đăng nhập sai!';
			return false;
		}
		$row = $rows[0];
		if($row["Mat_khau"]==$pass)
		{  
			$_SESSION["dadangnhapAD"]= 1;
			$_SESSION["usernameAD"]= $id;//Hoac ho ten ...
			$this->dadangnhapAD=$_SESSION["dadangnhapAD"];
			$this->usernameAD=$_SESSION["usernameAD"];
			$this->logged=1;
			return true;
		
		}
		else 
		{
			$_SESSION['thongbao_loginAD'] = 'Mật khẩu sai!';
			return false;
		}
		
	}
}
?>