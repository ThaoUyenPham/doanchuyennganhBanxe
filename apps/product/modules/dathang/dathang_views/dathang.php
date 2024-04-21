<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $context = Context::getContext();
    //luu css va add vao nhu nay, khong goi truc tiep link css hay js tu he thong khac > viec nay tranh viec tan cong tu he thong thu 3 > luu y
    $context->prependStylesheet([
        'public/libs/ionicons/2.0.0/css/ionicons.min' => ['cache' => true],
        'public/libs/font-awesome-4.7.0/css/font-awesome.min' => ['cache' => true],
        'public/libs/bootstrap-3.3.7-dist/css/bootstrap.min' => ['cache' => true],
        'public/css/css' => ['cache' => true],
        'public/css/cssDathang' => ['cache' => true]
    ]);
    echo $context->getEmbedStylesheet();

    $context->prependJavascript([
        'public/libs/bootstrap-3.3.7-dist/js/bootstrap.min' => ['cache' => true],
        'public/libs/jquery/jquery-3.6.min' => ['cache' => true]
    ]);
    echo $context->getEmbedJavascript();
    ?> 
</head>
<body>
<?php $this->template->display('header.php'); ?>
        <div class="Main">
            <h3>THÔNG TIN KHÁCH HÀNG</h3>
            <div class="formMain">
                <div class="col-infor">
                    <div class="table_infor">
                        <div class="infor_page">
                            <form action="">
                                <table style="width:100%; height:100%">
                                    <tbody>
                                        <?php 
                                            if(count($data) > 0){ 
                                                foreach($data as $data){
                                        ?>
                                        
                                        <tr>
                                            <td class="product_infor">Họ tên</td>
                                            <td class="product_text"><input type="text" id="TenKH" value="<?php echo $data['tenkh']?>"></td>                                             
                                        </tr>
                                        <tr>
                                            <td class="product_infor">Địa chỉ</td>
                                            <td class="product_text"><input type="text" id="DiaChi" value="<?php echo $data['Diachi']?>"></td>                                             
                                        </tr>
                                        <tr>
                                            <td class="product_infor">Số điện thoại</td>
                                            <td class="product_text"><input type="text" id="Sodienthoai" value="<?php echo $data['Sodienthoai']?>"></td>                                             
                                        </tr>
                                        <tr>
                                            <td class="product_infor">Email</td>
                                            <td class="product_text"><input type="email" name="to" required id="Email" value="<?php echo $data['username']?>"></td>                                             
                                        </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>   
                            </form>
                        </div>        
                    </div>
                </div>
                <h3>THÔNG TIN ĐƠN HÀNG</h3>
                <form action="" method="post"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="headerTable">Hình ảnh</th>
                                                <th class="headerTable">Sản phẩm</th>
                                                <th class="headerTable">Giá</th>
                                                <th class="headerTable">Số lượng</th>
                                                <th class="headerTable">Tổng cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($cart)>0){ 
                                                // error_reporting (E_ALL ^ E_NOTICE);
                                                            $tong=0; 
                                                            $tongsl=0;
                                                            foreach($cart as $cart){
                                                            
                                                            // var_dump($pro['MaG']);die();
                                                            $tt=$cart['gia']*$cart['soluong'];
                                                            $tong+=$tt;      

                                                            $tsl=$tt/$cart['gia'];       
                                                            $tongsl+= $tsl;            
                                            ?>
                                            <tr>
                                            
                                                <!-- <input type="hidden" id="soluong" value="<?php echo $cart['soluong']; ?>"> -->
                                                <input type="hidden" id="MaG" value="<?php echo $cart['MaG']; ?>">
                                                <input type="hidden" id="Hinh" value="<?php echo $cart['Hinh']; ?>">
                                                <input type="hidden" id="TenSP" value="<?php echo $cart['tenSP']; ?>">
                                                <input type="hidden" id="Gia" value="<?php echo $cart['gia']; ?>">
                                                <!-- <input type="hidden" id="SoLuong" value="<?php echo $cart['soluong']; ?>"> -->
                                                <!-- <input type="hidden" id="TongTien" value="<?php echo $cart['tenSP']; ?>"> -->

                                                <td class="product_thumb" ><img src="<?php echo SITE_ROOT_IMG.$cart['Hinh']?>" alt=""></td>
                                                <td class="product_name" ><?php echo $cart['tenSP']?></td>
                                                <td class="product-price"><?php echo number_format ($cart['gia'],0)?></td>
                                                <td class="product_quantity"><?php echo $cart['soluong']?></td>
                                                <td class="product_total" ><?php echo number_format($cart['gia']*$cart['soluong'],0)?></td>                                              
                                            </tr>
                                            <?php }}?>
                                        </tbody>
                                    </table>   
                                </div>       
                            </div>
                        </div>
                    </div>
                                     
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code">
                                    <h3>TỔNG CỘNG ĐƠN HÀNG</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Tổng mặt hàng</p>
                                            <p class="cart_amount" id="TongTien"><?php echo number_format($tong)?></p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Tổng số lượng hàng</p>
                                            <p class="cart_sl" id="SoLuong"><?php echo number_format($tongsl)?></p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a id="Order" name="giohang" onclick="DatHang()">ĐẶT HÀNG</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>              
        </div> 
</body>
</html>
<script>
    function DatHang(){
        var TenKH = $('#TenKH').val();
        var DiaChi = $('#DiaChi').val();
        var Sodienthoai = $('#Sodienthoai').val();
        var Email = $('#Email').val();
        var Hinh = $('#Hinh').val();
        var Gia = $('#Gia').val();
        var TenSP = $('#TenSP').val();
        var SoLuong = $('#SoLuong').text();
        var TongTien = $('#TongTien').text();
        TongTien = Number(TongTien.replace(/,/g, ""));

            $.ajax('/product/dathang/ThemHoaDon',{   
                type: 'POST',  // http method
                data: { 
                    'TenKH': TenKH,  
                    'DiaChi': DiaChi,  
                    'Sodienthoai': Sodienthoai,  
                    'Email': Email, 
                    'Hinh': Hinh, 
                    'Gia': Gia,  
                    'TenSP': TenSP,  
                    'Sodienthoai': Sodienthoai,  
                    'SoLuong': SoLuong, 
                    'TongTien': TongTien, 
                },  // data to submit
                success: function (data, status, xhr) {
                //    if(data==1){
                //     alert("Đã đặt thành công");
                //     // location.reload();
                //    }
                //     else
                //         alert("đặt không thành công");
                console.log(data);
                console.log(status);
                } 
            
            });
       
    }
</script>