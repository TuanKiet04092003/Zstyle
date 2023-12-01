<?php
    if(isset($soluong) && $soluong>0){
        echo $soluong;
    }
    
?>
<div class="container">
    <div class="title">
        <h1>Giỏ hàng</h1>
        <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
        <img class="title-right" src="view/layout/Image/Product2.png" alt="">
    </div>
    <div class="layout-cart">
        <article>
            <?php
                if(isset($_SESSION['giohang'])){
                    if(count($_SESSION['giohang'])>0){
                        echo '<section class="save-money">
                            <i class="fas fa-dollar-sign"></i>
                            <div class="save-money-text">
                                <h1>Giá tiền hợp lý</h1>
                                <p>Sản phẩm xứng đáng với giá tiền bạn đã bỏ ra</p>
                            </div>
                        </section>';
                    }
                }
            ?>
            <section class="cart-products">
                <?php
                    $j=0;
                    if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){
                        if(count($_SESSION['giohang'])>0){
                            $strbillcart='<aside class="tomtat">
                                            <h1>Mã giảm giá</h1>
                                            <form class="discount" action="index.php?pg=cart" method="post">
                                                <input name="magiamgia" type="text" placeholder="Nhập mã">
                                                <button type="submit" name="btngiamgia">Áp dụng</button>
                                            </form>
                                            <div class="fee-cart">';
                            $tong=0;
                            foreach ($_SESSION['giohang'] as $item) {
                                extract($item);
                                $hinh=PATH_IMG.$img;
                                    if(is_file($hinh)){
                                        $img='<img src="'.$hinh.'">';
                                    }else{
                                        $img='';
                                    }
                                $tong+=$soluong*$price;
                                $strbillcart.='<h1>'.$name.' X 0<span>'.$soluong.'</span></h1>
                                <h1><span>$'.number_format($price*$soluong,2,".",",").'</span></h1>';
                                $strproduct='';
                                $strproduct= '<div class="cart-product">
                                '.$img.'
                                <div class="info-cart-product">
                                    <h1>'.$name.'</h1>
                                    <p>Mã sản phẩm: 0000'.$id.'</p>
                                    <div class="rating">';
                                    for($i=1;$i<=$rate;$i++){
                                        $strproduct.='<i style="color:orange" class="fa fa-star star1"></i>';
                                    }
                                    for($i=$rate;$i<5;$i++){
                                        $strproduct.='<i style="color:black" class="fa fa-star star1"></i>';
                                    }
                                    $strproduct.='</div>
                                </div>
                                <div class="control-cart">
                                    <h1>Giá: <span>$'.number_format($price,2,".",",").'</span></h1>
                                    <h1>Thành tiền: <span class="thanhtien">$'.number_format($soluong*$price,2,".",",").'</span></h1>
                                    <div class="icon-cart">
                                        <input class="index" type="hidden" value="'.$j.'">
                                        <input class="price" type="hidden" value="'.$price.'">
                                        <i class="fas fa-minus tru"></i>
                                        <h1 class="quantity">'.$soluong.'</h1>
                                        <i class="fas fa-plus cong"></i>
                                        <a href="index.php?pg=cart&id='.$j.'"><i class="trash far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </div>';
                            $j++;
                                echo $strproduct;

                            }
                            if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']){
                                $html_tong='<h1></h1>
                                <h1><span>$'.number_format($tong,2,".",",").'</span></h1>
                                <h1>Giảm giá</h1>
                                <h1><span>-'.$_SESSION['giamgia'].'%</span"></h1>
                                <h1>Tổng</h1>
                                <h1><span>$'.number_format($tong*(100-$_SESSION['giamgia'])/100,2,".",",").'</span></h1>
                                <input class="tong" type="hidden" value="'.($tong*(100-$_SESSION['giamgia'])/100).'">';
                            }else{
                                $html_tong='<h1>Tổng</h1>
                                <h1><span>$'.number_format($tong,2,".",",").'</span></h1>
                                <input class="tong" type="hidden" value="'.$tong.'">';
                            }
                            $strbillcart.='<h1>Phí vận chuyển</h1>
                                            <h1>$3.00</h1>
                                            <h1>Miễn phí vận chuyển</h1>
                                            <h1>$3.00</h1>
                                            <h1>Thuế</h1>
                                            <h1>0</h1>
                                        </div>
                                        <hr>
                                        <div class="fee-cart">
                                            '.$html_tong.'
                                        </div>
                                        <a href="index.php?pg=checkout"><button class="but-checkout">Thanh toán</button></a>
                                    </aside>';
                            echo '<div class="par-xoatatca"><a href="index.php?pg=products"><button class="moidathang">Tiếp tục đặt hàng</button></a>
                            <a href="index.php?pg=cart&delcart=true"><button class="xoatatca">Xóa tất cả</button></a></div>';
                        }
                }else{
                    $strbillcart='';
                    echo '<div class="par-xoatatca"><h1 class="cartempty">Giỏ hàng rỗng</h1>
                    <a href="index.php?pg=products"><button class="moidathang">Mời bạn đặt hàng</button></a><div>';
                }
                ?>
            </section>
        </article>
        <?php
            if(isset($strbillcart)){
                echo $strbillcart;
            }
            
        ?>
    <script>
        $(document).ready(function () {
            var tong=$('.tong').val();
            $(".tru").click(function (e) { 
                e.preventDefault();
                // alert("ok");
                var soluong=$(this).parent().find('.quantity').html();
                soluongdau=soluong;
                soluong--;
                $(this).parent().find('.quantity').html(soluong);
                // alert(txt);
                // alert(mycart.length);
        
                // alert(tong);
                var ind=$(this).parent().find('.index').val();
                var price=$(this).parent().find('.price').val();
                if(soluong==0){
                    $(".cart-product:eq("+ind+")").remove();
                    $(".fee-cart").find("h1:eq("+(ind*2)+")").remove();
                    $(".fee-cart").find("h1:eq("+(ind*2)+")").remove();
                }else{
                    $(".fee-cart").find("h1:eq("+(ind*2)+")").find("span").html(soluong);
                    $(".fee-cart").find("h1:eq("+(ind*2+1)+")").find("span").html((soluong*price).toLocaleString("en-US", {style:"currency", currency:"USD"}));
                    $(".cart-product:eq("+ind+")").find('.thanhtien').html((soluong*price).toLocaleString("en-US", {style:"currency", currency:"USD"}));
                }
                tong=parseInt(tong)-parseInt((soluongdau-soluong)*price);
                $(".fee-cart:eq(1)").find('span').html(tong.toLocaleString("en-US", {style:"currency", currency:"USD"}));
                if(tong==0){
                    $('.layout-cart').find('article').html(str);
                    $('.layout-cart').find('aside').remove();
                }
                $.post("index.php?pg=cart", {
                    soluongmoi: soluong,
                    ind: ind
                },
                    function (data, textStatus, jqXHR) {
                        $("#msg").html(data);
                    }
                );
            });
            $(".cong").click(function (e) { 
                e.preventDefault();
                // alert("ok");
                var soluong=$(this).parent().find('.quantity').html();
                soluongdau=soluong;
                soluong++;
                $(this).parent().find('.quantity').html(soluong);
                // alert(txt);
                // alert(mycart.length);
        
                // alert(tong);
                var ind=$(this).parent().find('.index').val();
                var price=$(this).parent().find('.price').val();
                $(".fee-cart").find("h1:eq("+(ind*2)+")").find("span").html(soluong);
                $(".fee-cart").find("h1:eq("+(ind*2+1)+")").find("span").html((soluong*price).toLocaleString("en-US", {style:"currency", currency:"USD"}));
                $(".cart-product:eq("+ind+")").find('.thanhtien').html((soluong*price).toLocaleString("en-US", {style:"currency", currency:"USD"}));
                tong=parseInt(tong)+parseInt((soluong-soluongdau)*price);
                $(".fee-cart:eq(1)").find('span').html(tong.toLocaleString("en-US", {style:"currency", currency:"USD"}));
                $.post("index.php?pg=cart", {
                    soluongmoi: soluong,
                    ind: ind
                },
                    function (data, textStatus, jqXHR) {
                        $("#msg").html(data);
                    }
                );
            });
        });
    </script>      
    </div>
    <article class="art-promotion">
        <center>
            <section class="promotion">
                <div class="free-shipping">
                    <i class="fas fa-shipping-fast"></i>
                    <div class="free-shipping">
                        <h4>Miễn phí giao hàng</h4>
                        <p> Khi đặt hàng trên toàn quốc</p>
                    </div>
                </div>
                <div class="support">
                    <i class="fas fa-life-ring"></i>
                    <div>
                        <h4>Hỗ trợ 24/7</h4>
                        <p> Liên hệ bất kỳ lúc nào</p>
                    </div>
                </div>
                <div class="safe">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h4>Thanh toán an toàn</h4>
                        <p>Thanh toán nhanh chóng</p>
                    </div>
                </div>
            </section>
        </center>
    </article>
</div>