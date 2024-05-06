<?php
if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}
class donhang_Model extends Model {
    public function getXemDH($makh){
        $query = "select distinct sp.img,sp.TenSP,GIA,sp.Gia,Email,SoLuong,TongTien 
        from ql_banhang.hoadon as hd,ql_banhang.sanpham as sp,ql_banhang.khachhang as kh 
        where hd.MaSP=sp.MaSP and kh.MaKH=hd.MaKH and kh.MaKH='".$makh."'";
    return $this->qSelect($query);
}
    public function getXemDHKH($makh){
        $query = "select kh.Sodienthoai,hd.MaHD,kh.tenkh,kh.Diachi,Ngaydat,Email
        from ql_banhang.hoadon as hd,ql_banhang.sanpham as sp,ql_banhang.khachhang as kh 
        where hd.MaSP=sp.MaSP and kh.MaKH=hd.MaKH and kh.MaKH='".$makh."' GROUP BY Email;";
    return $this->qSelect($query);
    }
}