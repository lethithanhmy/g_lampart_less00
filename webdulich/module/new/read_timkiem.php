			   		<div class="left_box_content">
                        <div class="left_thanh_tieu_de_content">
                           <div class="left_text_tieu_de">TIN TỨC DU LỊCH</div>
                        </div>
                     <!---->
                     <?php
					 	
						if(isset($_GET['tk_new']))
						{
							//$tk_new = trim($_GET['tk_new']);
							$tk_new = $_GET['tk_new'];
							if(get_magic_quotes_gpc())
							{
								$tk_new=stripcslashes($tk_new);    
							}
							$tk_new=addslashes($tk_new);							
						}
						$result =$obj->query("SELECT * FROM tintuc WHERE Ten_tin_tuc like '%$tk_new%' OR Noi_dung_tom_tat like '%$tk_new%'");

						if($obj->getRowCount()<1)
							echo "Không tìm thấy tour nào!";
						else
							echo "Tìm thấy ".$obj->getRowCount()." tour.";
							foreach($result as $row)
								{
								?>
                        <div id="list_bv" style="width: 100%; clear: both; margin-top: 10px">
                        <!---->
                              <div class="art-post">
                                 <div class="art-post-body">
                                    <div class="art-post-inner">
                                       <div class="art-postcontent">
                                          <!-- article-content -->
                                          <div class="art-article">
                                             <div style="width: 185px; float: left; padding-top: 10px">
                                                <a title="<?php echo $row["Ten_tin_tuc"];?>" class="PostHeader" href="index.php?mod=new&ac=read_one&idtintuc=<?php echo $row["Ma_tin_tuc"];?>#left_panel">
                                                <img alt="<?php echo $row["Ten_tin_tuc"];?>" src="<?php echo BASE_URL."image_data/tintucdulich/".$row["Hinh_anh"];?>" style="margin: 0px; border: 1px solid Gray; padding: 1px" height="120" width="160" align="left"></a>
                                             </div>
                                             <div style="width: 430px; float: left; padding: 5px; padding-top: 5px; padding-left: 10px;">
                                                <h3 class="art-postheader" style="margin: 5px;">
                                                   <a title="<?php echo $row["Ten_tin_tuc"];?>" style="font-size: 14px" href="index.php?mod=new&ac=read_one&idtintuc=<?php echo $row["Ma_tin_tuc"];?>#left_panel">
                                                   <?php echo $row["Ten_tin_tuc"];?></a>
                                                </h3>
                                                <p style="margin: 5px; text-align: justify; clear: both; font-size: 12px">
                                                   <?php echo $row["Noi_dung_tom_tat"];?>
                                                </p>
                                             </div>
                                          </div>
                                          <!-- /article-content -->
                                       </div>
                                       <div class="cleared">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        <!---->
                           </div>
                           
                                                        <?php
}

?>
                    </div>