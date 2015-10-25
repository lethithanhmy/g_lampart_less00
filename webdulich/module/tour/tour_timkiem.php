<?php
$page = isset($_GET["page"])?$_GET["page"]:1; //phan trang
$from = ($page-1) * PAGE_SIZE; //phan trang
$aa = utils::getIndex("datepicker");
$iddiadanh=utils::getIndex("noiden");
if($aa!=null){
$ngaybatdau=$tt->DateToDate_Be($aa);
$sql = 'SELECT tour.*,diadanh.Ten_dia_danh FROM tour,diadanh_tour, diadanh WHERE tour.Ma_tour=diadanh_tour.Ma_tour AND diadanh_tour.Ma_dia_danh=diadanh.Ma_dia_danh AND AnHien=1 AND tour.Ngay_bat_dau=:Ngay_bat_dau and diadanh.Ma_dia_danh=:Ma_dia_danh';
$sql2 = 'SELECT Count(*) as dem FROM tour,diadanh_tour, diadanh WHERE tour.Ma_tour=diadanh_tour.Ma_tour AND diadanh_tour.Ma_dia_danh=diadanh.Ma_dia_danh AND AnHien=1 AND tour.Ngay_bat_dau=:Ngay_bat_dau and diadanh.Ma_dia_danh=:Ma_dia_danh';
$link = "datepicker=$aa&noiden=$iddiadanh";
$arr=array("Ngay_bat_dau"=>$ngaybatdau,"Ma_dia_danh"=>$iddiadanh);
$result =$obj->selectWithBindParam($sql." LIMIT $from, ".PAGE_SIZE,$arr);
}
else
{
    $sql = 'SELECT tour.*,diadanh.Ten_dia_danh FROM tour,diadanh_tour, diadanh WHERE tour.Ma_tour=diadanh_tour.Ma_tour AND diadanh_tour.Ma_dia_danh=diadanh.Ma_dia_danh AND AnHien=1 AND diadanh.Ma_dia_danh= :Ma_dia_danh ';
    $sql2='SELECT Count(*) as dem FROM tour,diadanh_tour, diadanh WHERE tour.Ma_tour=diadanh_tour.Ma_tour AND diadanh_tour.Ma_dia_danh=diadanh.Ma_dia_danh AND AnHien=1 AND diadanh.Ma_dia_danh= :Ma_dia_danh';
    $link = "noiden=$iddiadanh";
    $arr=array("Ma_dia_danh"=>$iddiadanh);
    $result =$obj->selectWithBindParam($sql." LIMIT $from, ".PAGE_SIZE,$arr);
}
$rowCount= $obj->getRowCount(); //so dong dang hien thi
$s="";
$o=$obj->setNumPage($sql2,$arr); //tra ve tong so dong tim thay 
$n=$obj->getNumPage(); //tra ve tong so trang
if($n>1)
{
	for($i=1; $i<=$n; $i++)
	{
		$s .="<a href='index.php?mod=tour&ac=timkiem&$link&page=$i#left_panel'>$i</a>&nbsp;";
	}
}
?>

<div class="left_box_content">
                     <div class="left_thanh_tieu_de_content">
                        <div class="left_text_tieu_de">TOUR DU LỊCH</div>
                     </div>
                     <!---->
                    <div class="tongtim" style="font-weight:bold; margin-left:10px;">
                    <?php
                    if($obj->getRowCount()<1)
                        echo "Không tìm thấy tour nào!";
					else
						echo "Tìm thấy ".$o." tour. Hiện thị ".$rowCount." trên ".$o." kết quả";
                    ?>
                    </div>
                     <!---->

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