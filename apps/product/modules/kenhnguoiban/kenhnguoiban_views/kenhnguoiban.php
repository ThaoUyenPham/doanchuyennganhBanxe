<?php
   // session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kênh người bán</title>
    <?php
    $context = Context::getContext();
    //luu css va add vao nhu nay, khong goi truc tiep link css hay js tu he thong khac > viec nay tranh viec tan cong tu he thong thu 3 > luu y
    $context->prependStylesheet([
        'public/libs/ionicons/2.0.0/css/ionicons.min' => ['cache' => true],
        'public/libs/font-awesome-4.7.0/css/font-awesome.min' => ['cache' => true],
        'public/libs/bootstrap-3.3.7-dist/css/bootstrap.min' => ['cache' => true],
        'public/css/css' => ['cache' => true],
        'public/css/cssKenhnguoiban' => ['cache' => true]
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
<div class="mainLayout">
        <div class="container_main">
            <div class="productBox">
                <div class="ProductShow">
                    <div class="menuDung">
                        <ul class="dropdownMenu">
                            <li><a href="">Quản lý sản phẩm</a>
                                <ul class="sub-menu">
                                    <li><a class="tablinks" onclick="OpenTab(event, 'XemSanpham')">Tất cả sản phẩm</a></li>
                                    <li><a class="tablinks" onclick="OpenTab(event, 'QuanlySanpham')">Thêm sản phẩm</a></li>
                                    <li><a class="tablinks" onclick="OpenTab(event, 'QuanlyDonhang')">Quản lý đơn hàng</a></li>
                                </ul>
                            </li>
                        </ul>
                     </div>
                     <div class="content">
                        <form class="Search" action="/product/kenhnguoiban/getSearchKey?" method="GET">
                            <label for="live">Tìm kiếm:</label>
                            <input type="text" name="tukhoa">
                        </form>
                        <div id="XemSanpham" class="TabContentX">
                            <div class="bangContent">
                                <table>                                  
                                    <tr>
                                        <th id="masp">Mã sản phẩm</th>
                                        <th id="img">Hình ảnh</th>
                                        <th id="tensp">Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>    
                                        <th>Hành động</th>                  
                                    </tr>  
                                    <?php if(count($products)>0){ 
                                        foreach($products as $pro){            
                                    ?>
                                    <input type="hidden" id="MaSP" value="<?php echo $pro['MaSP']; ?>">
                                    <tr>
                                        <td><?php echo $pro['MaSP']?></td>
                                        <td><a href="#">
                                                <img src="<?php echo SITE_ROOT_IMG.$pro['img'];?>" alt="">
                                        </a>   
                                        </td>
                                        <td id="tensp"><?php echo $pro['TenSP']?></td>
                                        <td><?php echo number_format($pro['GIA'],0).'đ' ?></td>
                                        <td><?php echo $pro['SLSP']?></td>  
                                        <td>
                                            <a href="" onclick="deletePro('<?php echo $pro['MaSP']?>')">Xóa</a>
                                            <a href="#" onclick="xemChiTiet('<?php echo $pro['MaSP']?>')">Cập nhật</a>
                                        </td>             
                                    </tr>   
                                    <?php }}?>   
                                </table>
                                <ul class="pagination">
                                    <li><a href="<?php echo SITE_ROOT?>product/kenhnguoiban?per_page=4&page=1">1</a></li>
                                    <li><a href="<?php echo SITE_ROOT?>product/kenhnguoiban?per_page=4&page=2">2</a></li>
                                    <li><a href="<?php echo SITE_ROOT?>product/kenhnguoiban?per_page=4&page=3">3</a></li>
                                    <li><a href="<?php echo SITE_ROOT?>product/kenhnguoiban?per_page=4&page=4">4</a></li>
                                    <li><a href="<?php echo SITE_ROOT?>product/kenhnguoiban?per_page=4&page=5">5</a></li>
                                    <li><a href="<?php echo SITE_ROOT?>product/kenhnguoiban?per_page=4&page=6">6</a></li>
                                </ul>
                            </div>       
                        </div>
                        <div id="QuanlySanpham" class="TabContentQL">
                            <div class="bangContent">
                                <div class="rowContent">
                                    <div class="lbltitle">
                                        <label> Hình ảnh</label>
                                    </div>
                                    <div class="lblinput">
                                        <form action="tttl/img/" method="post" enctype="multipart/form-data">
                                            <input type="file" name="Hinh" id="Hinh">
                                        </form>
                                    </div>
                                </div>
                                <div class="rowContent">
                                    <div class="lbltitle">
                                        <label>Tên sản phẩm</label>
                                    </div>
                                    <div class="lblinput">
                                        <input type="text" id="txtname" name="" value="">
                                    </div>
                                </div>
                                <div class="rowContent">
                                    <div class="lbltitle">
                                        <label>Danh mục</label>
                                    </div>
                                    <div class="lblinput">                                        
                                        <div class="inputSize">
                                            <form action="" method="POST">
                                                <select id="MaDM" name="MaDM" > 
                                                    <option value="0">--Hãy chọn danh mục--</option>    
                                                    <?php 
                                                        if(count($danhmuc) > 0){ 
                                                            foreach($danhmuc as $dm){
                                                    ?>                                              
                                                    <option id="MaDM" value="<?php echo $dm['MaDM']?>"><?php echo $dm['TenDM']?></option>                                     
                                                    <?php }}?>
                                                </select>
                                             </form>                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="rowContent">
                                    <div class="lbltitle">
                                        <label>Số lượng</label>
                                    </div>
                                    <div class="lblinput">
                                        <input type="text" id="txtSL" value="">
                                    </div>
                                </div>
           
                                <div class="rowContent">
                                    <div class="lbltitle">
                                        <label>Giá sản phẩm</label>
                                    </div>
                                    <div class="lblinput">
                                        <input type="text" id="txtGia" value="">
                                    </div>
                                </div>
                                <button name="AddProduct" id="AddProduct" onclick="AddProduct()">Thêm sản phẩm</button>
                            </div>
                        </div>
                        <div id="QuanlyDonhang" class="TabContentQL">
                        <div class="bangContentt">
                            <table>                                  
                                <tr>
                                    <th id="donhang">Người nhận</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Tổng cộng</th>
                                    <th>Hành động</th>                  
                                </tr>  
                                    <?php if(count($order)>0){ 
                                        foreach($order as $orders){            
                                    ?>
                                    <input type="hidden" id="MaKH" value="<?php echo $orders['MaKH']; ?>">
                                    <tr>
                                        <!-- <td><?php echo $orders['MaKH']?></td> -->
                                        <td class="order"><?php echo $orders['tenkh']?></td>
                                        <td><?php echo $orders['Ngaydat']?></td>
                                        <td><?php echo number_format($orders['TongTien'],0)?></td>
                                        <td><a href="#" onclick="xemDonHang('<?php echo $orders['MaKH']?>')">Xem chi tiết</a></td>             
                                    </tr>   
                                    <?php }}?>   
                                </table>
                            </div>
                        </div>
                     </div>       
                </div>
            </div>
        </div>
</div>
<script>
    let user=[];
    let currentPage=1
    let perPage=2
    let totalPage=user.length/2
    let perUsesr=[]
    function OpenTab(evt, productName) {
        var i, TabContentX,TabContentQL, tablinks;
        TabContentX = document.getElementsByClassName("TabContentX");
        TabContentQL = document.getElementsByClassName("TabContentQL");
 
        for (i = 0; i < TabContentX.length; i++) {
            TabContentX[i].style.display = "none";
        }
        for (i = 0; i < TabContentQL.length; i++) {
            TabContentQL[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(productName).style.display = "block";
        evt.currentTarget.className += " active";
        }
    function xemChiTiet(MaSP){
        window.open("<?php echo SITE_ROOT ?>product/chinhsuasp?msp="+MaSP, "_top");
    }
    function xemDonHang(MaKH){
        window.open("<?php echo SITE_ROOT ?>product/donhang?makh="+MaKH, "_top");
    }
    function deletePro(MaSP){
        //var maG = $('#MaG').val();
        //$('#MaSP').val(MaSP);
            $.ajax('/product/kenhnguoiban/XoaSanpham',{   
                type: 'POST',  // http method
                data: { 
                    'MaSP': MaSP,                 
                },  // data to submit
                success: function (data, status, xhr) {
                    if(data==1){
                    alert("Đã xóa thành công");
                    location.reload();
                   }
                    else
                        alert("Xóa không thành công");
                }
            });
    }
    function AddProduct(){
        var TenSP = $('#txtname').val();
        var MaDM = $('#MaDM').val();
        var Hinh = $('#Hinh').val();
        var SLSP = $('#txtSL').val();
        var Gia = $('#txtGia').val();
        //Gia = Number(Gia.replace(/,/g, ""));
            $.ajax('/product/kenhnguoiban/ThemSanpham',{   
                type: 'POST',  // http method
                data: { 
                    'TenSP': TenSP,
                    'Hinh': Hinh,
                    'MaDM': MaDM,
                    'SLSP': SLSP,
                    'Gia': Gia,
                },  // data to submit
                success: function (data, status, xhr) {
                    console.log(data);
                    console.status(data);
                    // alert("Thêm sản phẩm thành công");
                }

            });
    }
</script>
<?php $this->template->display('footer.php'); ?>
</body>
</html>