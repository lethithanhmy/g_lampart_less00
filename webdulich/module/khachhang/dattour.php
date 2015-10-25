
<div class="left_box_content">
   <div class="left_thanh_tieu_de_content">
      <div class="left_text_tieu_de">ĐẶT TOUR</div>
   </div>
   <div style="clear:both; height:20px;"> 
   </div>
   							
   		<?php
        if(!isset($_SESSION["usernameKH"]))
        {
			echo '<div style="text-align:center; font-weight: bold; color:red; padding-left:20px;">';
			echo "Bạn phải đăng nhập mới có thể đặt tour! Hoặc liên hệ đường dây nóng 190018xx! <br> Xin cám ơn!";
			echo "</div>";
        }
        else
        {
			if(isset($_POST['submit']))
			{
				$dattour = new dattour();
                $dattour->xu_ly_dat_tour();
                echo '<div style="text-align:center; font-weight: bold; color:red; padding-left:20px;">';
                echo $dattour->thongbao_dattour;
                echo "</div>";
    ?>
                <table width="225" border="0" align="left" cellpadding="3" cellspacing="0">
                <tr>
                    <td><button type="button" onclick="window.location.href='<?php echo BASE_URL; ?>index.php'" class="btn_new" style="margin-left:30px; width:160px;">Quay lại trang chủ</button></td>
                </tr>
                
              
            </table>
    <?php
			}
			else
       			include ROOT."/module/khachhang/dattour0.php";

		}
		?>
</div>