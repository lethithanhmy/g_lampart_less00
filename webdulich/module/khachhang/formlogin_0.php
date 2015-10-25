<script>
function checklogin(){
	if(document.getElementById('txtUser').value==""){
		alert("Bạn chưa nhập username");	
		document.getElementById('txtUser').focus(); 
		return false;   // Chặn form không cho submit
	}
	if(document.getElementById('txtPass').value=="") {
		alert("Bạn chưa nhập password");	
		document.getElementById('txtPass').focus();	
		return false;	
	}	
	return true; // Cho submit form khi đã kiểm tra xong
}
</script>
<div class="right_box">
   <div class="right_icon_tieu_de"><img src="images/icon_ho_tro_truc_tuyen.png" width="41" height="41"></div>
   <div class="right_khung">
      <div class="right_thanh_tieu_de">
         <div class="right_text_tieu_de">Đăng nhập</div>
      </div>
      <div class="right_noi_dung">
         <form onsubmit="return checklogin();" action="index.php" method="POST" id="flogin">
            <table width="225" border="0" align="left" cellpadding="3" cellspacing="0">
               <tbody>
                  <tr>
                     <td colspan="3" style="text-align:center; font-weight: bold; color:red;">
                     <?php 
					 	if(isset($_SESSION['thongbao_login'])){ echo $_SESSION['thongbao_login']; unset($_SESSION['thongbao_login']);} ?>
                     </td>
                  </tr>
                  <tr>
                     <td width="60" style="vertical-align:middle">Tên</td>
                     <td width="2"></td>
                     <td width="137"><input type="text" name="txtUser" id="txtUser" style="width:130px; height:18px;"></td>
                  </tr>
                  <tr>
                     <td style="vertical-align:middle">Mật khẩu</td>
                     <td>&nbsp;</td>
                     <td><input type="password" name="txtPass" id="txtPass" style="width:130px; height:18px;"></td>
                  </tr>
                  <tr>
                     <td colspan="3"></td>
                  </tr>
                  <tr>
                     <td colspan="3">
                        <input type="submit" value="Đăng nhập" class="btn_new" style="margin-left:30px;">
                        <button type="button" onclick="window.location.href='<?php echo BASE_URL; ?>index.php?mod=khachhang&ac=dangky#left_panel';" class="btn_new">Đăng ký</button>
                     </td>
                  </tr>
               </tbody>
            </table>
         </form>
         <p style="font-size:3px;">&nbsp;</p>
      </div>
   </div>
</div>