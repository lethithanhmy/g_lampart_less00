<?php
	$result =$obj->query("SELECT * FROM tintuc LIMIT 0,4");
	if($obj->getRowCount()>0)
	{
		$r = $result[0];
	}
?>
<div class="left_box_content">
                     <div class="left_thanh_tieu_de_content">
                        <div class="left_text_tieu_de">TIN TỨC DU LỊCH</div>
                     </div>
                     <div class="content_" style="padding: 0; display: table; width: 100%">
                        <div style="float: left; width: 340px">
                           <div style="display: table-row">
                              <div style="display: table-row; float: left; width: 100%; clear: both">
                                 <a href="index.php?mod=new&ac=read_one&idtintuc=<?php echo $r["Ma_tin_tuc"];?>#left_panel" title="<?php echo $r["Ten_tin_tuc"];?>">
                                 <img alt="<?php echo $r["Ten_tin_tuc"];?>" src="<?php echo BASE_URL."image_data/tintucdulich/".$r["Hinh_anh"];?>" style="margin: 5px; padding: 2px; margin-left: 35px; border: solid 1px Gray;
                                    width: 230px; height: 135px;"></a>
                              </div>
                              <div style="display: table-row; float: left; width: 100%;">
                                 <div style="padding-top:5px; padding-left:5px">
                                    <span class="title_mini" style="text-align: justify; padding: 0; margin: 0">
                                       <h3 class="art-postheader" style="margin: 5px;"><a href="index.php?mod=new&ac=read_one&idtintuc=<?php echo $r["Ma_tin_tuc"];?>#left_panel" title="16 bể bơi tuyệt vời nhất hành tinh">
                                          <?php echo $r["Ten_tin_tuc"];?></a>
                                       </h3>
                                    </span>
                                    <p style="margin-left:5px; text-align: justify;">
                                       <span style="font-size: 12px">
                                       <?php echo $r["Noi_dung_tom_tat"];?></span>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div style="float: right; width: 300px; background: #F2F2F2;">
                           <ul style="list-style: none; padding: 0; margin: 0">
                           <?php
						   		foreach($result as $row)
								{
							?>
                              <li style="list-style-type: none; vertical-align: top text-top; clear: both">
                                 <a href="index.php?mod=new&ac=read_one&idtintuc=<?php echo $row["Ma_tin_tuc"];?>#left_panel" title="<?php echo $row["Ten_tin_tuc"];?>" style="display: block; width: 75px; float: left">
                                 <img alt="<?php echo $row["Ten_tin_tuc"];?>" src="<?php echo BASE_URL."image_data/tintucdulich/".$row["Hinh_anh"];?>" style="margin: 5px; padding: 2px; border: solid 1px Gray; width: 70px; height: 50px;"></a>
                                 <div style="margin-left: 15px; margin-top: 10px; vertical-align: top; display: table;
                                    float: left; width: 200px;">
                                    <a href="index.php?mod=new&ac=read_one&idtintuc=<?php echo $row["Ma_tin_tuc"];?>#left_panel" title="<?php echo $row["Ten_tin_tuc"];?>" style="font-size: 12px; font-weight: bold">
                                    <?php echo $row["Ten_tin_tuc"];?></a>
                                 </div>
                              </li>
            				<?php
								}
							?>
                           </ul>
                        </div>
                     </div>
                     <p style="padding: 0; margin-top: 20px; float: right; clear: both; width: 250px">
                        <span style="font-size: 100%; font-weight: bold; float: right; margin-right: 10px">
                        <img src="images/go-off.gif">
                        <a href="<?php echo BASE_URL; ?>index.php?mod=new&ac=read#left_panel" style="color: #539610; border-bottom: solid 1px #539610">
                        Xem thêm</a> </span>
                     </p>
                  </div>