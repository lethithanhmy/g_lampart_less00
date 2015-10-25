<?php
	$page = isset($_GET["page"])?$_GET["page"]:1;
						$from = ($page-1) * PAGE_SIZE_AD;
						$result =$obj->query("SELECT * FROM tour ORDER BY Ma_tour DESC LIMIT $from,".PAGE_SIZE_AD);
						$rowCount= $obj->getRowCount();
						$s="";
						$o=$obj->setNumPage("SELECT Count(*) as dem FROM tour");//tra ve tong so dong cua n trang
						$n=$obj->getNumPage();
						if($n>1)
						{
							for($i=1; $i<=$n; $i++)
							{
								$s .="<a href='index.php?mod=tour&page=$i'>$i</a>";
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
                    <h2 class="left">Tour | <a href="index.php?mod=tour&ac=frm_addedit" style="color:#FFF;">Thêm Tour</a></h2>
                    <div class="right">
                    </div>
                </div>
                <!-- End Box Head -->	

                <!-- Table -->
                <div class="table">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                        	<th>Mã</th>
                            <th width="100px">Tên tour</th>
                            <th>Phương tiện</th>
                            <th width="30px">Số chỗ tối đa</th>
                            <th width="85px">Ngày bắt đầu</th>
                            <th width="85px">Ngày kết thúc</th>
                            <th width="95px">Giá</th>
                            <th>Nơi đến</th>
                            <th width="200px">Nội dung</th>
                            <th width="110px" class="ac">Control</th>
                        </tr>
                        <?php
							foreach($result as $row)
							{
						?>
                        <tr class="odd">
                            <td><?php echo $row["Ma_tour"];?></td>
                            <td><?php echo $row["Ten_tour"];?></td>
                            <td><?php echo $row["Phuong_tien"];?></td>
                            <td><?php echo $row["So_cho_toi_da"];?></td>
                            <td><?php echo $tt->DateToDate_Be($row["Ngay_bat_dau"]);?></td>
                            <td><?php echo $tt->DateToDate_Be($row["Ngay_ket_thuc"]);?></td>
                            <td><?php $tt->DinhDangTien($row["Gia"]);?></td>
                            <td><?php
							$arr=array("Ma_tour"=>$row["Ma_tour"]); 
							$result2 =$obj->selectWithBindParam("SELECT * FROM diadanh_tour,diadanh WHERE diadanh.Ma_dia_danh=diadanh_tour.Ma_dia_danh AND Ma_tour=:Ma_tour",$arr);
							if($obj->getRowCount()>0)
								foreach($result2 as $row2)
								{
									echo $row2['Ten_dia_danh'];
									echo"<br>";
								}
							?></td>
                            <td><?php echo $row["Noi_dung"];?></td>
                            <td><a href="index.php?mod=tour&ac=del&Ma_tour=<?php echo $row["Ma_tour"];?>" class="ico del">Xóa</a><a href="index.php?mod=tour&ac=frm_addedit&Ma_tour=<?php echo $row["Ma_tour"];?>" class="ico edit">Sửa</a></td>
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
