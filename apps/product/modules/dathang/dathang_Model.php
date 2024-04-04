<?php
if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}
class dathang_Model extends Model {
    public function getKhachhang(){    
            $query = "select * from ql_banhang.khachhang where username= '".$_SESSION['dangnhap']['username']."'";     
            return $this->qSelect($query);
    }
    public function getGioHang(){    
        $query = "select * from ql_banhang.giohang";     
        return $this->qSelect($query);
}
   
}