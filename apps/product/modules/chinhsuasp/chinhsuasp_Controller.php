<?php

if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}

class chinhsuasp_Controller extends Controller {

    public function __construct() { //ham cau truc, vd app la home/ke ben la module
        parent::__construct('product', 'chinhsuasp');
       
    }
    

    public function main() {//dau tien khi url goi home/index thi dau tien no se vo index
        $this->index();//khong bo qua nhieu xu ly vao ham main nay
    }
    public function index() {
         $msp = get_request_var('msp');
        if(!empty($msp)){
            $viewData['products'] = $this->model->getChinhSuaSP($msp);          
            $viewData['maSP'] = $msp; 
            $this->getView()->render('chinhsuasp', $viewData);
            
            //khai bao khi goi ham index thi se ra file giao dien nao len      
        }else{
            $this->getView()->render('error404');   
        }
    }
    public function CapnhatSP(){
        $MaSP = get_post_var('MaSP');
        $TenSP = get_post_var('TenSP');
        $MaDM = get_post_var('MaDM');
        $SLSP = get_post_var('SLSP');  
        $GIA = get_post_var('GIA');
        $result = $this->model->getCapNhatSanpham($MaSP,$TenSP,$MaDM,$SLSP,$GIA); 
        if($result==null)
            echo 0;
        else
            echo 1;
    }
}
?>