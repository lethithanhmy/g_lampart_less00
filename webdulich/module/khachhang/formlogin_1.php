<div class="right_box">
   <div class="right_icon_tieu_de"><img src="images/icon_ho_tro_truc_tuyen.png" width="41" height="41"></div>
   <div class="right_khung">
      <div class="right_thanh_tieu_de">
      <?php $usernameKH = isset($_SESSION["usernameKH"])?$_SESSION["usernameKH"]:"";?>
         <div class="right_text_tieu_de">Chào <?php echo $usernameKH;?>!</div>
      </div>
      <div class="right_noi_dung">
               <table width="225" border="0" align="left" cellpadding="3" cellspacing="0">
                <tr>
                    <td><button type="button" onclick="window.location.href='<?php echo BASE_URL; ?>index.php?mod=khachhang&ac=xemdattour'" class="btn_new" style="margin-left:30px; width:160px;">Xem đặt tour</button></td>
                </tr>
                <tr>
                    <td><button type="button" onclick="window.location.href='<?php echo BASE_URL; ?>index.php?mod=khachhang&ac=logout';" class="btn_new" style="margin-left:30px; width:160px;">Đăng xuất</button></td>
                </tr>
                
              
            </table>
         <p style="font-size:3px;">&nbsp;</p>
      </div>
   </div>
</div>