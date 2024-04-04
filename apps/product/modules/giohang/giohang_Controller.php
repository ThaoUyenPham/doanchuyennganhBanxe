<?php

if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}

class giohang_Controller extends Controller {

    public function __construct() { //ham cau truc, vd app la home/ke ben la module
        parent::__construct('product', 'giohang');
       
    }
    

    public function main() {//dau tien khi url goi home/index thi dau tien no se vo index
        $this->index();//khong bo qua nhieu xu ly vao ham main nay
    }
    public function index() {
        $viewData['products'] = $this->model->getDanhSachSanPham();
        //$viewData['MaG'] = $this->model->xoaSanpham($maG);           
            $this->getView()->render('giohang', $viewData);
    }
    public function XoaGiohang() {
        $MaG = get_post_var('MaG');
        $result= $this->model->getxoaSanpham($MaG);   
        if(!$result)
            echo 0;
        else
            echo 1;           
    }
    public function CapNhatGiohang() {
        $MaG = get_post_var('MaG');
        $soluong = get_post_var('soluong');
        if($soluong >0){
            echo 1;
        }
        else{
            echo 0;
        }
        return $this->model->getCapNhatSanpham($MaG,$soluong);      
    }
    public function Order(){
        session_start();
        
    }
 
}
?>