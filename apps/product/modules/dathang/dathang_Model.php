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
    public function TaoDonHang($TenKH,$DiaChi,$Sodienthoai,$Email,$Hinh,$Gia,$TenSP,$SoLuong,$TongTien){    
        $query = "insert into ql_banhang.HOADON(TenKH,DiaChi,Sodienthoai,Email,Hinh,Gia,TenSP,SoLuong,TongTien) 
        values (N'".$TenKH."',N'".$DiaChi."','".$Sodienthoai."','".$Email."',N'".$Hinh."',".$Gia.",
        N'".$TenSP."',".$SoLuong.",".$TongTien.")";
        var_dump($query);die();
        return $this->qInsert($query);
    }
    // public function TaoDonHang($TenKH,$DiaChi,$Sodienthoai,$Email){    
    //         $query = "insert into ql_banhang.HOADON(TenKH,DiaChi,Sodienthoai,Email) 
    //         values (N'".$TenKH."',N'".$DiaChi."',N'".$Sodienthoai."',N'".$Email."')";
    //         var_dump($query);die();
    //         return $this->qInsert($query);
    //     }
}