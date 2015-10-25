<script>
function fht()
{
	document.formht.submit();
}
</script>
<?php
$s="";
$tong=0;
$Ma_tour=isset($_GET['Ma_tour'])?$_GET['Ma_tour']:"1";
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
                    <h2 class="left">Báo Cáo</h2>
                    <div class="right">
                    <form action="" method="get" name="formht">
                    <input type="hidden" name="mod" value="kttour">
                    <table>
                    <tr>
                    <td><label>Tên tour</label></td>
                    <td><select name="Ma_tour" class="field small-field" onchange="fht()">
                    <?php
                    $result2 =$obj->query("SELECT * FROM tour");
                    foreach($result2 as $row2)
                    {
                    ?>
                        <option <?php if($Ma_tour==$row2["Ma_tour"]) echo 'selected="selected"';?> value="<?php echo $row2["Ma_tour"];?>"><?php echo $row2["Ten_tour"];?></option>
                    <?php
                    }
                    ?>
                    </select></td>
                    </tr>
                    </table>
                    </form>
                    </div>
                </div>
                <!-- End Box Head -->	

                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        	
                            <th>Tên đăng nhập</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số vé</th>
                            <th>Mã phiếu đặt</th>
                        </tr>
                        <?php
						
						if($Ma_tour!="")
						{
								$page = isset($_GET["page"])?$_GET["page"]:1;
								$from = ($page-1) * PAGE_SIZE_AD;
								$result =$obj->query("SELECT * FROM khachhang,phieudattour WHERE khachhang.Ten_dang_nhap=phieudattour.Ten_dang_nhap AND Ma_tour=$Ma_tour LIMIT $from,".PAGE_SIZE_AD);
								$obj->setNumPage("SELECT Count(*) as dem FROM khachhang");
								$n=$obj->getNumPage();
								if($n>1)
								{
									for($i=1; $i<=$n; $i++)
									{
										$s .="<a href='index.php?mod=kttour&page=$i'>$i</a>";
									}
								}
							foreach($result as $row)
							{
						?>
                        <tr class="odd">
                            <td><?php echo $row["Ten_dang_nhap"];?></td>
                            <td><?php echo $row["Ten_khach_hang"];?></td>
                            <td><?php echo $row["Sdt"];?></td>
                            <td><?php echo $row["Email"];?></td>
                            <td><?php echo $row["Dia_chi"];?></td>
                            <td><?php echo $row["SL_nguoi_lon"]; $tong+=$row["SL_nguoi_lon"];?></td>
                            <td><?php echo $row["Ma_phieu_dat"];?></td>
                        </tr>
                        <?php
							}
						?>
                        <tr>
                        <td colspan="4">&nbsp;</td>
                        <td>Tổng vé:</td>
						<td><?php echo $tong;?></td>
                        <td>&nbsp;</td>
                        </tr>
                        <?php
						}
						?>
                    </table>
                    
                    
                    <!-- Pagging -->
                    <div class="pagging">
                    	<div class="left"></div>
                        <div class="right"><?php echo $s;?></div>
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
