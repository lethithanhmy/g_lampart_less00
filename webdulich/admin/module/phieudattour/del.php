<?php
	$maphieudat = $_GET["Ma_phieu_dat"];
	$arrValue=array("Tinh_trang"=>"Đã hủy");
	$obj->update("phieudattour",$arrValue, "Ma_phieu_dat='$maphieudat'" );
	if($obj->getMessage()=="Đã Update Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã hủy phiếu đặt có mã là ".$maphieudat." thành công!!!";
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
        <a href="index.php?mod=phieudattour" class="close">close</a>
    </div>
</div>