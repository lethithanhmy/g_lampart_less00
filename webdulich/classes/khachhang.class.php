<?php
class khachhang extends db
{
	private $usernameKH="";
	private $dadangnhap;
	function __construct()
	{
		parent::__construct();	
		if(isset($_SESSION["dadangnhap"])) 
		{	$this->dadangnhap= $_SESSION["dadangnhap"];
		}
		if(isset($_SESSION["usernameKH"]))
		{
		$this->usernameKH = $_SESSION["usernameKH"];
		}
		$this->logOut();
	}
	function isLogged()
	{
		return $this->dadangnhap;
	}
	
	function getUserName()
	{
		return $this->usernameKH;
	}
	
	function logOut()
	{
		$action= isset($_REQUEST["ac"])?$_REQUEST["ac"]:"";
		if($action=="logout")
		{
		unset($_SESSION["dadangnhap"]);
		unset($_SESSION["usernameKH"]);
		$this->dadangnhap=false;
		$this->usernameKH="";
		}
	}
	function checkLogDB($id, $pass)
	{
		$rows =$this->query("SELECT * FROM khachhang WHERE Ten_dang_nhap = '".$id."' AND Active=1");
		//print_r($rows);
		//echo "pass=:$pass <p>";
		if ($id=="")
		{
			$_SESSION['thongbao_login'] = '';
			return false;	
		}
		if (count($rows)<=0) 
		{  
			$_SESSION['thongbao_login'] = 'Thông tin đăng nhập sai!';
			return false;
		}
		$row = $rows[0];
		if($row["Mat_khau"]==$pass)
		{  
			$_SESSION["dadangnhap"]= 1;
			$_SESSION["usernameKH"]= $id;//Hoac ho ten ...
			$this->dadangnhap=$_SESSION["dadangnhap"];
			$this->usernameKH=$_SESSION["usernameKH"];
			$this->logged=1;
			return true;
		
		}
		else 
		{
			$_SESSION['thongbao_login'] = 'Mật khẩu sai!';
			return false;
		}
		
	}
}
?>