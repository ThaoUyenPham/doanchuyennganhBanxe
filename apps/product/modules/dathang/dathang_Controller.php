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
        $TenKH = get_post_var('TenKH');
        $DiaChi = get_post_var('DiaChi');
        $Sodienthoai = get_post_var('Sodienthoai');
        $Email = get_post_var('Email');
        $Hinh = get_post_var('Hinh');
        $Gia = get_post_var('Gia');
        $TenSP = get_post_var('TenSP');
        $SoLuong = get_post_var('SoLuong');
        $TongTien = get_post_var('TongTien');

        $mail = new PHPMailer(true);
       try{
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
            $mail->SMTPAuth = true; // Bật xác thực SMTP
            $mail->Username = USERNAME; // Tài khoản email
            $mail->Password = PASSWORD; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
            $mail->SMTPSecure = 'ssl'; // Mã hóa SSL
            $mail->Port = 465; // Cổng kết nối SMTP là 465

          //check validate email address
            if($mail->validateAddress($Email)){
            echo 'email nguoi nhan: '.$Email.'<br>';
            $mail->setFrom(SEND_FROM,SEND_FROM_NAME);
            $mail->addAddress($Email, $TenKH);
            //content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Here is the subject'; // Tiêu đề
            $mail->Body = 'This is the HTML message body in bold!'; // Nội dung

            $result = $mail->Send();
            //var_dump($result);
            if(!$result) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
        }else{
            echo 'email is not valid';
        }
      }
      catch(Exception $e){
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
        // $result = $this->model->TaoDonHang($TenKH,$DiaChi,$Sodienthoai,$Email,$Hinh,$Gia,$TenSP,$SoLuong,$TongTien); 
        
            
        //return $this->model->TaoDonHang($TenKH,$DiaChi,$Sodienthoai,$Email);
    }
    
   }
 
?>