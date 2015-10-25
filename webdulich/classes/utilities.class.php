<?php
class utilities
{
    static public function kiem_tra_mail($mailCheck) {
        if (!filter_var($mailCheck, FILTER_VALIDATE_EMAIL)) {
            return 'Mail không hợp lệ';
        }

        // Kiểm tra ký tự đặc biệt
        list($TenMail, $domain) = explode('@', $mailCheck);

        if (preg_match('/[#$@!%`^&*()+=\[\]\';,.\/{}|":<>?\\\\~]/', $TenMail)) {
            return 'Tên mail không được chứa ký tự: !#$%^&*() ...';
        }
        return 1;
    }

    static public function kiem_tra_sdt($sdtCheck) {

        if (!preg_match('/^[0-9][0-9]{3,15}$/', $sdtCheck)) {
            return 'Số điện thoại không hợp lệ.';
        }

        return 1;
    }

    static public function kiem_tra_ten($tenCheck) {

        if (preg_match('/[#$@!%`^&*()+=\[\]\';,.\/{}|":<>?\\\\~]/', $tenCheck)) {
            return 'Tên của bạn không được chứa các ký tự như: !#$%^&*() ...';
        }

        return 1;
    }

    static public function kiem_tra_username($username) {

        if (preg_match('/[#$@!%`^&*()+=\[\]\';,.\/{}|":<>?\\\\~\s]/', $username)) {
            return 'Tên đăng nhập không được chứa khoảng trắng và ký tự: !#$%^&*() ...';
        }

        return 1;
    }

 /*?>    static public function kiem_tra_password($password) {
        $thongbao = 'Password phải trên 6 ký tự và có ít nhất: 1 chữ viết HOA, 1 chữ viết thường, 1 số.';

        if (!preg_match('/[0123456789]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || strlen($password)<7) {
            return $thongbao;
        }

        return 1;
    }<?php */
}

?>