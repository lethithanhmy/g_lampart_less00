<script>
function f1()
{
	document.form1.submit();
}
</script>
<?php
	$page = isset($_GET["page"])?$_GET["page"]:1;
	$from = ($page-1) * PAGE_SIZE_AD;
	
	$hienthi=isset($_GET["hienthi"])?$_GET["hienthi"]:"Tất cả";
	if($hienthi=="Đã hủy"||$hienthi=="Đã duyệt"||$hienthi=="Đang chờ")
	{
		$sql='SELECT * FROM phieudattour,khachhang,tour WHERE phieudattour.Ten_dang_nhap=khachhang.Ten_dang_nhap AND phieudattour.Ma_tour=tour.Ma_tour AND Tinh_trang=:Tinh_trang';
		$arr=array("Tinh_trang"=>$hienthi);
		$result =$obj->selectWithBindParam($sql." LIMIT $from, ".PAGE_SIZE_AD,$arr);
		$sql2="SELECT Count(*) as dem FROM phieudattour,khachhang,tour WHERE phieudattour.Ten_dang_nhap=khachhang.Ten_dang_nhap AND phieudattour.Ma_tour=tour.Ma_tour AND Tinh_trang=:Tinh_trang";
	}
	else
	{
		$result =$obj->query("SELECT * FROM phieudattour,khachhang,tour WHERE phieudattour.Ten_dang_nhap=khachhang.Ten_dang_nhap AND phieudattour.Ma_tour=tour.Ma_tour ORDER BY Ma_phieu_dat DESC LIMIT $from,".PAGE_SIZE_AD);
		$sql2="SELECT Count(*) as dem FROM phieudattour,khachhang,tour WHERE phieudattour.Ten_dang_nhap=khachhang.Ten_dang_nhap AND phieudattour.Ma_tour=tour.Ma_tour";
		$arr=null;
	}



	$rowCount= $obj->getRowCount();
	$s="";
	$o=$obj->setNumPage($sql2,$arr);
	$n=$obj->getNumPage(); //tong so trang
	if($n>1)
	{
		for($i=1; $i<=$n; $i++)
		{
			$s .="<a href='index.php?mod=phieudattour&hienthi=$hienthi&page=$i'>$i</a>";
		}
	}
?>
<div class="shell">	
    <br />
    <!-- Main -->
    <div id="main">
        <div class="cl">&nbsp;</div>
        
        <!-- Content -->
        <div id="content">
            
            <!-- Box -->
            <div class="box">
                <!-- Box Head -->
                <div class="box-head">
                    <h2 class="left">Phiếu đặt tour</h2>
                    <div class="right">   
                    <form action="" method="get" name="form1">
                    <input type="hidden" name="mod" value="phieudattour"  />
                    	<label>Hiển thị theo tình trạng:</label>
                    	<select name="hienthi" class="field small-field" onchange="f1()">
                        	<option <?php if($hienthi=="Tất cả") echo 'selected="selected"';?>>Tất cả</option>
                            <option <?php if($hienthi=="Đã hủy") echo 'selected="selected"';?>>Đã hủy</option>
                            <option <?php if($hienthi=="Đã duyệt") echo 'selected="selected"';?>>Đã duyệt</option>
                            <option <?php if($hienthi=="Đang chờ") echo 'selected="selected"';?>>Đang chờ</option>
                        </select>
                    </form>
                    </div>
                </div>
                <!-- End Box Head -->	

                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        	<th>Mã</th>
                            <th>Khách hàng</th>
                            <th>Số ĐT</th>
                            <th width="100px">Tên tour</th>
                            <th>Ngày đặt</th>
                            <th>Người lớn</th>
                            <th>Trẻ nhỏ</th>
                            <th>Tổng tiền</th>
                            <th>Ghi chú</th>
                            <th>Tình trạng</th>
                            <th width="110" class="ac">Control</th>            </tr>
                        <?php
							foreach($result as $row)
							{
						?>
                        <tr class="odd">
								<td><?php echo $row["Ma_phieu_dat"];?></td>
								<td><?php echo $row["Ten_khach_hang"];?></td>
                                <td><?php echo $row["Sdt"];?></td>
								<td><?php echo $row["Ten_tour"];?></td>
								<td><?php echo $row["Ngay_dat"];?></td>
								<td><?php echo $row["SL_nguoi_lon"];?></td>
								<td><?php echo $row["SL_tre_nho"];?></td>
                                <td><?php echo $row["Tong_tien"];?></td>
                                <td><?php echo $row["Ghi_chu"];?></td>
                                <td><?php echo $row["Tinh_trang"];?></td>
								<td>
                                <?php
                                if($row["Tinh_trang"]=="Đang chờ")
                               	{
								?>
									<a href="index.php?mod=phieudattour&ac=duyet&Ma_phieu_dat=<?php echo $row["Ma_phieu_dat"];?>" class="ico edit">Duyệt </a><a href="index.php?mod=phieudattour&ac=huy&Ma_phieu_dat=<?php echo $row["Ma_phieu_dat"];?>" class="ico del">Hủy</a>
                                <?php
								}
								else
									echo "";
								?>
                                </td>
                        </tr>
                        <?php
							}

						?>
                    </table>
                    
                    
                    <!-- Pagging -->
                    <div class="pagging">
                    	<div class="left"><?php echo $rowCount." trên ".$o." dòng"; ?></div>
                        <div class="right">
                            <?php echo $s;?>
                        </div>
                    </div>
                    <!-- End Pagging -->
                    
                </div>
                <!-- Table -->
                
            </div>
            <!-- End Box -->
            

        </div>
        <!-- End Content -->
                    
        <div class="cl">&nbsp;</div>			
    </div>
    <!-- Main -->
</div>
