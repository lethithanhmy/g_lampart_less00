<?php
if (($_FILES["Hinh_anh"]["type"] == "image/gif")
|| ($_FILES["Hinh_anh"]["type"] == "image/jpeg")
|| ($_FILES["Hinh_anh"]["type"] == "image/jpg")
|| ($_FILES["Hinh_anh"]["type"] == "image/pjpeg")
|| ($_FILES["Hinh_anh"]["type"] == "image/x-png")
|| ($_FILES["Hinh_anh"]["type"] == "image/png"))
{
$ma = isset($_REQUEST["Ma_tour"])?$_REQUEST["Ma_tour"]:"";
$ten = $_REQUEST["Ten_tour"];
$pt =$_REQUEST["Phuong_tien"];
$ngaybd = $_REQUEST["Ngay_bat_dau"];
$ngaykt = $_REQUEST["Ngay_ket_thuc"];
$gia = $_REQUEST["Gia"];
$noidung = $_REQUEST["Noi_dung"];
$hinh = $_FILES["Hinh_anh"]["name"];
$noidung2 = $_REQUEST["Noi_dung2"];
$socho = $_REQUEST["So_cho_toi_da"];

if ($hinh !="")
 {
	move_uploaded_file($_FILES["Hinh_anh"]["tmp_name"], ROOT ."/image_data/tour/".$hinh);	 
}

$arr = array("Ten_tour"=>$ten, "Phuong_tien"=>$pt, "Ngay_bat_dau"=>$ngaybd, "Ngay_ket_thuc"=>$ngaykt, "Gia"=>$gia, "Noi_dung"=>$noidung, "Noi_dung2"=>$noidung2, "So_cho_toi_da"=>$socho);
//print_r($arr);
if ($_REQUEST["ac"]=="save_new")
{
	$arr["Hinh_anh"] = $hinh;
	$obj->insert("tour", $arr);
	//them diadanh_tour
	if(isset($_REQUEST['dds']))
	{
		$result =$obj->query("SELECT Ma_tour FROM tour order by Ma_tour desc limit 0,1");
		if($obj->getRowCount()>0)
		{
			$row = $result[0];
			foreach($_REQUEST['dds'] as $dd) {	
				$arr_dd = array("Ma_tour"=>$row["Ma_tour"], "Ma_dia_danh"=>$dd);
				$obj->insert("diadanh_tour", $arr_dd);			
			}
		}
	}
}

if ($_REQUEST["ac"]=="save_edit")
{
	if ($hinh !="") $arr["Hinh_anh"] = $hinh;
	$obj->update("tour",  $arr, "Ma_tour='$ma' ");
	//them diadanh_tour	
	$obj->delete("diadanh_tour", "Ma_tour='$ma' ");
	if(isset($_REQUEST['dds']))
	{
		foreach($_REQUEST['dds'] as $dd) {	
			$arr_dd = array("Ma_tour"=>$ma, "Ma_dia_danh"=>$dd);
			$obj->insert("diadanh_tour", $arr_dd);			
		}

	}
}



	if($obj->getMessage()=="Đã Thêm Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã thêm tour thành công!!!";
	}
	else if($obj->getMessage()=="Lỗi Thêm...")
	{
		$msg="msg-error";
		$thongbao=$obj->getMessage();
	}
	else if($obj->getMessage()=="Đã Update Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã sửa tour có mã là ".$ma." thành công!!!";
	}
	else if($obj->getMessage()=="Lỗi Update...")
	{
		$msg="msg-error";
		$thongbao=$obj->getMessage();
	}
	?>
    <div class="shell">	
    <!-- Message OK -->		
    <div class="msg <?php echo $msg; ?>">
        <p><strong><?php echo $thongbao; ?></strong></p>
        <a href="index.php?mod=tour" class="close">close</a>
    </div>
	</div>
    <?php
}
else
{
	?>
		<div class="shell">	
		<!-- Message OK -->		
		<div class="msg msg-error">
			<p><strong>Chọn sai định dạng hình</strong></p>
			<button type="button" onclick="window.history.go(-1);" >Exit</button>
		</div>
		</div>
<?php
}
?>
