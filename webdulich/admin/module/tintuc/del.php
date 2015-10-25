<?php
	$ma = $_GET["Ma_tin_tuc"];
	$obj->delete("tintuc", "Ma_tin_tuc='$ma' ");
	
	if($obj->getMessage()=="Đã Xóa Thành Công")
	{
		$msg="msg-ok";
		$thongbao="Đã xóa tin tức có mã là ".$ma." thành công!!!";
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
        <a href="index.php?mod=tintuc" class="close">close</a>
    </div>
</div>