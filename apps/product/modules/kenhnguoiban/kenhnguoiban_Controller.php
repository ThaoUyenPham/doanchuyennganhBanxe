<?php

if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}

class kenhnguoiban_Controller extends Controller {

    public function __construct() { //ham cau truc, vd app la home/ke ben la module
        parent::__construct('product', 'kenhnguoiban');
       
    }
    

    public function main() {//dau tien khi url goi home/index thi dau tien no se vo index
        $this->index();//khong bo qua nhieu xu ly vao ham main nay
    }
    public function index() {
            $item_per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10; // Giá trị mặc định là 10 nếu không có tham số per_page
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Giá trị mặc định là 1 nếu không có tham số page
            $offet = ($current_page - 1) * $item_per_page;
            $viewData['danhmuc'] =  $this->model->getDanhMuc();  
            
            $viewData['order']=$this->model->getDonHang();

            if($item_per_page!=0){
                $viewData['products'] = $this->model->getDanhSachSanPham($item_per_page, $offet);
                $this->getView()->render('kenhnguoiban', $viewData);
            }
            else{
                echo "Danh sách rỗng";
            }
        
            
    }
    public function getSearchKey() {
        if(isset($_GET['tukhoa'])){
            $tukhoa=$_GET['tukhoa']; 
            $viewData['gender'] = null;
            $viewData['products'] = $this->model->getDanhSachSanPhamTheoTuKhoa($tukhoa);
            
            //var_dump($viewData);die();
            $this->getView()->render('kenhnguoiban', $viewData);           
        }
        else{
            $this->getView()->render('error404'); 
        }
    }
    public function XoaSanpham() {
        $MaSP = get_post_var('MaSP');
        $result= $this->model->getxoaSanpham($MaSP);
        if(!$result)
            echo 0;
        else
            echo 1;
            
    }

    public function ThemSanpham() {
            $TenSP = get_post_var('TenSP');
            $Hinh = get_post_var('Hinh');
            $MaDM = get_post_var('MaDM');
            $SLSP = get_post_var('SLSP');
            $Gia = get_post_var('Gia');
            $split = html_entity_decode(str_replace('C:fakepath', '', $Hinh));
            $img="tttl/img/" .$split;
            $result = $this->model->getThemSanpham($TenSP,$MaDM,$img,$SLSP,$Gia);
    }   
}
?>