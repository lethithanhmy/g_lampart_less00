<?php
class tinhtoan
{
	function DateToDate_Be($Ngay)
	{
			$t=explode("-",$Ngay);
			if(!isset($t[1])||!isset($t[1])||!isset($t[1]))
			{
				return null;
			}
			$xuat=$t[2]."-".$t[1]."-".$t[0];
			return $xuat;
	}
	function TinhKhoangCach2Ngay($NgayDau,$NgayCuoi)
	{
		$datedau = strtotime($NgayDau);
		$datecuoi = strtotime($NgayCuoi);
		$datediff = abs($datecuoi - $datedau);
		echo floor($datediff/(60*60*24)+1)." Ngày ".($datediff/(60*60*24))." Đêm"; //floor lam tron xuong 3.5=3
	}
	
	function TinhThoiGianConLai($NgayBatDau)
	{
		$now = strtotime(date('Y-m-d'));
		$datebatdau = strtotime($NgayBatDau);
		$datediff = abs($datebatdau - $now);
		echo floor($datediff/(60*60*24));
	}
	
	function DinhDangTien($money)
	{
		echo number_format($money, 2, ',', '.')." đ";
	}
	
	function DinhDangTieuDe($tieude)
	{
		echo str_replace("-","<br>",$tieude);
	}
}
?>