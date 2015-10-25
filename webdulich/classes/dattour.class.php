<?php
class dattour extends db
{
	public $arrDatTour = array('Ngay_dat' => '', 'SL_nguoi_lon' => '', 'SL_tre_nho' => '', 'Tong_tien' => '', 'Ghi_chu' => '', 'Tinh_trang' => '', 'Ten_dang_nhap' => '','Ma_tour' => '');
	public $thongbao_dattour;
	
	function __construct()
	{
		parent::__construct();

		if(isset($_POST["Ngay_dat"])) 
		{	$this->arrDatTour['Ngay_dat']= $_POST["Ngay_dat"];
		}
		if(isset($_POST["SL_nguoi_lon"])) 
		{	$this->arrDatTour['SL_nguoi_lon']= $_POST["SL_nguoi_lon"];
            if(isset($_POST["Gia"])) 
            {	$this->arrDatTour['Tong_tien']= ($_POST["Gia"]*$_POST["SL_nguoi_lon"]);
            }
		}
		if(isset($_POST["SL_tre_nho"])) 
		{	$this->arrDatTour['SL_tre_nho']= $_POST["SL_tre_nho"];
		}
		//Tong_tien

		if(isset($_POST["Ghi_chu"])) 
		{	$this->arrDatTour['Ghi_chu']= $_POST["Ghi_chu"];
		}
		if(isset($_POST["Tinh_trang"])) 
		{	$this->arrDatTour['Tinh_trang']= $_POST["Tinh_trang"];
		}
		if(isset($_POST["Ten_dang_nhap"])) 
		{	$this->arrDatTour['Ten_dang_nhap']= $_POST["Ten_dang_nhap"];
		}
		if(isset($_POST["Ma_tour"])) 
		{	$this->arrDatTour['Ma_tour']= $_POST["Ma_tour"];
		}
	}
	
	public function xu_ly_dat_tour() {
			if ($this->check_dat_tour() === true) {
				$this->chap_nhan_dat_tour($this->arrDatTour);
				$this->thongbao_dattour = 'Đặt tour thành công! Công ty sẽ liên lạc với bạn trong thời gian sớm nhất! <br> Xin cám ơn!!!';
			}
    }
	
	private function check_dat_tour() {
            return true;
    }

	private function chap_nhan_dat_tour($array)
	{
		$arrObj = array('Ngay_dat' =>$array['Ngay_dat'], 'SL_nguoi_lon' =>$array['SL_nguoi_lon'], 'SL_tre_nho' =>$array['SL_tre_nho'], 'Tong_tien' =>$array['Tong_tien'], 'Ghi_chu' =>$array['Ghi_chu'], 'Tinh_trang' =>$array['Tinh_trang'], 'Ten_dang_nhap' =>$array['Ten_dang_nhap'],'Ma_tour' =>$array['Ma_tour']);
		$this->insert("phieudattour", $arrObj);
	}
	
}
?>