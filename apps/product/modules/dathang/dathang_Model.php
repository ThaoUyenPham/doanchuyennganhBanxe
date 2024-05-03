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
    public function TaoDonHangTTKH($TenKH,$DiaChi,$Sodienthoai,$Email){    
        $query = "insert into ql_banhang.HOADON(TenKH,DiaChi,Sodienthoai,Email) 
        values (N'".$TenKH."',N'".$DiaChi."','".$Sodienthoai."','".$Email."')";
        var_dump($query);die();
        return $this->qInsert($query,true);
    }
    public function TaoDonHangTTSP($soluongValues,$TongTien,$MaSPValues,$kq2){    
        $query = "insert into ql_banhang.CTHD(SoLuong,TongTien,MaSP,MaHD) 
        values (".$soluongValues.",".$TongTien.",'".$MaSPValues."','".$kq2."')";
        var_dump($query);die();
        return $this->qInsert($query);
    }
    public function LaySoLuongDatHang($kq1){    
        $query = "select SoLuong from ql_banhang.hoadon";
        var_dump($query);die();
        return $this->qSelect($query);
    }
    public function XoaSPVuaDat($TenKH,$DiaChi,$Sodienthoai,$Email){    
            $query = "UPDATE ql_banhang.sanpham AS sp
                SET sp.SLSP = sp.SLSP - (
                SELECT SUM(gh.soluong)
                FROM ql_banhang.giohang AS gh
                WHERE gh.maSP = sp.maSP
            )
            WHERE sp.maSP = '17' AND EXISTS (
                SELECT 1
                FROM ql_banhang.giohang AS gh
                WHERE gh.maSP = sp.maSP
            );";
            var_dump($query);die();
            return $this->qInsert($query);
        }
}