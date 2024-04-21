<?php
if (!defined('SERVER_ROOT')) {
    exit('No direct script access allowed');
}
class kenhnguoiban_Model extends Model {
    public function getDanhSachSanPhamTheoTuKhoa($tukhoa){
        $query = "select * from ql_banhang.sanpham where TenSP 
        like '%".$tukhoa."%' order by MaSP asc"; 
        //echo $query; die();
        return $this->qSelect($query);
    }
    public function getDanhMuc(){
        $query = "select * from ql_banhang.danhmuc"; 
        return $this->qSelect($query);
    }
    public function getDanhSachSanPham($item_per_page,$offet){
            $query = "select MaSP,img,SLSP,TenSP,GIA,MADM from ql_banhang.sanpham
            order by MaSP asc limit ".$item_per_page." offset ".$offet."";
        return $this->qSelect($query);
    }

    public function getxoaSanpham($MaSP){
        $query = "delete from ql_banhang.sanpham where MaSP = '".$MaSP."'";
       // var_dump($query);die();
        return $this->qDelete($query);
    }

    public function getThemSanpham($TenSP,$MaDM,$img,$SLSP,$Gia){
        $query = "insert into ql_banhang.sanpham(TenSP,MaDM,img,SLSP,GIA) values (N'".$TenSP."','".$MaDM."','".$img."',".$SLSP.",".$Gia.")";
        //var_dump($query);die();
        return $this->qInsert($query, true);
    }
    
    public function getCapnhatSP($MaG,$soluong){
        $query="update ql_banhang.giohang1 set soluong='".$soluong."' where MaG='".$MaG."'";
        //var_dump($query);die();
        return $this->qUpdate($query);
    }
    // public function getSPGiohang($MaG){
    //     $query = "";
    //     //var_dump($query);
    //     return $this->qDelete($query);
    //     //$abc= $this->qDelete($query);
    //     //var_dump($abc);
    //     //die();
        
    // }
}