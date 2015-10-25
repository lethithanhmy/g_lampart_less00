<?php
	$page = isset($_GET["page"])?$_GET["page"]:1;
						$from = ($page-1) * PAGE_SIZE_AD;
						$result =$obj->query("SELECT * FROM khachhang LIMIT $from,".PAGE_SIZE_AD);
						$rowCount= $obj->getRowCount();
						$s="";
						$o=$obj->setNumPage("SELECT Count(*) as dem FROM khachhang");
						$n=$obj->getNumPage();
						if($n>1)
						{
							for($i=1; $i<=$n; $i++)
							{
								$s .="<a href='index.php?mod=khachhang&page=$i'>$i</a>";
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
                    <h2 class="left">Thông Tin Khách Hàng</h2>
                    <div class="right">
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
                            <th>Tình trạng</th>
                            <th width="110px" class="ac">Control</th>
                        </tr>
                        <?php
							foreach($result as $row)
							{
						?>
                        <tr class="odd">
                            <td><?php echo $row["Ten_dang_nhap"];?></td>
                            <td><?php echo $row["Ten_khach_hang"];?></td>
                            <td><?php echo $row["Sdt"];?></td>
                            <td><?php echo $row["Email"];?></td>
                            <td><?php echo $row["Dia_chi"];?></td>
                            <td><?php 
							if($row["Active"]==0)
								echo "Bị chặn";
							else
								echo "&nbsp;";
							?></td>
                            <td>
                            <?php 
							if($row["Active"]==1)
							{
							?>
                            <a href="index.php?mod=khachhang&ac=chan&Ten_dang_nhap=<?php echo $row["Ten_dang_nhap"];?>" class="ico del">Chặn</a>
                            <?php
							}
							if($row["Active"]==0)
							{
							?>
                            <a href="index.php?mod=khachhang&ac=bochan&Ten_dang_nhap=<?php echo $row["Ten_dang_nhap"];?>" class="ico edit">Bỏ chặn</a></td>
                            <?php
							}
							?>
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
