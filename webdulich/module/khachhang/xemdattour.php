<div class="left_box_content">
   <div class="left_thanh_tieu_de_content">
      <div class="left_text_tieu_de">XEM ĐẶT TOUR</div>
   </div>
   <?php
   $usernameKH = isset($_SESSION["usernameKH"])?$_SESSION["usernameKH"]:"";
   $idpd=isset($_POST['idpd'])?$_POST['idpd']:"";
   if($idpd!="")
   {
      $arr=array('Tinh_trang' => 'Đã hủy');
	  $obj->update("phieudattour",$arr," Ma_phieu_dat=$idpd");
	  echo '<div style="text-align:center; font-weight: bold; color:red; padding-left:20px;">';
	  echo "Đã hủy!";
	  echo "</div><br>";
	  ?>
	  <button type="button" onclick="window.location.href='<?php echo BASE_URL; ?>index.php?mod=khachhang&ac=xemdattour';" class="btn_new">Quay lại</button>
	  <?php
   }
   else
   {
	   ?>
          <table width="100%" border="1">
          <tr align="center" style="color:Red; font-weight:bold;">
            <td style="width: 200px;">Tên Tour</td>
            <td>Ngày đặt</td>
            <td>SL Người Lớn</td>
            <td>SL Trẻ Nhỏ</td>
            <td>Tổng tiền</td>
            <td>Tình trạng</td>
            <td>&nbsp;</td>
          </tr>
       <?php
	   	$arr=array("Ten_dang_nhap"=>$usernameKH);
		$result =$obj->selectWithBindParam("SELECT * FROM phieudattour,tour WHERE phieudattour.Ma_tour = tour.Ma_tour AND Ten_dang_nhap = :Ten_dang_nhap ORDER BY Ngay_dat DESC",$arr);
		foreach($result as $row)
			{
	   ?>
          <tr align="center">
            <td><?php echo $row["Ten_tour"];?></td>
            <td><?php echo $row["Ngay_dat"];?></td>
            <td><?php echo $row["SL_nguoi_lon"];?></td>
            <td><?php echo $row["SL_tre_nho"];?></td>
            <td><?php echo $tt->DinhDangTien($row["Tong_tien"]);?></td>
            <td><?php echo $row["Tinh_trang"];?></td>
            <td>
            <?php if($row["Tinh_trang"]=='Đang chờ'){?>
            <form action="" method="post">
                <input type="hidden" name="idpd" value="<?php echo $row["Ma_phieu_dat"];?>">
                <input type="submit" name="submit" class="btn_new" value="Hủy" />
            </form>
            <?php 
			}
			else
			{
				echo "&nbsp;";
			}?>
            </td>
          </tr>
        
       <?php
		}
		?>
        </table>
        <?php
   }
   ?>
</div>