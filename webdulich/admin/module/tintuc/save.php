<?php

$ma = $_REQUEST["Ma_tin_tuc"];
$ten = $_REQUEST["Ten_tin_tuc"];
$noidungtt =$_REQUEST["Noi_dung_tom_tat"];
$noidung = $_REQUEST["Noi_dung"];
$hinh = $_FILES["Hinh_anh"]["name"];
if ($hinh !="")
 {
	move_uploaded_file($_FILES["Hinh_anh"]["tmp_name"], ROOT ."/image_data/tintucdulich/".$hinh);	 
}

$arr = array("Ma_tin_tuc"=>$ma, "Ten_tin_tuc"=>$ten, "Noi_dung_tom_tat"=>$noidungtt,
			  "Noi_dung"=>$noidung);
//print_r($arr);
if ($_REQUEST["ac"]=="save_new")
{
	$arr["Hinh_anh"] = $hinh;
	$obj->insert("tintuc", $arr);	
}

if ($_REQUEST["ac"]=="save_edit")
{
	if ($hinh !="") $arr["Hinh_anh"] = $hinh;
	$obj->update("tintuc",  $arr, "Ma_tin_tuc='$ma' ");	
}



	if($obj->getMessage()=="Đã Thêm Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã thêm tin tức có mã là ".$ma." thành công!!!";
	}
	else if($obj->getMessage()=="Lỗi Thêm...")
	{
		$msg="msg-error";
		$thongbao=$obj->getMessage();
	}
	else if($obj->getMessage()=="Đã Update Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã sửa tin tức có mã là ".$ma." thành công!!!";
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
        <a href="index.php?mod=tintuc" class="close">close</a>
    </div>
</div>