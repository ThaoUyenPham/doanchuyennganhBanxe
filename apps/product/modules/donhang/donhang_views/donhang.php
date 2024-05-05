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
                                        <?php if(count($products)>0){  ?>                                       
                                            <tr>
                                                <td class="product_remove"><a id="btn_delete"><i class="fa fa-trash-o" style="cursor:hand;"></i></a></td>
                                                <td class="product_id"></td>
                                                <td class="product_thumb"><a href="#"><img src="" alt=""></a></td>
                                                <td class="product_name"><a href="#"></a></td>
                                                <td class="product-price" id="price" ></td>
                                                
                                                <td class="product_quantity">
                                                    <input class="product_sl" min="0" max="100" id="soluong" 
                                                   value="" 
                                                    type="number" onChange="changeQuantity()">
                                                </td>
                                                <td class="product_total" id="total"></td>                                             
                                            </tr>
                                        <?php }?>
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
                </form> 
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->template->display('footer.php'); ?>
</body>
</html>