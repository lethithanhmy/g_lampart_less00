<?php
	$ma = $_GET["Ma_dia_danh"];
	$obj->delete("diadanh", "Ma_dia_danh='$ma' ");
	
	if($obj->getMessage()=="Đã Xóa Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã xóa địa danh có mã là ".$ma." thành công!!!";
	}
	else if($obj->getMessage()=="Lỗi Xóa...")
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