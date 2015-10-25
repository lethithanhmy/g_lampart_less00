<?php
class thanhvien extends db
{
	public $arrDangKy = array('txtFullName' => '', 'txtUserCus' => '', 'txtPassCus' => '', 'txtPassCus2' => '', 'txtEmailCus' => '', 'txtAddressCus' => '', 'txtPhoneCus' => '');
	public $thongbao_dangky;
	
	function __construct()
	{
		parent::__construct();	
		if(isset($_POST["txtFullName"])) 
		{	$this->arrDangKy['txtFullName']= $_POST["txtFullName"];
		}
		if(isset($_POST["txtUserCus"])) 
		{	$this->arrDangKy['txtUserCus']= $_POST["txtUserCus"];
		}
		if(isset($_POST["txtPassCus"])) 
		{	$this->arrDangKy['txtPassCus']= $_POST["txtPassCus"];
		}
		if(isset($_POST["txtPassCus2"])) 
		{	$this->arrDangKy['txtPassCus2']= $_POST["txtPassCus2"];
		}
		if(isset($_POST["txtEmailCus"])) 
		{	$this->arrDangKy['txtEmailCus']= $_POST["txtEmailCus"];
		}
		if(isset($_POST["txtAddressCus"])) 
		{	$this->arrDangKy['txtAddressCus']= $_POST["txtAddressCus"];
		}
		if(isset($_POST["txtPhoneCus"])) 
		{	$this->arrDangKy['txtPhoneCus']= $_POST["txtPhoneCus"];
		}
	}
	
	public function xu_ly_dang_ky() {
			if ($this->check_dang_ky() === true && $this->kiem_tra_user_ton_tai($this->arrDangKy['txtUserCus']) === true && $this->kiem_tra_email_ton_tai($this->arrDangKy['txtEmailCus']) === true) {
				$this->chap_nhan_dang_ky($this->arrDangKy);
				$this->thongbao_dangky = 'Đăng ký thành công! Bạn hãy đăng nhập để tiếp tục nhé!';
			}
    }
	
	private function check_dang_ky() {
        $checkPOST = array('txtFullName', 'txtUserCus', 'txtPassCus', 'txtPassCus2', 'txtEmailCus', 'txtAddressCus', 'txtPhoneCus');
        // Kiểm tra có POST trả về hay không, array_diff so sánh 2 mảng, trả về mảng các phần tử có giá trị khác
        if (!array_diff($checkPOST, array_keys($_POST))) {

            if ($this->arrDangKy['txtPassCus'] != $this->arrDangKy['txtPassCus2']) {
                    $this->thongbao_dangky = 'Mật khẩu nhập lại không khớp';
                    return false;
            }

            // 
            //$checks = array('txtFullName' => 1, 'txtUserCus' => 1, 'txtPassCus' => 1, 'txtPassCus2' => 1, 'txtEmailCus' => 1, 'txtAddressCus' => 1, 'txtPhoneCus' => 1);
            $checks['txtFullName'] = utilities::kiem_tra_ten($this->arrDangKy['txtFullName']);
            $checks['txtUserCus'] = utilities::kiem_tra_username($this->arrDangKy['txtUserCus']);
            //$checks['txtPassCus'] = utilities::kiem_tra_password($this->arrDangKy['txtPassCus']);
            $checks['txtEmailCus'] = utilities::kiem_tra_mail($this->arrDangKy['txtEmailCus']);
            $checks['txtPhoneCus'] = utilities::kiem_tra_sdt($this->arrDangKy['txtPhoneCus']);

            foreach ($checks as $check=>$check_value) {
                            
                if ($check_value != 1) {
                    $this->thongbao_dangky = $check_value;
                    return false;
                }
            }

            // MD5 mật khẩu
            $this->arrDangKy['txtPassCus'] = md5($this->arrDangKy['txtPassCus']);

            return true;

        } else {
            return false;
        }
    }

    private function kiem_tra_user_ton_tai($username) {
        $result =$this->query("select * from khachhang where Ten_dang_nhap = '".$username."'");
        if ($this->getRowCount() == 0)
            return true;
        else
            $this->thongbao_dangky = 'Tên đăng nhập đã tồn tại';
            return false;
    }
	private function kiem_tra_email_ton_tai($mail) {
        $result =$this->query("select * from khachhang where Email = '".$mail."'");
        if ($this->getRowCount() == 0)
            return true;
        else
            $this->thongbao_dangky = 'Email này đã tồn tại';
            return false;
    }
	
	private function chap_nhan_dang_ky($array)
	{
		$arrObj = array('Ten_dang_nhap'=>$array['txtUserCus'],'Ten_khach_hang'=>$array['txtFullName'],'Mat_khau'=>$array['txtPassCus'],'Sdt'=>$array['txtPhoneCus'],'Email'=>$array['txtEmailCus'],'Dia_chi'=>$array['txtAddressCus']);
		$this->insert("khachhang", $arrObj);
	}
	
}
?>