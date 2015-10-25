<script>
function showDiaDanh(str) {
	if (str == "") {
		document.getElementById("diadanh").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState==4 && xmlhttp.status == 200) {
				alert("Bạn chưa nhập tên tour");
				document.getElementById("diadanh").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","module/tour/showdiadanh.php?loai="+str,true);
		xmlhttp.send();
	}
}
function checktour(){
	if(document.getElementById('Ten_tour').value==""){
		alert("Bạn chưa nhập tên tour");	
		document.getElementById('Ten_tour').focus(); 
		return false;   // Chặn form không cho submit
	}
	if(document.getElementById('Phuong_tien').value==""){
		alert("Bạn chưa nhập phương tiện");	
		document.getElementById('Phuong_tien').focus(); 
		return false;   // Chặn form không cho submit
	}
	if(document.getElementById('Gia').value<=0){
		alert("Bạn chưa nhập giá hoặc nhập sai");	
		document.getElementById('Gia').focus(); 
		return false;   // Chặn form không cho submit
	}
	else{
		var filter = /^\d*(\.\d+)?$/;
		if (!filter.test(document.getElementById('Gia').value))
		{
		  alert("Nhập sai giá!");
		  return false;
		}
	}

	if(document.getElementById('So_cho_toi_da').value<=0){
		alert("Bạn chưa nhập số chỗ tối đa hoặc nhập sai");	
		document.getElementById('So_cho_toi_da').focus(); 
		return false;   // Chặn form không cho submit
	}
	else{
		var filter = /^[0-9]{2}$/;
		if (!filter.test(document.getElementById('So_cho_toi_da').value))
		{
		  alert("Nhập sai số chỗ tối đa!");
		  return false;
		}
	}
	
	var now = new Date(); 
	var ngaybd = new Date(document.getElementById('Ngay_bat_dau').value);
	var ngaykt = new Date(document.getElementById('Ngay_ket_thuc').value);
	if(document.getElementById('Ngay_bat_dau').value==""){
		alert("Bạn chưa chọn ngày bắt đầu");	
		return false;   // Chặn form không cho submit
	}
	else if(document.getElementById('Ngay_ket_thuc').value==""){
		alert("Bạn chưa chọn ngày kết thúc");	
		return false;   // Chặn form không cho submit
	}
	else if((ngaybd.getDay() - now.getDay())<0)
	{
		alert("Ngày bắt đầu phải lớn hơn hoặc bằng ngày hiện tại");	
		return false;   // Chặn form không cho submit
	}
	else if((ngaykt.getDay() - ngaybd.getDay())<0)
	{
		alert("Ngày kết thúc phải lớn hoặc bằng ngày bắt đầu");	
		return false;   // Chặn form không cho submit
	}
	return true; // Cho submit form khi đã kiểm tra xong
}

$(document).ready(function() {
	$("#Ngay_ket_thuc1").datepicker({ dateFormat: "yy-mm-dd" });
	$("#Ngay_ket_thuc1").change(function(){
		$("#Ngay_ket_thuc").val($("#Ngay_ket_thuc1").val());
	})
	$("#Ngay_ket_thuc1").mouseup(function(){
		$("#Ngay_ket_thuc").val('');
		$("#Ngay_ket_thuc1").val('');	
	})
	
	
	$("#Ngay_bat_dau1").datepicker({ dateFormat: "yy-mm-dd" });
	$("#Ngay_bat_dau1").change(function(){
		$("#Ngay_bat_dau").val($("#Ngay_bat_dau1").val());
	})
	$("#Ngay_bat_dau1").mouseup(function(){
		$("#Ngay_bat_dau").val('');
		$("#Ngay_bat_dau1").val('');	
	})
});
</script>
<?php
	$ma = utils::getIndex("Ma_tour"); 
	$rows =$obj->query("select * from tour where Ma_tour='$ma' ");
	
	if ($obj->getRowCount()>0)
	{ 
		$ac="save_edit";
		$row = $rows[0];
	}
	else 
	{ 
		$ac ="save_new";
		$row= array(); 
		$row["Ma_tour"]="";
		$row["Ten_tour"]="";
		$row["Phuong_tien"]="";
		$row["Ngay_bat_dau"]="";
		$row["Ngay_ket_thuc"]="";
		$row["Gia"]=0;
		$row["Noi_dung"]="";
		$row["Hinh_anh"]="";
		$row["Noi_dung2"]="";
		$row["So_cho_toi_da"]=0;
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
										echo "Sửa Tour";
									else
										echo "Thêm Tour";	
								?>
                                </h2>
                            </div>
                            <!-- End Box Head -->
                            
                            <form onsubmit="return checktour();" action="index.php?mod=tour" method="post" enctype="multipart/form-data" id="frmedit">
                                <input type="hidden" name="ac" value="<?php echo $ac;?>" />
                                <!-- Form -->
                                <div class="form">
                                <?php
									if ($ac=="save_edit")
									{
								?>
                                        <p>
                                
                                            <label>Mã tour</label>
                                            <input id="Ma_tour" type="hidden" class="field size1" name="Ma_tour" value="<?php echo $row["Ma_tour"];?>" />
                                            <span><?php echo $row["Ma_tour"];?><span>
                                        </p>
                                <?php
									}
								?>
                                        <p>

                                            <label>Tên tour</label>
                                            <input id="Ten_tour" type="text" class="field size1" name="Ten_tour" value="<?php echo $row["Ten_tour"];?>" />
                                        </p>
                                        <p>
                                
                                            <label>Phương tiện</label>
                                            <input type="text" class="field size1" id="Phuong_tien" name="Phuong_tien" value="<?php echo $row["Phuong_tien"];?>" />
                                        </p>
                                        <p>
                                
                                            <label>Ngày bắt đầu</label>
                                            <input type="button" id="Ngay_bat_dau1" style="width: 120px;background-color:white;" ><input type="hidden" id="Ngay_bat_dau" name="Ngay_bat_dau" value="<?php echo $row["Ngay_bat_dau"];?>" >
                                        </p>
                                        <p>
                                
                                            <label>Ngày kết thúc</label>
                                            <input type="button" id="Ngay_ket_thuc1" style="width: 120px;background-color:white;" ><input type="hidden" id="Ngay_ket_thuc" name="Ngay_ket_thuc" value="<?php echo $row["Ngay_ket_thuc"];?>" > 
                                        </p>
                                        <p>
                                
                                            <label>Giá</label>
                                            <input type="text" class="field size1" id="Gia" name="Gia" value="<?php echo $row["Gia"];?>" onclick="if(this.value==0) this.value=''" onblur="if(this.value=='') this.value=0"/>
                                        </p>
                                        <p>

                                            <label>Nội dung tóm tắt</label>
                                            <textarea class="field size1" id="Noi_dung" name="Noi_dung"  rows="10" cols="30" style="height: 70px;" ><?php echo $row["Noi_dung"];?></textarea>
                                        </p>
                                        <p>

                                            <label>Hình ảnh</label>
                                            <input type="file" class="field size1" name="Hinh_anh" />
                                        </p>	                               			<p>
                                        <?php
										if ($row["Hinh_anh"] !="") 
											{
										?>
                                        <img src="<?php echo BASE_URL."image_data/tour/". $row["Hinh_anh"];?>" style="width:100px;" />
										<?php
                                        }
                                        ?>
                                        </p>
	
                                        <p>

                                            <label>Nội dung</label>
                                            <textarea class="field size1" name="Noi_dung2" id="Noi_dung2" rows="10" cols="80"><?php echo $row["Noi_dung2"];?></textarea>
                                         <script>
											// Replace the <textarea id="editor1"> with a CKEditor
											// instance, using default configuration.
											CKEDITOR.replace( 'Noi_dung2' );
										</script>
                                        </p>
                                        <p>
                                            <label>Số chỗ tối đa</label>
                                            <input type="text" class="field size1" id="So_cho_toi_da" name="So_cho_toi_da" value="<?php echo $row["So_cho_toi_da"];?>" onclick="if(this.value==0) this.value=''" onblur="if(this.value=='') this.value=0"/>
                                        </p>
                                        <!-- dia danh-->
                                        <p>
                                       <?php
									   	$obj_dd = new db();
										$result_dd =$obj_dd->select("diadanh", array("Ma_dia_danh", "Ten_dia_danh"), " Ma_loai_tour='tn' ");
										?>
                                        <label>Địa danh</label>
                                             <table	border="0" cellpadding="0" cellspacing="5">
                                                    <tr>
                                                       <td align="center"><input class="radloai" name="radloai" type="radio" checked="checked" value="tn" onclick="showDiaDanh(this.value)"/>Du lịch trong nước</td>
                                                    </tr>
                                                    <tr>
                                                       <td align="center"><input class="radloai" name="radloai" type="radio" value="nn" onclick="showDiaDanh(this.value)"/>Du lịch nước ngoài</td>
                                                    </tr>
                                                    <tr id="diadanh">
                                                       <td>
                                                       <?php
														foreach($result_dd as $row_dd)
															{
																?>
																<input name="dds[]" type="checkbox" value="<?php echo $row_dd["Ma_dia_danh"];?>" /><?php echo $row_dd["Ten_dia_danh"];?><br />
																<?php
															}
														?>		
                                                       
                                                       </td>
                                                    </tr>
                                              </table>
                                        </p>
                                        <!-- dia danh-->
                                    
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