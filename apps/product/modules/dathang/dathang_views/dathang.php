<style>
    .Main{
        top:80px;
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow-x: hidden;
        padding-left:30px;
        padding-right:30px;
    }
    .col-infor{
        margin-bottom: 25px;
        width: 40%;
        height: 15em;
        border: 2px solid #ddd;
        padding: 20px;
	
    }
    .formMain{
        width: 100%;
        height: 100%;
        position: relative;
        padding:20px;
    }
    .tbKhachhang{
        width: 100%;
    }
    .product_infor{
        width: 30%;
        font-weight: bold;
        font-size: 18px;
    }
    .product_text{
        width:100%;
    }
    .product_text input{
        width: 100%;
    }
</style>
<?php $this->template->display('header.php'); ?>
<?php
// session_start();
    // var_dump($_SESSION);
    
    //lấy thông tin khách hàng từ form đăng nhập
foreach($data as $data){           
    echo '
        <div class="Main">
            <h3>THÔNG TIN KHÁCH HÀNG</h3>
            <div class="formMain">
                <div class="col-infor">
                    <div class="table_infor">
                        <div class="infor_page">
                            <table style="width:100%; height:100%">
                                <tbody>
                                    <tr>
                                        <td class="product_infor">Họ tên</td>
                                        <td class="product_text"><input type="text" value="'.$data['tenkh'].'"></td>                                             
                                    </tr>
                                    <tr>
                                        <td class="product_infor">Địa chỉ</td>
                                        <td class="product_text"><input type="text" value="'.$data['Diachi'].'"></td>                                             
                                    </tr>
                                    <tr>
                                        <td class="product_infor">Số điện thoại</td>
                                        <td class="product_text"><input type="text" value="'.$data['Sodienthoai'].'"></td>                                             
                                    </tr>
                                    <tr>
                                        <td class="product_infor">Email</td>
                                        <td class="product_text"><input type="text" value="'.$data['username'].'"></td>                                             
                                    </tr>
                                </tbody>
                            </table>   
                        </div>        
                    </div>
                </div>
            </div>              
        </div>
    ';
}
    
    //lấy thông tin giỏ hàng từ session + id đơn hàng vừa tạo
foreach($cart as $cart){
    if(count($cart)>0){
        for($i=0;$i<count($cart);$i++){
            echo'
           
                    <table style="width:100%">                   
                           <tr>
                                <td class="product_total">'.$cart['tenSP'].'</td>                           
                            </tr>
                           
                    </table>  
            ';
        }
        
    }
}

    //show confirm đơn hàng

    //unset giỏ hàng session

    //echo "Ban da dat hang thanh cong. Don hang cua ban la";
?>