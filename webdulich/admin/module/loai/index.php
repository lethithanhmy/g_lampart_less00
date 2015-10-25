<?php
	$page = isset($_GET["page"])?$_GET["page"]:1;
						$from = ($page-1) * PAGE_SIZE_AD;
						$result =$obj->query("SELECT * FROM loaitour LIMIT $from,".PAGE_SIZE_AD);
						$rowCount= $obj->getRowCount();
						$s="";
						$o=$obj->setNumPage("SELECT Count(*) as dem FROM loaitour");
						$n=$obj->getNumPage();
						if($n>1)
						{
							for($i=1; $i<=$n; $i++)
							{
								$s .="<a href='index.php?mod=loai&page=$i'>$i</a>";
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
                    <h2 class="left">Loại Tour</h2>
                    <div class="right">
                    </div>
                </div>
                <!-- End Box Head -->	

                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Mã loại tour</th>
                            <th>Tên loại tour</th>
                        </tr>
                        <?php
							foreach($result as $row)
							{
						?>
                        <tr class="odd">
                            <td><?php echo $row["Ma_loai_tour"];?></td>
                            <td><?php echo $row["Ten_loai_tour"];?></td>
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
