<?php
if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}
class donhang_Model extends Model {
    public function getXemDH($makh){
            $query = "select sp.img,sp.TenSP,Email,SoLuong,TongTien,kh.Sodienthoai,kh.tenkh,kh.Diachi from ql_banhang.hoadon as hd,ql_banhang.sanpham as sp,ql_banhang.khachhang as kh 
            where hd.MaSP=sp.MaSP and kh.MaKH=hd.MaKH and kh.MaKH='".$makh."'";
        return $this->qSelect($query);
    }
}