<?php
$page = isset($_GET["page"])?$_GET["page"]:1;
$loai = utils::getIndex("idloai");
if($loai=='tn') $title="DU LỊCH TRONG NƯỚC";
if($loai=='nn') $title="DU LỊCH NƯỚC NGOÀI";
else $title="DU LỊCH";
?>
<div class="left_box_content">
                     <div class="left_thanh_tieu_de_content">
                        <div class="left_text_tieu_de"><?php echo $title;?></div>
                     </div>
                     <!---->
                     <?php
					 	$from = ($page-1) * PAGE_SIZE;
						$arr=array("Ma_loai_tour"=>$loai);
						$result =$obj->selectWithBindParam("SELECT tour.* FROM tour,diadanh_tour, diadanh WHERE tour.Ma_tour=diadanh_tour.Ma_tour AND diadanh_tour.Ma_dia_danh=diadanh.Ma_dia_danh AND AnHien=1 AND diadanh.Ma_loai_tour=:Ma_loai_tour GROUP BY `Ma_tour` LIMIT $from,".PAGE_SIZE,$arr);
						$s="";
						$obj->setNumPage("SELECT Count(*) as dem FROM tour,diadanh_tour, diadanh WHERE tour.Ma_tour=diadanh_tour.Ma_tour AND diadanh_tour.Ma_dia_danh=diadanh.Ma_dia_danh AND AnHien=1 AND diadanh.Ma_loai_tour=:Ma_loai_tour",$arr);
						$n=$obj->getNumPage();
						if($n>1)
						{
							for($i=1; $i<=$n; $i++)
							{
								$s .="<a href='index.php?mod=tour&ac=loai&idloai=$loai&page=$i#left_panel'>$i</a>&nbsp;";
							}
						}
					?>
                             <?php
							foreach($result as $row)
								{
								?>
                     <div class="left_box_san_pham">
                        <div class="left_box_san_pham_tieude"><a title="<?php echo $row["Ten_tour"];?>" href="index.php?mod=tour&ac=chitiet&idtour=<?php echo $row["Ma_tour"];?>#left_panel">
                           <?php echo $row["Ten_tour"];?></a>
                        </div>
                        <table class="left_box_san_pham_">
                           <tbody>
                              <tr>
                                 <td>
                                    <div calss="left_box_san_pham_hinhanh">
                                       <a title="<?php echo $row["Ten_tour"];?>" href="index.php?mod=tour&ac=chitiet&idtour=<?php echo $row["Ma_tour"];?>#left_panel">
                                       <img src="<?php echo BASE_URL."image_data/tour/".$row["Hinh_anh"];?>" alt="<?php echo $row["Ten_tour"];?>" style="border: 0; border: 3px solid Gray; padding: 1px;" height="120px" width="170px"></a>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="left_box_san_pham_noidung">
                                       <p>
                                          <b style="font-size: 12px">Thời gian : </b>
                                          <?php $tt->TinhKhoangCach2Ngay($row["Ngay_ket_thuc"],$row["Ngay_bat_dau"]);?>
                                       </p>
                                       <p style="text-align:justify">                                                               
                                          <?php echo $row["Noi_dung"];?>
                                       </p>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table class="left_box_san_pham_tbdat">
                           <tbody>
                              <tr>
                                 <td width="70px">
                                 	<button type="button" onclick="window.location.href='<?php echo BASE_URL; ?>index.php?mod=khachhang&ac=dattour&idtour=<?php echo $row["Ma_tour"];?>';" class="left_box_san_pham_datour">Đặt tour</button>     
                                 </td>
                                 <td width="170px">
                                    <table>
                                       <tbody>
                                          <tr>
                                             <td width="100px">
                                                <p style="text-align:center">                                                         
                                                   <span><?php
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
													?> ghế</span>
                                                </p>
                                                <p>
                                                   <span style="font-size: 11px; font-family:Arial; color:#555; line-height:13px; display:block; text-align:center; ">còn lại </span>
                                                </p>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                                 <td>
                                    <p>
                                       <span style="font-size: 12px">Giá : </span>
                                       <span style="font-size:20px; color:Red; font-weight:700"><?php $tt->DinhDangTien($row["Gia"]);?></span>
                                    </p>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                             <?php
}

?>
                     <!---->
                     <p style="padding: 0; margin-top: 20px; float: right; clear: both; width: 250px">
                        <span style="font-size: 100%; font-weight: bold; float: right; margin-right: 10px">
                        <?php echo $s; //chon trang?>
                        </span>
                     </p>
                  </div>