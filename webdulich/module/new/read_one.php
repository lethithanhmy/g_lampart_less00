 <?php
$tintuc = utils::getIndex("idtintuc");
$arr=array("Ma_tin_tuc"=>$tintuc);
$result =$obj->selectWithBindParam("SELECT * FROM tintuc WHERE Ma_tin_tuc = :Ma_tin_tuc",$arr);
if($obj->getRowCount()>0)
{
	$row = $result[0];

?>
               <div class="left_box_content">
                  <div class="left_thanh_tieu_de_content">
                      <div class="left_text_tieu_de">TIN TỨC DU LỊCH</div>
                  </div>
                  
                  <div id="noidung" style="margin-top:50px">
                       <div id="tomtac" style="margin-left:20px;">
                          <div style="width: 225px; float: left">
                             <img style="width: 205px; height: 170px; padding:1px; border:solid 1px Gray" src="<?php echo BASE_URL."image_data/tintucdulich/".$row["Hinh_anh"];?>">
                          </div>
                          <div style="float: left; width: 450px">
                             <h1 style="font-size: 20px; font-weight: bold; margin: 5px; text-align:center; color:#F00;">
                                <?php echo $row["Ten_tin_tuc"];?>
                             </h1>
                             <h3 style="font-size: 12px;">
                                <?php echo $row["Noi_dung_tom_tat"];?>
                             </h3>
                             <div id="share_web" style="display: table; margin-top: 10px">
                                <div style="float:left; margin-left:35px">
                                   <div class="book-text">Chia sẻ với bạn bè qua: </div>
                                   <div class="detail-bookmark">
                                      <div class="dell"><a onclick="javascript:window.open('http://www.facebook.com/sharer.php?u='+window.location,'_blank')"><img src="http://static.ak.fbcdn.net/images/share/facebook_share_icon.gif?8:26981" alt=""></a></div>
                                      <div class="dell"><a onclick="javascript:window.open('http://twitter.com/home?status=2&amp;url='+window.location,'_blank')"><img src="images/twitter.gif"></a></div>
                                      <div class="dell"><a onclick="javascript:window.open('http://www.google.com/bookmarks/mark?op=edit&amp;output=popup&amp;bkmk='+window.location,'_blank')"><img src="images/googleicon.jpg"></a></div>
                                      <div class="dell"><a onclick="javascript:window.open('http://bookmarks.yahoo.com/myresults/bookmarklet?u='+window.location,'_blank')"><img src="images/yahoo.gif"></a></div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div id="fulltext" style="width: 685px; clear: both; margin-top: 10px; margin-left: 10px; text-align: justify;">
                    	<?php echo $row["Noi_dung"];?>
                        </div>
                       <div id="tin_khac" style="width: 100%; clear: both; margin-top: 10px">
                          <div style="padding: 5px">
                             <h2 style="font-size: 14px; font-weight: bold; border-bottom: solid 2px #0063AA;; color:#0063AA;">
                                Tin bài liên quan
                             </h2>
                             <ul id="tin_khac_list">
                       <?php
						$result2 =$obj->query("SELECT * FROM `tintuc` WHERE `Ma_tin_tuc` NOT LIKE '$tintuc' LIMIT 0,4");
							foreach($result2 as $row2)
								{
								?>
                                <li><a href="index.php?mod=new&ac=read_one&idtintuc=<?php echo $row2["Ma_tin_tuc"];?>#left_panel"><?php echo $row2["Ten_tin_tuc"];?></a></li>
                             <?php
								}

							?>
                             </ul>
                          </div>
                       </div>
                    </div>
               </div>
               <?php
			   }
			   ?>