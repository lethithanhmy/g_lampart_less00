<?php
$tour = utils::getIndex("idtour");
$arr=array("Ma_tour"=>$tour);
$result =$obj->selectWithBindParam("SELECT tour.*,diadanh.Ten_dia_danh FROM tour,diadanh_tour, diadanh WHERE tour.Ma_tour=diadanh_tour.Ma_tour AND diadanh_tour.Ma_dia_danh=diadanh.Ma_dia_danh AND tour.Ma_tour=:Ma_tour",$arr);
if($obj->getRowCount()>0)
{
	$row = $result[0];
?>
<div class="left_box_content">
   <div class="left_thanh_tieu_de_content">
      <div class="left_text_tieu_de">TOUR DU LỊCH</div>
   </div>
   <div class="left_box_noi_dung">
        <div style="height: auto; margin-top: 5px; margin-bottom: 5px; clear: both; float: left" align="left">
           <table id="" style="border-collapse:collapse;" border="0" cellspacing="0">
              <tbody>
                 <tr>
                    <td colspan="2">
                       <div class="art-article">
                          <div style="width: 210px; float: left; padding-top: 10px; padding-left: 10px">
                              <img alt="<?php echo $row["Ten_tour"];?>" src="<?php echo BASE_URL."image_data/tour/".$row["Hinh_anh"];?>" style="margin-top:15px; margin-left:10px; border: 1px solid Gray; padding: 1px" height="150" width="180" align="left">
                          </div>
                          <div style="width: 30px; float: left">
                          </div>
                          <div style="width: 450px; float: left; padding: 5px; padding-top: 5px">
                             <h3 class="art-postheader" style="margin: 2px; margin-bottom: 5px; color:#06F; text-align:center; font-size:16px;">
                               <?php $tt->DinhDangTieuDe($row["Ten_tour"]);?>
                             </h3>
                             <table style="width: 100%">
                                <tbody>
                                   <tr>
                                      <td style="width: 45%">
                                         <strong>Điểm xuất phát</strong>
                                      </td>
                                      <td>
                                         Tp Hồ Chí Minh
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>
                                         <strong>Điểm đến</strong>
                                      </td>
                                      <td>
                                         <?php
										if($obj->getRowCount()>1)
										{
											foreach($result as $rw)
											{
												echo "&nbsp;<strong>|</strong>&nbsp;".$rw["Ten_dia_danh"];
											}
										}
										else
										  echo $row["Ten_dia_danh"];
										  ?>
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>
                                         <strong>Thời gian</strong>
                                      </td>
                                      <td>
                                         <?php $tt->TinhKhoangCach2Ngay($row["Ngay_ket_thuc"],$row["Ngay_bat_dau"]);?>
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>
                                         <strong>Phương tiện</strong>
                                      </td>
                                      <td>
                                         <?php echo $row["Phuong_tien"];?>
                                   </tr>
                                   <tr>
                                      <td>
                                         <strong>Ngày khởi hành</strong>
                                      </td>
                                      <td>
                                         <b>
                                         <?php echo $tt->DateToDate_Be($row["Ngay_bat_dau"]);?></b>
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>
                                         <strong>Số ghế còn lại</strong>
                                      </td>
                                      <td>
                                         <b><span><?php
										$objsc = new db();
										$sqlsc='SELECT * FROM phieudattour WHERE Ma_tour=:Ma_tour';
										$arrsc=array("Ma_tour"=>$row["Ma_tour"]);
										$resultsc =$objsc->selectWithBindParam($sqlsc,$arrsc);
										$socho = 0;
										
										foreach($resultsc as $rowsc)
										{
											$socho+=$rowsc['SL_nguoi_lon'];
										}
										if($socho>0)
										{
											$conlai=$row["So_cho_toi_da"]-$socho;
											echo $conlai;
										}
										else
										{
											echo $row["So_cho_toi_da"];
										}
										?> ghế</span></b>
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>
                                         <strong>Giá tour</strong>
                                      </td>
                                      <td>
                                         <b style="color: Red">
                                         <?php $tt->DinhDangTien($row["Gia"]);?></b>
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>
                                         <strong>Hot line</strong>
                                      </td>
                                      <td>
                                         <span style="color: #060; font-weight: bold; font-family: Arial; font-size: 14px;">
                                         01886 2222 08
        
                                         </span>
                                      </td>
                                   </tr>

                                </tbody>
                             </table>
                             <div class="clearfix" style="height: 9px">
                             </div>
                          </div>
                       </div>
                    </td>
                 </tr>
              </tbody>
           </table>
        </div>
        <div style="clear: both; width: 90%; height: 40px; float: left">
            <table>
                <tr>
                    <td>
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
                    </td>
                    <td>
                        <button type="button" onclick="window.location.href='<?php echo BASE_URL; ?>index.php?mod=khachhang&ac=dattour&idtour=<?php echo $row["Ma_tour"];?>#left_panel';" class="left_box_san_pham_datour">Đặt tour</button>      
                    </td>
                </tr>
            </table>
        </div>
        <div id="noidunggioithieu">
        	<?php echo $row["Noi_dung2"];?></b>
        </div>
        <!---->
        <div id="tin_khac" style="width: 100%; clear: both; margin-top: 10px">
                          <div style="padding: 5px">
                             <h2 style="font-size: 14px; font-weight: bold; border-bottom: solid 2px #0063AA;; color:#0063AA;">
                                TOUR MỚI
                             </h2>
                             <ul id="tin_khac_list">
                       <?php
						$result2 =$obj->query("SELECT * FROM `tour` WHERE `Ma_tour` NOT LIKE '$tour' ORDER BY `Ma_tour` DESC LIMIT 0,4");
							foreach($result2 as $row2)
								{
								?>
                                <li><a href="index.php?mod=tour&ac=chitiet&idtour=<?php echo $row2["Ma_tour"];?>#left_panel"><?php echo $row2["Ten_tour"];?></a></li>
                             <?php
								}

							?>
                             </ul>
                          </div>
                       </div>
        <!---->
   </div>
</div>
<?php
}
?>
