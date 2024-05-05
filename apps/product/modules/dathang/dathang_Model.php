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

    public function TaoDonHangTTKH($MaSP,$MaKH,$Email,$soluong,$TongTien,$date){       
        $query = "insert into ql_banhang.HOADON(MaSP,MaKH,Email,SoLuong,TongTien,Ngaydat) 
        values ('".$MaSP."','".$MaKH."','".$Email."',".$soluong.",".$TongTien.",'".$date."')";
        // var_dump($query);die();
        return $this->qInsert($query);
    }
    public function CapNhatSPVuaDat($MaSP){    
        $query = "update ql_banhang.sanpham AS sp 
        SET sp.SLSP = sp.SLSP - (SELECT SUM(hd.SoLuong) 
                                 FROM ql_banhang.hoadon AS hd 
                                 WHERE hd.MaSP = sp.MaSP)
        WHERE sp.MaSP = '".$MaSP."'";
        // var_dump($query);die();
            return $this->qUpdate($query);
        }
}