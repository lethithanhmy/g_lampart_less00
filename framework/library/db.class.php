<?php
class db{
private $host = HOST;
private $username = USERNAME;
private $password = PASSWORD;
private $database = DATABASE;
private  $dbh = null;
private  $data = null;
private  $rowCount =0;
public $numPage=1;
private $mess ="";

function __construct()
{
	try
	{
		$dns ="mysql:host=" . $this->host."; dbname=". $this->database;
		$this->dbh = new PDO($dns,$this->username, $this->password);
		$this->dbh->query("set names 'utf8' ");
	}
	catch(Exception $e)
	{
		echo $e.getMessage();
		exit;
	}
}
function getNumPage()
	{
		return $this->numPage;
	}
function getRowCount()
	{
		return $this->rowCount;
	}
function getMessage()
	{
		return $this->mess;
	}
function query($sql)
	{
		$stm= $this->dbh->query($sql);
		$this->rowCount = $stm->rowCount();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
function setNumPage($sql, $arr = null)
{
		$sth = $this->dbh->prepare($sql);
		if ($arr!=null)
		{
			$arrKey = array_keys($arr);
			$arrValue = array_values($arr);
			$arrParam = array();
			foreach($arrKey as $v)
			{
				$arrParam[] = ":".$v;
			}
					
			foreach($arrParam as $k=> $v)
			{
			//	$sth->bindValue($v, $arrValue[$k]);	
				$sth->bindParam($v, $arrValue[$k]);	
			}
		}
		$sth->execute();
		$row = $sth->fetchAll(PDO::FETCH_ASSOC);
		 		
		$this->numPage= ceil( $row[0]["dem"]/PAGE_SIZE_AD); //tong so trang
		return($row[0]["dem"]); //tong so dong trong so tong trang
}
/*
insert vào table mảng các phần tử $arr
VD: $table="loai";
$arr["maloai"] = "L01"; 
$arr["tenloai"] = "Tên Loại 1";
=> Tạo câu sql
sql="insert into loai(maloai, tenloai) 
	          values(:maloai, :tenloai) ";
$stm->bindParam(":maloai", "L01");
$stm->bindParam(":tenloai", "Tên Loại 1");			   
*/
function insert($table, $arr)
{
		$arrKey = array_keys($arr);
		$arrValue = array_values($arr);
		$arrParam = array();
		foreach($arrKey as $v)
		{
			$arrParam[] = ":".$v;
		}
		
		//print_r($arrParam);
		//print_r($arrValue);
		$sql ="Insert into ". $table;
		$sql .= " (" . implode(",", $arrKey). ")";
		$sql .=" values(". implode(",", $arrParam).")";
		//echo $sql; exit;
		$sth = $this->dbh->prepare($sql);
		foreach($arrParam as $k=> $v)
		{
			$sth->bindParam($v, $arrValue[$k]);	
		}
		$this->rowCount = $sth->execute();
		if ($this->rowCount>0) $this->mess="Đã Thêm Thành Công";
		else $this->mess="Lỗi Thêm...";
		return $this->rowCount;
	
}
/*
$strWhere:  Điều kiện where
$arrValue: Mảng giá trị cần thay đổi

*/
function update($table,$arrValue, $strWhere )
	{
		$sql ="Update ". $table;
		$sql .=" set ";
		foreach($arrValue as $k=> $v)
		{
			$sql.= $k."= :".$k.",";
		}
		
		$sql= substr($sql, 0, strlen($sql)-1);
		
		$sql .="  where ". $strWhere;
		$sth= $this->dbh->prepare($sql);
		foreach($arrValue as $k=>$v)
		{ 
		
			//$sth->bindParam(":".$k, $arr[$k]);//ok
			//Chú ý: not $sth->bindParam(":".$k, $v);
			$sth->bindValue(":".$k, $v);
		
		}
		
		$this->rowCount = $sth->execute();
		if ($this->rowCount>0) $this->mess="Đã Update Thành Công";
		else $this->mess="Lỗi Update...";
		return $this->rowCount;
	}

/*
Table: Bảng cần xóa
$strWhere: Các điều kiện  khi xóa

*/
function delete($table, $strWhere)
	{
		
		$sql ="Delete from ". $table ;
		
		$sql .="  where ". $strWhere;
		//echo $sql; 
		$sth= $this->dbh->prepare($sql);
		$this->rowCount = $sth->execute();
		if ($this->rowCount>0) $this->mess="Đã Xóa Thành Công";
		else $this->mess="Lỗi Xóa...";
		return $this->rowCount;
	}

function select($table, $arrColumn, $whereCond="")
	{
		$sql="select ". implode(",",$arrColumn) ." from ". $table;
		if ($whereCond!="")
			$sql .=" where $whereCond ";
		//echo $sql;
		return $this->query($sql);
	}
/*
Trả về giá trị cột trong sql: select Count(*) FROM....
Dòng 0, cột 0.
*/
function selectWithBindParam($sql, $arr = null)
{  
		$sth = $this->dbh->prepare($sql);
		if ($arr!=null)
		{
			$arrKey = array_keys($arr);
			$arrValue = array_values($arr);
			$arrParam = array();
			foreach($arrKey as $v)
			{
				$arrParam[] = ":".$v;
			}
					
			foreach($arrParam as $k=> $v)
			{
			//	$sth->bindValue($v, $arrValue[$k]);	
				$sth->bindParam($v, $arrValue[$k]);	
			}
		}
		 $sth->execute();
		 $this->rowCount = $sth->rowCount();
		 return $sth->fetchAll(PDO::FETCH_ASSOC);
}

function getNumRow($sql)
	{
		$stm= $this->dbh->query($sql);
		$rows =$stm->fetchAll(PDO::FETCH_NUM);
		return $rows[0][0];
		
	}
}

?>