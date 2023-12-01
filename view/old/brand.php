<div class="container">
        <div class="title">
            <h1>Thương hiệu</h1>
            <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
            <img class="title-right" src="view/layout/Image/Product2.png" alt="">
        </div>
        <article class="layout-brand">
            <?php
                foreach ($brand as $item) {
                    extract($item);
                    $hinh=PATH_IMG.$logo;
                        if(is_file($hinh)){
                            $img='<img src="'.$hinh.'">';
                        }else{
                            $img='';
                        }
                    echo $img;
                }
            ?>
        </article>
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