<?php
define("EXE", 1);

include "config/config.php";
include ROOT."/config/ini.php";

$obj = new db();
$tt = new tinhtoan();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>DU LỊCH BỐN PHƯƠNG</title>
      <link href="<?php echo BASE_URL; ?>images/icon_travel.png" rel="shortcut icon" />
      <link rel="stylesheet" type="text/css" href="css/style.css" />	  
	  <script src="<?php echo BASE_URL; ?>scripts/jquery-2.1.1.js"></script>
      <!--backtop-->
      <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/back_top.css">
      <script src='<?php echo BASE_URL; ?>scripts/jquery.min.js' type='text/javascript'></script>
      <script src="<?php echo BASE_URL; ?>scripts/backtop.js"></script>
      <!--backtop-->
      <!--menu ngang-->
      <link type="text/css" href="<?php echo BASE_URL; ?>css/menu.css" rel="stylesheet" />
      <script type="text/javascript" src="<?php echo BASE_URL; ?>scripts/menu_jquery.js"></script>
      <script type="text/javascript" src="<?php echo BASE_URL; ?>scripts/menu.js"></script>
      <!--menu ngang end-->

      <!--slider start -->
      <link rel="stylesheet" type="text/css" href="/css/slider_image.css">
      <script src="<?php echo BASE_URL; ?>scripts/slider_image.js"></script>
      <!--slider end -->
	  
	  <!--datepicker-->
		<link rel="stylesheet" href="css/jquery-ui.css">
		<script src="<?php echo BASE_URL; ?>scripts/jquery-ui.js"></script>		
		<!--datepicker end-->
        
   </head>
   <body>
      <div id='bttop'>VỀ ĐẦU TRANG</div>
      <div id="wapper">
	  	  <a href="http://lethithanhmy.com"><h1 style="font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; text-align:center; color: #FFF;"> Website: http://lethithanhmy.com</h1></a>
         <div id="main">
            <!-- Start banner -->
            <a href="<?php echo BASE_URL; ?>index.php" target="_self">
            	<div id="banner"></div>
             </a>
            <!-- End banner -->
            <!-- Start menu_ngang -->
            <div id="menu">
               <?php
                  include ROOT."/include/menu.php";
                ?>
            </div>
            <!-- End menu_ngang -->
            <!-- start slide_show-->
            <div id="slide_show">
               <?php
                  include ROOT."/include/slide_show.php";
                  ?>
            </div>
            <!-- End slide_show -->
            <div id="content">
               <div id="left_panel">
					<?php
						include ROOT."/mod.php";
					?>
               </div>
               <!--right_panel-->
               <div id="right_panel">
                  <?php
                     include ROOT."/include/right_box1.php";
                     include ROOT."/include/right_box2.php";
					 include ROOT."/include/right_box3.php";
					 include ROOT."/include/right_box4.php";
                     ?>
               </div>
            </div>
         </div>
         <!-- End content -->
         <div id="footer">
            <div id="footer_content">
               <a href="http://lethithanhmy.com"><h1 style="font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; text-align:center; color: #FFF;"> Website: http://lethithanhmy.com</h1></a>
               <p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:center;">Lê Thị Thanh Mỹ<br />
                  Điện thoại: 01886 2222 08<br />
                  Email: lethithanhmy25@gmail.com
				  
               </p>
            </div>
         </div>
         <!-- End footer -->
      </div>
      </div>
   </body>
</html>