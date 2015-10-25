<?php
	$ma = $_GET["Ma_tour"];
	$obj->delete("phieudattour", "Ma_tour='$ma' ");
	$obj->delete("diadanh_tour", "Ma_tour='$ma' ");
	$obj->delete("tour", "Ma_tour='$ma' ");
	
	if($obj->getMessage()=="Đã Xóa Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã xóa tour có mã là ".$ma." thành công!!!";
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
        <a href="index.php?mod=tour" class="close">close</a>
    </div>
</div>