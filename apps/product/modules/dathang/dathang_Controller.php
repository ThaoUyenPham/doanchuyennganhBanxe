<?php

if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
class dathang_Controller extends Controller {

    public function __construct() { //ham cau truc, vd app la home/ke ben la module
        parent::__construct('product', 'dathang');
       
    }

    public function main() {//dau tien khi url goi home/index thi dau tien no se vo index
        $this->index();//khong bo qua nhieu xu ly vao ham main nay
    }
    public function index() {
        session_start();
        if($_SESSION['dangnhap']['username']){
            $viewData['data'] = $this->model->getKhachhang($_SESSION['dangnhap']['username']);  
            $viewData['cart'] = $this->model->getGiohang();
            if($viewData==null){
                echo "Danh sach rong";
            }
            else{
                $this->getView()->render('dathang', $viewData);
            }           
        }
        else{
            header('Location: /product/dangnhap');
            //redirect lai trang dang nhap
        }   
    }
    public function ThemHoaDon() {
        $MaKH = get_post_var('MaKH');
        $Email = get_post_var('Email');
        $soluongValues = get_post_var('soluongValues');
        $MaSPValues = get_post_var('MaSPValues');
        $TongTien = get_post_var('TongTien');
        $date = date('Y-m-d H:i:s');
        // Chuyển đổi chuỗi thành mảng
        $array = explode(",", $soluongValues);
        $arraymasp = explode(",", $MaSPValues);
    
        // Kiểm tra xem độ dài của hai mảng có bằng nhau không
        if (count($array) != count($arraymasp)) {
            return false;
        }
    
        $results = []; // Tạo một mảng để lưu kết quả
        $kqSP=[];
        // Lặp qua các mảng đồng thời
        for ($i = 0; $i < count($array); $i++) {
            // Lấy số lượng và mã sản phẩm tương ứng
            $soluong = intval($array[$i]);
            //print_r($soluong);
            $MaSP = $arraymasp[$i];

            // Gọi hàm xử lý tạo đơn hàng và lưu kết quả vào mảng
            $result = $this->model->TaoDonHangTTKH($MaSP,$MaKH,$Email, $soluong, $TongTien,$date);
            $results[] = $result;
            $kq1 = $this->model->CapNhatSPVuaDat($MaSP);
            $kqSP[]=$kq1;
           
        }
        return ['results' => $results, 'kqSP' => $kqSP];
        
        //return $results; // Trả về mảng kết quả
    }
    
}
 
?>