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
        'public/css/cssDonHang' => ['cache' => true]
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
            <h4 style="text-align: center">THÔNG TIN ĐƠN HÀNG</h4>
                <form action="" method="post"> 
                    <div class="row">
                        <div class="table-desc">
                            <div class="dateOrders">
                            <?php
                                if(count($khachhang)>0){ 
                                    foreach($khachhang as $kh){                                            
                            ?>
                                <p>Mã đơn hàng:<?php echo $kh['MaHD']?></p>
                                <p>Tên người nhận: <?php echo $kh['tenkh']?></p>
                                <p>Địa chỉ: <?php echo $kh['Diachi']?></p>
                                <p>Số điện thoại: <?php echo $kh['Sodienthoai']?></p>
                                <p>Email: <?php echo $kh['Email']?></p>
                                <p>Ngày đặt hàng: <?php echo $kh['Ngaydat']?></p>
                            <?php }}?>
                            </div>
                            <div class="cart_page table-responsive">
                                <table style="width:100%">
                                    <thead>
                                        <tr style="height: 30px;background: #dfd9d9;">
                                            <th class="headerTable" style="width:40em;">Hình</th>
                                            <th class="headerTable">Số lượng</th>
                                            <th class="headerTable">Giá</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                        if(count($products)>0){ 
                                            foreach($products as $pro){                                            
                                        ?>
                                    <tr>
                                        <td><img src="<?php echo SITE_ROOT_IMG.$pro['img']?>" alt="">
                                            <span><p><?php echo $pro['TenSP']?></p></span>
                                        </td>
                                        <td><?php echo $pro['SoLuong']?></td>
                                        <td><?php echo number_format ($pro['GIA'],0)?></td>       
                                    </tr>
                                    <?php }}?>
                                    <tr>
                                        <td style="font-weight: bold;">Tổng tiền</td>
                                        <td></td>
                                        <td><?php echo number_format ($pro['TongTien'],0)?></td>
                                    </tr>
                                    
                                </tbody>
                                </table>   
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