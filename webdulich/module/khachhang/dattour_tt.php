<?php
 include "../../config/config.php";
 include "../../config/ini.php";
 $tt = new tinhtoan();
 $sl = isset($_GET['SL_nguoi_lon'])?$_GET['SL_nguoi_lon']:"";
 $gia = isset($_GET['gia'])?$_GET['gia']:"";
 echo $tt->DinhDangTien($sl*$gia);
?>