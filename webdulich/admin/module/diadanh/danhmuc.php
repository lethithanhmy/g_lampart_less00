<?php
	$page = isset($_GET["page"])?$_GET["page"]:1;
						$from = ($page-1) * PAGE_SIZE_AD;
						$result =$obj->query("SELECT * FROM diadanh LIMIT $from,".PAGE_SIZE_AD);
						$rowCount= $obj->getRowCount();
						$s="";
						$o=$obj->setNumPage("SELECT Count(*) as dem FROM diadanh");
						$n=$obj->getNumPage();
						if($n>1)
						{
							for($i=1; $i<=$n; $i++)
							{
								$s .="<a href='index.php?mod=diadanh&page=$i'>$i</a>";
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
                    <h2 class="left">Ðịa Danh  | <a href="index.php?mod=diadanh&ac=frm_addedit" style="color:#FFF;">Thêm Địa Danh</a></h2>
                </div>
                <!-- End Box Head -->	

                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Mã địa danh</th>
                            <th>Tên địa danh</th>
                            <th>Tên loại tour</th>
                            <th width="110" class="ac">Control</th>
                        </tr>
                        <?php
							foreach($result as $row)
							{
						?>
                        <tr class="odd">
                            <td><?php echo $row["Ma_dia_danh"];?></td>
                            <td><?php echo $row["Ten_dia_danh"];?></td>
                            <td><?php if($row["Ma_loai_tour"]=="tn") echo "Tour trong nước"; else echo "Tour nước ngoài";?></td>
                            <td><a href="index.php?mod=diadanh&ac=del&Ma_dia_danh=<?php echo $row["Ma_dia_danh"];?>" class="ico del">Xóa</a><a href="index.php?mod=diadanh&ac=frm_addedit&Ma_dia_danh=<?php echo $row["Ma_dia_danh"];?>" class="ico edit">Sửa</a></td>
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
