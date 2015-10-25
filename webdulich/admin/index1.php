<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Back-End</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script src="<?php echo BASE_URL; ?>scripts/jquery-2.1.1.js"></script>
     <script type="text/javascript" src="<?php echo BASE_URL; ?>admin/scripts/ckeditor/ckeditor.js"></script>

      <!--datepicker-->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/jquery-ui.css">
    <script src="<?php echo BASE_URL; ?>scripts/jquery-ui.js"></script>		
    <!--datepicker end-->
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1>Lê Thị Thanh Mỹ - DH51100062</h1>
			<div id="top-navigation">
				Xin chào <strong><?php echo $admin->getUserName();?></strong>
				<span>|</span>
				<a href="<?php echo BASE_URL; ?>admin/index.php?ac=logoutAD">Thoát</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="index.php?mod=phieudattour" <?php if(isset($_GET["mod"])&&$_GET["mod"]=="phieudattour") echo 'class="active"';?>><span>Phiếu Đặt Tour</span></a></li>
			    <li><a href="index.php?mod=tour" <?php if(isset($_GET["mod"])&&$_GET["mod"]=="tour") echo 'class="active"';?>><span>Tour</span></a></li>
			    <li><a href="index.php?mod=diadanh" <?php if(isset($_GET["mod"])&&$_GET["mod"]=="diadanh") echo 'class="active"';?>><span>Địa Danh</span></a></li>
			    <li><a href="index.php?mod=loai" <?php if(isset($_GET["mod"])&&$_GET["mod"]=="loai") echo 'class="active"';?>><span>Loại Tour</span></a></li>
			    <li><a href="index.php?mod=tintuc" <?php if(isset($_GET["mod"])&&$_GET["mod"]=="tintuc") echo 'class="active"';?>><span>Tin Tức</span></a></li>
			    <li><a href="index.php?mod=khachhang" <?php if(isset($_GET["mod"])&&$_GET["mod"]=="khachhang") echo 'class="active"';?>><span>Thông Tin Khách Hàng</span></a></li>
                <li><a href="index.php?mod=kttour" <?php if(isset($_GET["mod"])&&$_GET["mod"]=="kttour") echo 'class="active"';?>><span>Kiểm Tra Tour</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
		<?php
            include ROOT."/admin/mod.php";
        ?>

</div>
<!-- End Container -->	

<!-- Footer -->
<!--<div id="footer">
	<div class="shell">
		<span>Lê Thị Thanh Mỹ - DH51100062</span>
	</div>
</div>-->
<!-- End Footer -->
</body>
</html>