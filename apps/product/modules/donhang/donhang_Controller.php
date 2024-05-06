<?php

if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}

class donhang_Controller extends Controller {

    public function __construct() { //ham cau truc, vd app la home/ke ben la module
        parent::__construct('product', 'donhang');
       
    }
    public function main() {//dau tien khi url goi home/index thi dau tien no se vo index
        $this->index();//khong bo qua nhieu xu ly vao ham main nay
    }
    public function index() {
        $makh = get_request_var('makh');
        if(!empty($makh)){
            $viewData['products'] = $this->model->getXemDH($makh);  
            $viewData['khachhang'] = $this->model->getXemDHKH($makh);          
            $this->getView()->render('donhang', $viewData);
            
            //khai bao khi goi ham index thi se ra file giao dien nao len      
        }else{
            $this->getView()->render('error404');   
        }     
            
    }
}
?>