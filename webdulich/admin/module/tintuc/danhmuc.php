<?php
	$page = isset($_GET["page"])?$_GET["page"]:1;
						$from = ($page-1) * PAGE_SIZE_AD;
						$result =$obj->query("SELECT * FROM tintuc LIMIT $from,".PAGE_SIZE_AD);
						$rowCount= $obj->getRowCount();
						$s="";
						$o=$obj->setNumPage("SELECT Count(*) as dem FROM tintuc");
						$n=$obj->getNumPage();
						if($n>1)
						{
							for($i=1; $i<=$n; $i++)
							{
								$s .="<a href='index.php?mod=tintuc&page=$i'>$i</a>";
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
                    <h2 class="left">Tin Tức | <a href="index.php?mod=tintuc&ac=frm_addedit" style="color:#FFF;">Thêm Tin Tức</a></h2>
                    <div class="right">
                     
                    </div>
                </div>
                <!-- End Box Head -->	

                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Mã tin tức</th>
                            <th>Tên tin tức</th>
                            <th>Hình ảnh</th>
                            <th>Nội dung tóm tắt</th>
                            <th width="110" class="ac">Control</th>
                        </tr>
                        <?php
							foreach($result as $row)
							{
						?>
                        <tr class="odd">
                            <td><?php echo $row["Ma_tin_tuc"];?></td>
                            <td><?php echo $row["Ten_tin_tuc"];?></td>
                            <td><?php echo $row["Hinh_anh"];?></td>
                            <td><?php echo $row["Noi_dung_tom_tat"];?></td>
                            <td><a href="index.php?mod=tintuc&ac=del&Ma_tin_tuc=<?php echo $row["Ma_tin_tuc"];?>" class="ico del">Xóa</a><a href="index.php?mod=tintuc&ac=frm_addedit&Ma_tin_tuc=<?php echo $row["Ma_tin_tuc"];?>" class="ico edit">Sửa</a></td>
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
