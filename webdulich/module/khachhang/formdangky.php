<script>
function checkdangky(){
	if(document.getElementById('txtFullName').value==""){
		alert("Bạn chưa nhập tên họ");	
		document.getElementById('txtFullName').focus(); 
		return false;   // Chặn form không cho submit
	}
	if(document.getElementById('txtUserCus').value=="") {
		alert("Bạn chưa nhập tên đăng nhập");	
		document.getElementById('txtUserCus').focus();	
		return false;	
	}
	if(document.getElementById('txtPassCus').value=="") {
		alert("Bạn chưa nhập password");	
		document.getElementById('txtPassCus').focus();	
		return false;	
	}
	if(document.getElementById('txtPassCus2').value=="") {
		alert("Bạn chưa xác nhận lại password");	
		document.getElementById('txtPassCus2').focus();	
		return false;	
	}
	if(document.getElementById('txtEmail').value=="") {
		alert("Bạn chưa nhập Email");	
		document.getElementById('txtEmail').focus();	
		return false;	
	}
			if(document.getElementById('txtAddress').value=="") {
		alert("Bạn chưa nhập địa chỉ");	
		document.getElementById('txtAddress').focus();	
		return false;	
	}
	if(document.getElementById('txtPhone').value=="") {
		alert("Bạn chưa nhập số điện thoại");	
		document.getElementById('txtPhone').focus();	
		return false;	
	}
	return true; // Cho submit form khi đã kiểm tra xong
}
</script>

<div class="left_box_content">
   <div class="left_thanh_tieu_de_content">
      <div class="left_text_tieu_de">ĐĂNG KÝ THÀNH VIÊN</div>
   </div>
   <div style="clear:both; height:20px;"> 
   </div>
		<?php

        if(isset($_POST['submit']))
        {
			
			$thanhvien = new thanhvien();
            
            $thanhvien->xu_ly_dang_ky();
			echo '<div style="text-align:center; font-weight: bold; color:red; padding-left:20px;">';
			echo $thanhvien->thongbao_dangky;
			echo "</div>";
			
			?>
            <br />
            <?php
            if($thanhvien->thongbao_dangky=="Đăng ký thành công! Bạn hãy đăng nhập để tiếp tục nhé!")
			{
			?>
            <button type="button" onclick="window.location.href='<?php echo BASE_URL; ?>index.php';" class="btn_new">Quay lại</button>
            <?php
			}
			else
			{
			?>
            <button type="button" onclick="window.history.go(-1);" class="btn_new">Quay lại</button>
            <?php
			}
        }
        else
        {

        ?>
        
				<form onsubmit="return checkdangky();" action="" method="POST">
				<table style="margin-left:150px;">
					<tr>
						<td colspan=2 style="text-align:center; font-weight: bold; color:red;">
						</td>
					</tr>
					<tr>
						<td colspan=2>&nbsp;</td>
					</tr>
					<tr>
						<td>Tên họ của bạn:</td>
						<td><input name="txtFullName" value="" id="txtFullName" class="input-dangky" type="text" ></td>
					</tr>
					<tr>
						<td>Tên đăng nhập:</td>
						<td><input name="txtUserCus" value="" id="txtUserCus" class="input-dangky" type="text" ></td>
					</tr>
					<tr>
						<td>Mật khẩu</td>
						<td><input name="txtPassCus" id="txtPassCus" class="input-dangky" type="password"></td>
					</tr>
					<tr>
						<td>Nhập lại:</td>
						<td><input name="txtPassCus2" id="txtPassCus2" class="input-dangky" type="password" ></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input name="txtEmailCus" value="" id="txtEmail" class="input-dangky" type="text" ></td>
					</tr>
					<tr>
						<td>Địa chỉ:</td>
						<td><input name="txtAddressCus" value="" id="txtAddress" class="input-dangky" type="text" ></td>
					</tr>
					<tr>
						<td>Số điện thoại:</td>
						<td><input name="txtPhoneCus" value="" id="txtPhone" class="input-dangky" type="text" ></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="Đăng ký" name="submit" class="btn_new" style="margin-left:30px;">
						</td>
					</tr>
				</table>
				</form>
                <?php
		}
		?>
            </div>