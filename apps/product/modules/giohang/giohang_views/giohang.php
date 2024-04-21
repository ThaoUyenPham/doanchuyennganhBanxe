<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <?php
    
    // var_dump($products); die();
    $context = Context::getContext();
    //luu css va add vao nhu nay, khong goi truc tiep link css hay js tu he thong khac > viec nay tranh viec tan cong tu he thong thu 3 > luu y
    $context->prependStylesheet([
        'public/libs/ionicons/2.0.0/css/ionicons.min' => ['cache' => true],
        'public/libs/font-awesome-4.7.0/css/font-awesome.min' => ['cache' => true],
        'public/libs/bootstrap-3.3.7-dist/css/bootstrap.min' => ['cache' => true],
        'public/css/cssHeaderFooter' => ['cache' => true],
        'public/css/cssGioHang' => ['cache' => true]
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
<div class="_trangchu">
<div class="mainLayout">
    <div class="main">
        <div class="content_main">
            <div class="shopping_cart_area">
            <h4>THÔNG TIN GIỎ HÀNG</h4>
            <form action="" method="post"> 
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="headerTable">Hành động</th>
                                                <th class="headerTable">Mã</th>
                                                <th class="headerTable">Hình ảnh</th>
                                                <th class="headerTable">Sản phẩm</th>
                                                <th class="headerTable">Giá</th>
                                                <th class="headerTable">Số lượng</th>
                                                <th class="headerTable">Tổng cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($products)>0){ 
                                                // error_reporting (E_ALL ^ E_NOTICE);
                                                            $tong=0; 
                                                            $tongsl=0;
                                                            foreach($products as $pro){
                                                            
                                                            // var_dump($pro['MaG']);die();
                                                            $tt=$pro['GIA']*$pro['soluong'];
                                                            $tong+=$tt;  
                                                          
                                                            $tsl=$tt/$pro['GIA'];       
                                                            $tongsl+= $tsl;  
                                                               
                                                            
                                            ?>
                                            <tr>
                                            
                                                
                                                <input type="hidden" id="MaG" val="<?php echo $pro['MaG'];?>" value="<?php echo $pro['MaG']; ?>">
                                                

                                                <td class="product_remove"><a id="btn_delete" onclick="deleteSP('<?php echo $pro['MaG'];?>')" ><i class="fa fa-trash-o" style="cursor:hand;"></i></a></td>
                                                <td class="product_id" val="<?php echo $pro['MaG']; ?>"><?php echo $pro['MaG']?></td>
                                                <td class="product_thumb"><a href="#"><img src="<?php echo SITE_ROOT_IMG.$pro['Hinh']?>" alt=""></a></td>
                                                <td class="product_name"><a href="#"><?php echo $pro['tenSP']?></a></td>
                                                <td class="product-price" id="price<?php echo $pro['MaG']?>" val="<?php echo $pro['GIA']?>"><?php echo number_format ($pro['GIA'],0)?></td>
                                                
                                                <td class="product_quantity">
                                                    <input class="product_sl" min="0" max="100" id="soluong<?php echo $pro['MaG']?>" 
                                                    val="<?php echo $pro['soluong'];?>" value="<?php echo $pro['soluong']?>" 
                                                    type="number" onChange="changeQuantity(<?php echo $pro['MaG']; ?>)">
                                                </td>
                                                <td class="product_total" id="total<?php echo $pro['MaG']?>" val="<?php echo $pro['GIA']*$pro['soluong']; ?>"><?php echo number_format($pro['GIA']*$pro['soluong'],0)?></td>
                                               
                                            </tr>
                                            <?php }}?>
                                        </tbody>
                                    </table>   
                                </div>  
                                <div class="checkout_btn">
                                    <a id="btn_update" id="updateSP" onclick="updateSP()" style="cursor: hand;">Cập nhật</a>
                                    <!-- <button id="updateSP">Cap nhat</button> -->
                                </div>      
                            </div>
                        </div>
                    </div>
                                     
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code">
                                    <h3>TỔNG CỘNG GIỎ HÀNG</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Tổng mặt hàng</p>
                                            <p class="cart_amount" val="<?php echo $tong; ?>"><?php echo number_format($tong)?></p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Tổng số lượng hàng</p>
                                            <p class="cart_sl" val="<?php echo $tongsl;?>"><?php echo number_format($tongsl)?></p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a id="Order" name="giohang" onclick="Dathang()" style="cursor: hand;">THANH TOÁN</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->template->display('footer.php'); ?>
</body>
</html>
<script type = "text/javascript">
    // tang chinh so luong + chi phi + tong
    function changeQuantity(MaG){
        var quantity = $('#soluong'+MaG).val();
        // console.log('Quantity '+quantity);

        var cost = $('#price'+MaG).text();
        // console.log('befor cost '+cost);
        // console.log(cost);
        cost = Number(cost.replace(/,/g, ""));
        // console.log('after cost '+cost);
        $("#price"+MaG).attr('val', cost);

        var sum = quantity * cost;
        //var total = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(sum);
        var total = new Intl.NumberFormat('vi-VN').format(sum);
        console.log('total '+total);
        $("#total"+MaG).text(total);
        $("#total"+MaG).attr('val', sum);

        let elements = document.getElementsByClassName("product_total");
        var sumTotal = 0;
        for (let i = 0; i < elements.length; i++) {
            let element = elements[i];
            console.log('element ');
            console.log(element);
            let value = element.getAttribute('val');
            console.log('i: '+i+'; value: '+value);
            value = Number(value.replace(/,/g, ""));
            sumTotal += value;
            console.log('result total '+sumTotal);
           
        }
        $('.cart_amount').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(sumTotal));
        $('.cart_amount').attr('val', sumTotal);

        //phần tổng số lượng
        var sumSL = sum/cost;
        var totalSL = new Intl.NumberFormat('vi-VN').format(sumSL);
        console.log('totalSL '+totalSL);
        $("#soluong"+MaG).text(totalSL);
        $("#soluong"+MaG).attr('val', sumSL);

        let elementss = document.getElementsByClassName("product_sl");
        var sumTotal1 = 0;
        for (let i = 0; i < elementss.length; i++) {
            let element1 = elementss[i];
            console.log('element ');
            console.log(element1);
            let value1 = element1.getAttribute('val');
            console.log('i: '+i+'; value: '+value1);
            value1 = Number(value1.replace(/,/g, ""));
            sumTotal1 += value1;
            console.log('result total '+sumTotal1);
        }
        $('.cart_sl').text((sumTotal1));
        $('.cart_sl').attr('val', sumTotal1);
    }
    //nút xóa
    function deleteSP(MaG){
        //$('#MaG').val(MaG);
            $.ajax('/product/giohang/XoaGiohang',{   
                type: 'POST',  // http method
                data: { 
                    'MaG': MaG,                 
                },  // data to submit
                success: function (data, status, xhr) {
                    if(data==1){
                        alert("Xóa thành công");
                        location.reload();
                    }
                    
                    else
                        alert("Xóa không thành công");
                } 
            
            });
       
    }
    //nút cập nhật
    function updateSP() {
    let soluongElements = document.getElementsByClassName("product_sl");
    let soluongValues = []; // Mảng để lưu trữ nhiều giá trị
    for (let i = 0; i < soluongElements.length; i++) {
        let element = soluongElements[i];
        console.log('element ', element);
        let value = element.getAttribute('val');
        console.log('i: ' + i + '; value: ' + value);
        soluongValues.push(Number(value)); //Chuyển đổi thành số và lưu trữ trong mảng
    }

    let MaGElements = document.getElementsByClassName("product_id");
    let MaGValues = []; // This should also be an array
    for (let i = 0; i < MaGElements.length; i++) {
        let element = MaGElements[i];
        console.log('element ', element);
        let value = element.getAttribute('val');
        console.log('i: ' + i + '; value: ' + value);
        MaGValues.push(value); 
    }

    for (let i = 0; i < soluongValues.length; i++) {
        $.ajax('/product/giohang/CapNhatGiohang', {
            type: 'POST',
            data: {
                'MaG': MaGValues[i],
                'soluong': soluongValues[i],
            },
            success: function (data, status, xhr) {
                //alert("Cập nhật sản phẩm thành công");
                location.reload();

            }
        });
    }
}
$('#Order').click(function(){
        //var makh = $('#makh').val();
       
           // console.log(color);
           $.ajax('/product/giohang/Order',{   
               type: 'POST',  // http method
               data: { 
                   
               },  // data to submit
               success: function (data, status, xhr) {
                if(data==1){                    
                    window.open("<?php echo SITE_ROOT ?>product/dathang","_self"); 
                   }
                else{
                    alert("Vui lòng đăng nhập trước khi thanh toán");   
                    window.open("<?php echo SITE_ROOT ?>product/dangnhap","_self"); 
                   }  
               }
   
           });

    });

</script>