<?php
 $result =$obj->select("diadanh", array("Ma_dia_danh", "Ten_dia_danh"), " Ma_loai_tour='tn' ");
?>

<script>
function showNoiDen(str) {

    if (str == "") {
        document.getElementById("noiden").innerHTML = "";
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
                document.getElementById("noiden").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","\include\\shownoiden.php?noiden="+str,true);
        xmlhttp.send();
    }
}

$(document).ready(function() {
	$("#datepicker2").datepicker({ dateFormat: "dd-mm-yy" });
	$("#datepicker2").change(function(){
		$("#datepicker").val($("#datepicker2").val());
	})
	$("#datepicker2").mouseup(function(){
		$("#datepicker").val('');
		$("#datepicker2").val('');	
	})
});

</script>
<div class="right_box">
<div class="right_icon_tieu_de"><img src="images/13e1a1d6.png" width="41" height="41"></div>
<div class="right_khung">
   <div class="right_thanh_tieu_de">
      <div class="right_text_tieu_de">Tìm kiếm tour</div>
   </div>
   <div class="right_noi_dung" style="height:160px;">
      <div style="color:#09F;">Chào bạn! Bạn muốn du lịch ở đâu:</div>
      <form name="formtk" id="formtk" action="" method="get" style="margin-top:3px;">
      	<input type="hidden" name="mod" value="tour" />
        <input type="hidden" name="ac" value="timkiem" />
         <table	  width="225" border="0" align="left" cellpadding="3" cellspacing="0">
				<tr>
				   <td colspan="2" align="center"><input class="radloai" name="radloai" type="radio" checked="checked" value="tn" onclick="showNoiDen(this.value)"/>Du lịch trong nước</td>
				</tr>
				<tr>
				   <td colspan="2" align="center"><input class="radloai" name="radloai" type="radio" value="nn" onclick="showNoiDen(this.value)"/>Du lịch nước ngoài</td>
				</tr>
				<tr id="noiden">
				   <td>Nơi đến:</td>
				   <td >
					  <select name="noiden">
						<?php
							foreach($result as $row)
								{
							?>
							<option value="<?php echo $row["Ma_dia_danh"];?>"><?php echo $row["Ten_dia_danh"]; ?></option>
							<?php
								}
							?>					
					  </select>
				   </td>
				</tr>
            <tr>
               <td>Ngày đi:</td>
               <td><input type="button" id="datepicker2" name="datepicker2" style="width: 120px;background-color:white;" ><input type="hidden" id="datepicker" name="datepicker" > </td>
            </tr>
            <tr>
               <td colspan="2" align="center"><input name="timkiem" type="submit" value="Tìm Kiếm" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>