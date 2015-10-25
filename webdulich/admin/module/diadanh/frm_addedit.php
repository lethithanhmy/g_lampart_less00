<script>
function checkdiadanh(){
	if(document.getElementById('Ma_dia_danh').value==""){
		alert("Bạn chưa nhập mã địa danh");	
		document.getElementById('Ma_dia_danh').focus(); 
		return false;   // Chặn form không cho submit
	}	
	if(document.getElementById('Ten_dia_danh').value==""){
		alert("Bạn chưa nhập tên địa danh");	
		document.getElementById('Ten_dia_danh').focus(); 
		return false;   // Chặn form không cho submit
	}
	return true; // Cho submit form khi đã kiểm tra xong
}
</script>
<?php
	$ma = utils::getIndex("Ma_dia_danh"); 
	$rows =$obj->query("select * from diadanh where Ma_dia_danh='$ma' ");
	
	if ($obj->getRowCount()>0)
	{ 
		$ac="save_edit";
		$row = $rows[0];
	}
	else 
	{ 
		$ac ="save_new";
		$row= array(); 
		$row["Ma_dia_danh"]="";
		$row["Ten_dia_danh"]="";
		$row["Ma_loai_tour"]="";
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
										echo "Sửa Địa Danh";
									else
										echo "Thêm Địa Danh";	
								?>
                                </h2>
                            </div>
                            <!-- End Box Head -->
                            
                            <form onsubmit="return checkdiadanh();" action="index.php?mod=diadanh" method="post" enctype="multipart/form-data" id="frmedit">
                                <input type="hidden" name="ac" value="<?php echo $ac;?>" />
                                <!-- Form -->
                                <div class="form">
                                        <p>
                                            <label>Mã địa danh</label>
                                            <input type="text" class="field size1" id="Ma_dia_danh" name="Ma_dia_danh" value="<?php echo $row["Ma_dia_danh"];?>" />
                                        </p>
                                        <p>

                                            <label>Tên địa danh</label>
                                            <input id="Ten_dia_danh" type="text" class="field size1" name="Ten_dia_danh" value="<?php echo $row["Ten_dia_danh"];?>" />
                                        </p>
                                        <p>

                                            <label>Tên loại tour</label>

                                            <select name="Ma_loai_tour" class="field small-field" onchange="f1()">
                                            <?php
											$result2 =$obj->query("SELECT * FROM loaitour");
											foreach($result2 as $row2)
											{
											?>
                                                <option <?php if($row["Ma_loai_tour"]==$row2["Ma_loai_tour"]) echo 'selected="selected"';?> value="<?php echo $row2["Ma_loai_tour"];?>"><?php echo $row2["Ten_loai_tour"];?></option>
											<?php
											}
                                            ?>
                                            </select>
                                            
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