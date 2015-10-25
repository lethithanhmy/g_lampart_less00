<?php
	$tendangnhap = $_GET["Ten_dang_nhap"];
	$arrValue=array("Active"=>0);
	$obj->update("khachhang",$arrValue, "Ten_dang_nhap='$tendangnhap'" );
	if($obj->getMessage()=="Đã Update Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Chặn khách hàng ".$tendangnhap." thành công!!!";
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
        <a href="index.php?mod=khachhang" class="close">close</a>
    </div>
</div>