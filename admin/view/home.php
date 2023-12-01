<section class="capnhat">
    <div class="capnhat-top">
        <div class="search-big">
            <h2>Thông tin truy cập</h2>
            <div class="search">
            <form action="index.php?pg=searchbrand" method="post">
                <input type="text" name="inpbrand" placeholder="Tìm kiếm">
                <button id='butsearch' name="btnbrand" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>                    
        <hr>
    </div>
    <div class="truycap">
        <div class="visitor">
            <i class="fas fa-users"></i>
            <div class="soluong">
                <h2><?=number_format($souser,0,'.',',')?></h2>
                <p>Khách hàng</p>
            </div>
        </div>
        <div class="visitor" style="background-color:orange">
            <i class="fas fa-eye"></i>
            <div class="soluong">
                <h2>5,200</h2>
                <p>Lượt truy cập</p>
            </div>
        </div>
        <div class="visitor" style="background-color:green">
            <i class="fas fa-shopping-bag"></i>
            <div class="soluong">
                <h2><?=number_format($sodonhang,0,'.',',')?></h2>
                <p>Đơn hàng</p>
            </div>
        </div>
        <div id="doanhthu" class="visitor" style="background-color:blue">
            <i class="fas fa-money-bill-wave"></i>
            <div class="soluong">
                <h2>$<?=number_format($doanhthu,0,'.',',')?></h2>
                <p>Doanh thu</p>
            </div>
        </div>   
    </div>
    <h1 class="title-thongke">Thống kê sản phẩm theo loại hàng</h1>
    <table border="1">
            <thead>
                <th>Stt</th>
                <th>Loại hàng</th>
                <th>Số lượng</th>
                <th>Giá thấp nhất</th>
                <th>Giá cao nhất</th>
                <th>Giá trung bình</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($thongke_product_catalog as $item) {
                        extract($item);
                       
                        $strproduct= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$name.'</td>
                            <td>'.$soluong.'</td>
                            <td>'.number_format($min_price,2,".",",").'</td>
                            <td>'.number_format($max_price,2,".",",").'</td>
                            <td>'.number_format($avg_price,2,".",",").'</td>
                        
                        </tr>';
                        echo $strproduct;
                        $j++;
                    }
                ?>
            </tbody>
        </table>
        <h1 class="title-thongke">Thống kê số lượng bán, doanh thu của từng sản phẩm</h1>
    <table border="1">
            <thead>
                <th>Stt</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng bán</th>
                <th>Giá</th>
                <th>Doanh thu</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($thongke_product_doanhthu as $item) {
                        extract($item);
                       
                        $strproduct= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$name.'</td>
                            <td>'.$soluongban.'</td>
                            <td>'.number_format($price_product_color,2,".",",").'</td>
                            <td>'.number_format($thanhtien,2,".",",").'</td>
                        </tr>';
                        echo $strproduct;
                        $j++;
                    }
                ?>
            </tbody>
        </table>
        <h1 class="title-thongke">Thống kê bình luận từng sản phẩm</h1>
    <table border="1">
            <thead>
                <th>Stt</th>
                <th>Tên sản phẩm</th>
                <th>Số bình luận</th>
                <th>Ngày mới nhất</th>
                <th>Ngày cũ nhất</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($thongke_product_binhluan as $item) {
                        extract($item);
                       
                        $strproduct= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$name.'</td>
                            <td>'.$sobinhluan.'</td>
                            <td>'.$moinhat.'</td>
                            <td>'.$cunhat.'</td>
                        </tr>';
                        echo $strproduct;
                        $j++;
                    }
                ?>
            </tbody>
        </table>
</section>

<script>
    var menu=document.getElementsByClassName('tag');
    for(let i=0;i<menu.length;i++){
        menu[i].style.backgroundColor='#FBF2F2';
    }
    menu[0].style.backgroundColor='white';
</script>
