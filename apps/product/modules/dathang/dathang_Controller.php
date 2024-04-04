<?php

if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}

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
        // if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
        //     if(sizeof($_SESSION['giohang'])>0){
        //         $viewData['cart'] = $this->model->getGioHang();
        //         $this->getView()->render('dathang', $viewData);
        //     }
            
        // }

    }

    
   }

?>