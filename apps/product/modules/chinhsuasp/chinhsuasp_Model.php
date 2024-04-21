<?php
if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}
class chinhsuasp_Model extends Model {
    public function getChinhSuaSP($msp){
            $query = "select MaSP,dm.MaDM,dm.TenDM,sp.TenSP,sp.img,SLSP,GIA from ql_banhang.sanpham sp, 
            ql_banhang.danhmuc dm where dm.MaDM=sp.MADM and MaSP=".$msp;
        return $this->qSelect($query);
    }
    public function getCapNhatSanpham($MaSP,$TenSP,$MaDM,$SLSP,$GIA){
        $query = " update ql_banhang.sanpham set TenSP='".$TenSP."',MaDM='".$MaDM."',SLSP=".$SLSP."
        ,GIA=".$GIA." where MaSP='".$MaSP."'";
        //var_dump($query);die(); 
        return $this->qUpdate($query);
    }
}