 <?php
	$result =$obj->select("diadanh", array("Ma_dia_danh", "Ten_dia_danh"), " Ma_loai_tour='nn' ");
?>
<div class="right_box">
   <div class="right_icon_tieu_de"><img src="images/icon1.png" width="41" height="41"></div>
   <div class="right_khung">
      <div class="right_thanh_tieu_de">
         <div class="right_text_tieu_de">Du lịch nước ngoài</div>
      </div>
      <div class="right_noi_dung">
         <ul>
         <?php
			foreach($result as $row)
			{
		?>
            <li><a href="<?php echo BASE_URL; ?>index.php?mod=tour&ac=diadanh&iddiadanh=<?php echo $row["Ma_dia_danh"];?>"><?php echo $row["Ten_dia_danh"];?></a></li>
         <?php
			}
		?>
         </ul>
      </div>
   </div>
</div>