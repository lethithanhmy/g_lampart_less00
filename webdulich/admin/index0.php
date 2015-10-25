<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DU LỊCH BỐN PHƯƠNG</title>
<link href="<?php echo BASE_URL; ?>images/icon_travel.png" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/style.css" />
<script src="<?php echo BASE_URL; ?>scripts/jquery-2.1.1.js"></script>

<style type="text/css">
#wapper_admin {
width: 260px;
margin-right: auto;
margin-left: auto;
margin-top: 10%;
position: relative;
}
</style>
<script>
function checkadminlogin(){
	if(document.alogin.txtUser.value==''){
		alert("Bạn chưa nhập username");	
		document.alogin.txtUser.focus(); //Chọn đối tượng u
		return false;   // Chặn form không cho submit
	}
	if(document.alogin.txtPass.value=='') {
		alert("Bạn chưa nhập password");	
		document.alogin.txtPass.focus();	//Chọn đối tượng p
		return false;	
	}	
	return true; // Cho submit form khi đã kiểm tra xong
}
</script>
</head>
<body>
<div id="wapper_admin">
<div class="right_box">
   <div class="right_icon_tieu_de"><img src="<?php echo BASE_URL; ?>images/icon_ho_tro_truc_tuyen.png" width="41" height="41"></div>
   <div class="right_khung">
      <div class="right_thanh_tieu_de">
         <div class="right_text_tieu_de">Đăng nhập</div>
      </div>
      <div class="right_noi_dung">
         <form onsubmit="return checkadminlogin();" action="" method="POST" id="alogin">
            <table width="225" border="0" align="left" cellpadding="3" cellspacing="0">
               <tbody>
                  <tr>
                     <td colspan="3" style="text-align:center; font-weight: bold; color:red;">
                      <?php 
					 	if(isset($_SESSION['thongbao_loginAD'])){ echo $_SESSION['thongbao_loginAD']; unset($_SESSION['thongbao_loginAD']);} ?>
                     </td>
                  </tr>
                  <tr>
                     <td width="60" style="vertical-align:middle">Tên</td>
                     <td width="2"></td>
                     <td width="137"><input type="text" name="txtUserAD" style="width:130px; height:18px;"></td>
                  </tr>
                  <tr>
                     <td style="vertical-align:middle">Mật khẩu</td>
                     <td>&nbsp;</td>
                     <td><input type="password" name="txtPassAD" style="width:130px; height:18px;"></td>
                  </tr>
                  <tr>
                     <td colspan="3"></td>
                  </tr>
                  <tr>
                     <td colspan="3" align="center">
                        <input type="submit" name="submit" value="Đăng nhập" class="btn_new" style="margin-left:77px;" >
                     </td>
                  </tr>
                  <tr>
                     <td colspan="3" style="text-align:center;">Tên: admin Pass: 123
                     </td>
                  </tr>
               </tbody>
            </table>
         </form>
         <p style="font-size:3px;">&nbsp;</p>
      </div>
   </div>
</div>
</div>
</body>
</html>