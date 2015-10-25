<?php

$ma = $_REQUEST["Ma_dia_danh"];
$ten = $_REQUEST["Ten_dia_danh"];
$maloai =$_REQUEST["Ma_loai_tour"];

$arr = array("Ma_dia_danh"=>$ma, "Ten_dia_danh"=>$ten, "Ma_loai_tour"=>$maloai);
//print_r($arr);
if ($_REQUEST["ac"]=="save_new")
{
	$obj->insert("diadanh", $arr);	
}

if ($_REQUEST["ac"]=="save_edit")
{
	$obj->update("diadanh",  $arr, "Ma_dia_danh='$ma' ");	
}



	if($obj->getMessage()=="Đã Thêm Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã thêm địa danh có mã là ".$ma." thành công!!!";
	}
	else if($obj->getMessage()=="Lỗi Thêm...")
	{
		$msg="msg-error";
		$thongbao=$obj->getMessage();
	}
	else if($obj->getMessage()=="Đã Update Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã sửa địa danh có mã là ".$ma." thành công!!!";
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
        <a href="index.php?mod=diadanh" class="close">close</a>
    </div>
</div>