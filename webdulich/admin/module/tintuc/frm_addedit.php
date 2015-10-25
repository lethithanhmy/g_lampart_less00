<script>
function checktintuc(){
	if(document.getElementById('Ma_tin_tuc').value==""){
		alert("Bạn chưa nhập mã tin tức");	
		document.getElementById('Ma_tin_tuc').focus(); 
		return false;   // Chặn form không cho submit
	}	
	if(document.getElementById('Ten_tin_tuc').value==""){
		alert("Bạn chưa nhập tên tin tức");	
		document.getElementById('Ten_tin_tuc').focus(); 
		return false;   // Chặn form không cho submit
	}
	if(document.getElementById('Noi_dung_tom_tat').value==""){
		alert("Bạn chưa nhập nội dung tóm tắt");	
		document.getElementById('Noi_dung_tom_tat').focus(); 
		return false;   // Chặn form không cho submit
	}
	return true; // Cho submit form khi đã kiểm tra xong
}
</script>
<?php
	$ma = utils::getIndex("Ma_tin_tuc"); 
	$rows =$obj->query("select * from tintuc where Ma_tin_tuc='$ma' ");
	
	if ($obj->getRowCount()>0)
	{ 
		$ac="save_edit";
		$row = $rows[0];
	}
	else 
	{ 
		$ac ="save_new";
		$row= array(); 
		$row["Ma_tin_tuc"]="";
		$row["Hinh_anh"]="";
		$row["Noi_dung_tom_tat"]="";
		$row["Noi_dung"]="";
		$row["Ten_tin_tuc"]="";
	}
?>
<div class="shell">	
    <br />
    <!-- Main -->
    <div id="main">
        <div class="cl">&nbsp;</div>
        
        <!-- Content -->
        <div id="content">
            <!-- Box -->
                        <div class="box">
                            <!-- Box Head -->
                            <div class="box-head">
                                <h2>
                                <?php
									if ($ac=="save_edit") 
										echo "Sửa Tin Tức";
									else
										echo "Thêm Tin Tức";	
								?>
                                </h2>
                            </div>
                            <!-- End Box Head -->
                            
                            <form onsubmit="return checktintuc();" action="index.php?mod=tintuc" method="post" enctype="multipart/form-data" id="frmedit">
                                <input type="hidden" name="ac" value="<?php echo $ac;?>" />
                                <!-- Form -->
                                <div class="form">
                                        <p>
                                
                                            <label>Mã tin tức</label>
                                            <input type="text" class="field size1" id="Ma_tin_tuc" name="Ma_tin_tuc" value="<?php echo $row["Ma_tin_tuc"];?>" />
                                        </p>
                                        <p>

                                            <label>Tên tin tức</label>
                                            <input id="Ten_tin_tuc" type="text" class="field size1" name="Ten_tin_tuc" value="<?php echo $row["Ten_tin_tuc"];?>" />
                                        </p>
                                        <p>

                                            <label>Hình ảnh</label>
                                            <input type="file" class="field size1" name="Hinh_anh" />
                                        </p>	                               			<p>
                                        <?php
										if ($row["Hinh_anh"] !="") 
											{
										?>
                                        <img src="<?php echo BASE_URL."image_data/tintucdulich/". $row["Hinh_anh"];?>" style="width:100px;" />
										<?php
                                        }
                                        ?>
                                        </p>
                                        <p>

                                            <label>Nội dung tóm tắt</label>
                                            <textarea class="field size1" id="Noi_dung_tom_tat" name="Noi_dung_tom_tat"  rows="10" cols="30" style="height: 70px;" ><?php echo $row["Noi_dung_tom_tat"];?></textarea>
                                        </p>	
                                        <p>

                                            <label>Nội dung</label>
                                            <textarea class="field size1" name="Noi_dung" id="Noi_dung" rows="10" cols="80"><?php echo $row["Noi_dung"];?></textarea>
                                         <script>
											// Replace the <textarea id="editor1"> with a CKEditor
											// instance, using default configuration.
											CKEDITOR.replace( 'Noi_dung' );
										</script>
                                        </p>
                                    
                                </div>
                                <!-- End Form -->
                                
                                <!-- Form Buttons -->
                                <div class="buttons">
                                    <input type="submit" class="button" value="submit" />
                                </div>
                                <!-- End Form Buttons -->
                            </form>
                        </div>
                        <!-- End Box -->
                        
         </div>
        <!-- End Content -->
                    
        <div class="cl">&nbsp;</div>			
    </div>
    <!-- Main -->
</div>