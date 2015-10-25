 <!-- chi tiet tour-->
		<?php
		$usernameKH = isset($_SESSION["usernameKH"])?$_SESSION["usernameKH"]:"";
		$tour = utils::getIndex("idtour");
		$arr=array("Ma_tour"=>$tour);
		$result =$obj->selectWithBindParam("SELECT tour.*,diadanh.Ten_dia_danh FROM tour,diadanh_tour, diadanh WHERE tour.Ma_tour=diadanh_tour.Ma_tour AND diadanh_tour.Ma_dia_danh=diadanh.Ma_dia_danh AND tour.Ma_tour=:Ma_tour",$arr);
		if($obj->getRowCount()>0)
		{
			$row = $result[0];
			$gia=$row["Gia"];
		
		?>
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
												 <?php echo $row["Ten_dia_danh"];?>
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
                <hr />
		   </div>


        <!-- end chi tiet tour-->
        <script type="text/javascript">
		function checkdattour(){
			if(document.getElementById('SL_nguoi_lon').value==0){
				alert("Bạn chưa nhập số lượng người lớn.");	
				document.getElementById('SL_nguoi_lon').focus(); 
				return false;   // Chặn form không cho submit
			}
            else{
                var filter = /^[0-9]{1}$/;
               	if (!filter.test(document.getElementById('SL_nguoi_lon').value))
                {
		          alert("Nhập sai số lượng người lớn rùi!");
                  return false;
	            }
            }
            var filter2 = /^[0-5]{1}$/;
            if (!filter2.test(document.getElementById('SL_tre_nho').value))
            {
                alert("Nhập sai số lượng trẻ nhỏ rùi!");
                return false;
            }
            
		}
		
		function TinhTien(v,gia)
		{
			url="module/khachhang/dattour_tt.php?SL_nguoi_lon="+v+"&gia="+gia;
			$('#Tong_tien_').load(url);
		}
		</script>
            <form onsubmit="return checkdattour();" action="" method="POST">
            <table style="margin-left:150px;">
                <tr>
                    <td colspan=2 style="text-align:center; font-weight: bold; color:red;">

                    </td>
                </tr>
                <tr>
                    <td colspan=2>&nbsp;</td>
                </tr>
                <tr>
                    <td>Ngày đặt: </td>
                    <td><input name="Ngay_dat" value="<?php echo date('Y-m-d'); ?>" id="Ngay_dat" type="hidden"><div id="ngaydat"><?php echo date('d-m-Y'); ?></div></td>
                </tr>
                <tr>
                    <td>Số lượng người lớn:</td>
                    <td><input onkeyup="TinhTien(this.value,<?php echo $gia; ?>);" name="SL_nguoi_lon" value="0" id="SL_nguoi_lon" type="text" onclick="if(this.value==0) this.value=''" onblur="if(this.value=='') this.value=0">(Không thể vượt quá 9 người)</td>
                </tr>
                <tr>
                    <td>Số lượng trẻ nhỏ:</td>
                    <td><input name="SL_tre_nho" value="0" id="SL_tre_nho" type="text" onclick="if(this.value==0) this.value=''" onblur="if(this.value=='') this.value=0">(Không thể vượt quá 5 trẻ)</td>
                </tr>
                <tr>
                    <td>Tổng tiền:</td>
                    <td><div id="Tong_tien_" style="color: Red;font-weight: bold;" ></div></td>
                </tr>
                <tr>
                    <td>Ghi chú:</td>
                    <td><input name="Ghi_chu" value="" id="Ghi_chu" type="text"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    	<input name="Tinh_trang" value="Đang chờ" id="Tinh_trang" type="hidden">
                    	<input name="Gia" value="<?php echo $row["Gia"]; ?>" id="Gia" type="hidden">
                    	<input name="Ten_dang_nhap" value="<?php echo $usernameKH; ?>" id="Ten_dang_nhap" type="hidden">
                        <input name="Ma_tour" value="<?php echo $tour; ?>" id="Ma_tour" type="hidden">
                        <input type="submit" value="Đặt tour" name="submit" class="btn_new" style="margin-left:30px;">
                    </td>
                </tr>
            </table>
            </form>
            <?php
			}
			?>
            