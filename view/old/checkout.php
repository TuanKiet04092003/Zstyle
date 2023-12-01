<div class="container" id="blur">
        <div class="title">
            <h1>Thanh toán</h1>
            <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
            <img class="title-right" src="view/layout/Image/Product2.png" alt="">
        </div>
        <form action="index.php?pg=checkout" method="post">
        <div class="layout-checkout">
            <section class="form-checkout">
                <?php
                    if(isset($user)){
                        extract($user);
                    }else{
                        $name='';
                        $email='';
                        $sdt='';
                        $diachi='';
                    }
                ?>
                <h2>Địa chỉ người đặt</h2>
                <h1>Họ và tên</h1>
                <input name="tendat" type="text" placeholder="Nhập họ và tên" value="<?=$name?>">
                <div class="date-checkout">
                    <div>
                        <h1>Email</h1>
                        <input name="emaildat" type="text" placeholder="Nhập email" value="<?=$email?>">
                    </div>
                    <div>
                        <h1>Số điện thoại</h1>
                        <input name="sdtdat" type="text" placeholder="Nhập số điện thoại" value="<?=$sdt?>">
                    </div>
                </div>
                <h1>Địa chỉ</h1>
                <input name="diachidat" type="text" placeholder="Nhập địa chỉ" value="<?=$diachi?>">
                <input onclick="diachikhac()" class="khac" type="checkbox"><label>Giao hàng đến địa chỉ khác</label>
                <div class="diachikhac" style="display: none;">
                    <h2>Địa chỉ giao hàng</h2>
                    <h1>Họ và tên</h1>
                    <input name="tennhan" type="text" placeholder="Nhập họ và tên">
                    <div class="date-checkout">
                        <div>
                            <h1>Email</h1>
                            <input name="emailnhan" type="text" placeholder="Nhập email">
                        </div>
                        <div>
                            <h1>Số điện thoại</h1>
                            <input name="sdtnhan" type="text" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <h1>Địa chỉ</h1>
                    <input name="diachinhan" type="text" placeholder="Nhập địa chỉ">
                </div>
            </section>
            <script>
                function diachikhac(){
                    var box=document.getElementsByClassName('diachikhac')[0];
                    if(box.style.display=='none'){
                        box.style.display='block';
                    }else{
                        box.style.display='none';
                    }
                }
            </script>
            <section class="summary-checkout">
            <?php
            if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){
                $str='<h1>Tóm tắt</h1>
                <section class="summary-checkout-product">';
                    
                        
                            $strbill='';
                            $tong=0;
                            foreach ($_SESSION['giohang'] as $item) {
                                extract($item);
                                $tong+=$soluong*$price;
                                $strbill.='<h1>'.$name.' X'.$soluong.'</h1>
                                            <h1>$'.number_format($price*$soluong,2,'.',',').'</h1>';
                                $str.='<div class="checkout-product">
                                <img src="view/layout/Image/'.$img.'" alt="">
                                <div class="info-checkout-product">
                                    <h1>'.$name.'</h1>
                                    <p>Mã sản phẩm: 0000'.$id.'</p>
                                    <div class="rating">';
                                    for($i=1;$i<=$rate;$i++){
                                        $str.='<i style="color:orange" class="fa fa-star star1"></i>';
                                    }
                                    for($i=$rate;$i<5;$i++){
                                        $str.='<i style="color:black" class="fa fa-star star1"></i>';
                                    }
                                    $str.='</div>
                                </div>
                                <div class="boxsoluong">
                                    <h1 class="checkout-price">Giá: $'.number_format($price,2,'.',',').'</h1>
                                    <h1 class="soluong">X'.$soluong.'</h1>
                                </div>
                            </div>';
                            }
                    
                if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']){
                    $tong=$tong*(100-$_SESSION['giamgia'])/100;
                }
                $str.='
                <div class="fee-checkout">
                    '.$strbill.'
                    <h1>Phí vận chuyển</h1>
                    <h1>$3.00</h1>
                    <h1>Miễn phí vận chuyển</h1>
                    <h1>$3.00</h1>
                    <h1>Thuế</h1>
                    <h1>0</h1>
                </div>
                <hr>
                <div class="fee-checkout">
                    <h1>Tổng</h1>
                    <h1>$'.number_format($tong,2,'.',',').'</h1>
                </div>
                <button type="submit"  onclick="successful()" name="thanhtoan">Tiếp tục</button>
                <h1 class="thanhtoan">Phương thức thanh toán</h1>
                <label><input name="phuongthuc" type="radio" value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</label><br>
                <label><input name="phuongthuc" type="radio" value="Thẻ ngân hàng">Thẻ ngân hàng</label><br>
                <label><input name="phuongthuc" type="radio" value="Ví điện tử">Ví điện tử</label>';
            echo $str;
            }else{
                echo '<h1 class="hetsanpham">Chưa có sản phẩm</h1>
                <button><a href="index.php?pg=products">Mời đặt hàng</a></button>';
            }
            ?>
            </section>
        </div>
        <form>
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
    <section id="abc" class="checkout-success">
        <div class="icon-check">
            <i class="fa fa-check"></i>
        </div>
        <img class="img-logo" src="view/layout/Image/Logo.png" alt="">
        <h1>Thanh toán thành công</h1>
        <p>Cảm ơn quý khách đã thanh toán</p>
        <a href="index.php"><button onclick="after_successful()">Ok</button></a>
    </section>
    <script>
        var box = document.getElementById('abc');
        var blur = document.getElementById('blur');
        function successful() {
            box.style.top = '200px';
            box.style.transition = '1s'
            blur.classList.toggle('active');
        }
        function after_successful() {
            localStorage.setItem('login', true);
            box.style.top = '-235px';
            blur.classList.toggle('active');
        }
    </script>