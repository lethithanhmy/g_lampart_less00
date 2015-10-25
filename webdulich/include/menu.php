
<ul class="menu">
   <li><a href="<?php echo BASE_URL; ?>index.php"><span>TRANG CHỦ</span></a>
   </li>
   <li><a href="<?php echo BASE_URL; ?>index.php?mod=info&ac=gioithieu#left_panel"><span>GIỚI THIỆU</span></a>
   </li>
   
<?php
 $result =$obj->select("diadanh", array("Ma_dia_danh", "Ten_dia_danh"), " Ma_loai_tour='tn' ");
?>
   <li>
      <a href="<?php echo BASE_URL; ?>index.php?mod=tour&ac=loai&idloai=tn" class="parent"><span>DU LỊCH TRONG NƯỚC </span></a>
      <div>
         <ul>
         <?php
		foreach($result as $row)
			{
		?>
            <li><a href="<?php echo BASE_URL; ?>index.php?mod=tour&ac=diadanh&iddiadanh=<?php echo $row["Ma_dia_danh"];?>"><span><?php echo $row["Ten_dia_danh"];?></span></a></li>
		<?php
			}
		?>
         </ul>
      </div>
   </li>
   
<?php
 $result =$obj->select("diadanh", array("Ma_dia_danh", "Ten_dia_danh"), " Ma_loai_tour='nn' ");
?>
   <li>
      <a href="<?php echo BASE_URL; ?>index.php?mod=tour&ac=loai&idloai=nn" class="parent"><span>DU LỊCH NƯỚC NGOÀI</span></a>
      <div>
         <ul>
         <?php
		foreach($result as $row)
			{
		?>
            <li><a href="<?php echo BASE_URL; ?>index.php?mod=tour&ac=diadanh&iddiadanh=<?php echo $row["Ma_dia_danh"];?>">
            <span><?php echo $row["Ten_dia_danh"];?></span></a></li>
		<?php
			}
		?>
         </ul>
      </div>
   </li>
   <li><a href="<?php echo BASE_URL; ?>index.php?mod=new&ac=read#left_panel"><span>TIN TỨC DU LỊCH</span></a>
   </li>
   <li class="last"><a href="<?php echo BASE_URL; ?>index.php?mod=info&ac=lienhe#left_panel"><span>LIÊN HỆ </span></a></li>
</ul>