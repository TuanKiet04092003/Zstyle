
<div class="container">
        <header>
            <div class="header-content">
                <h4>Welcome to Luxury</h4>
                <h1>Trân trọng mỗi khoảnh khắc</h1>
                <p>Mỗi người đàn ông cần một chiếc đồng hồ tốt, chắc chắn.
                    Đồng hồ yêu thích của tôi là Rolex của Tổng thống.
                    Tôi sở hữu nhiều đồng hồ, nhưng cái này thường là cái trên cổ tay của tôi.</p>
                <button class="more">Xem thêm</button>
                <button class="cart">Đặt hàng</button>
            </div>
            <div class="banner">
                <img src="view/layout/Image/imge-banner.jpg" alt="">
                <!-- <div class="points">
                    <div class="point-active"></div>
                    <div class="point"></div>
                    <div class="point"></div>
                    <div class="point"></div>
                </div> -->
            </div>
        </header>
        <article>
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
            <section class="watch-brand">
                <h1>Đồng hồ hiệu</h1>
                <div class="brands">
                    <?php
                        foreach ($brand_home as $item) {
                            extract($item);
                            $img=$logo;
                            $hinh=PATH_IMG.$img;
                            if(is_file($hinh)){
                                $img='<img src="'.$hinh.'">';
                            }else{
                                $img='';
                            }
                            echo $img;
                        }
                    ?>
                </div>
                <center>
                    <button onclick="pre()" class="left"><i class="fas fa-arrow-left"></i></button>
                    <button onclick="next()" class="right"><i class="fas fa-arrow-right"></i></button>
                </center>
                <script>
                    function next() {
                        var slide = document.getElementsByClassName('brands')[0].children;
                        for (let i = 0; i < document.getElementsByClassName('brands')[0].children.length; i++) {
                            document.getElementsByClassName('brands')[0].children[i].style.animation = "";
                        }
                        setTimeout(function () {
                            for (let i = 0; i < document.getElementsByClassName('brands')[0].children.length; i++) {
                                document.getElementsByClassName('brands')[0].children[i].style.animation = "move-img-next 0.5s ease-in-out 1 forwards";
                            }
                            document.getElementsByClassName('brands')[0].appendChild(slide[0]);
                        }, 200);
                    }
                    function pre() {
                        var slide = document.getElementsByClassName('brands')[0].children;
                        for (let i = 0; i < document.getElementsByClassName('brands')[0].children.length; i++) {
                            document.getElementsByClassName('brands')[0].children[i].style.animation = "";
                        }
                        setTimeout(function () {
                            for (let i = 0; i < document.getElementsByClassName('brands')[0].children.length; i++) {
                                document.getElementsByClassName('brands')[0].children[i].style.animation = "move-img-pre 0.5s ease-in-out 1 forwards";
                            }
                            document.getElementsByClassName('brands')[0].prepend(slide[slide.length - 1]);
                        }, 200);
                    }
                </script>
                <script src="Homepage.js"></script>
            </section>
            <section class="products-catalog">
                <div class="parent-catalog">
                    <h1>Mới</h1>
                    <div class="catalogs">
                        <p onclick="products_new()">Mới</p>
                        <p onclick="products_hot()">Thịnh hành</p>
                        <p onclick="products_bestsale()">Bán chạy</p>
                        <p onclick="products_sale()">Khuyến mãi</p>
                    </div>
                </div>
                <div class="products">
                    <?php
                        showproduct($newproduct, 'new-products');
                        showproduct($hotproduct, 'hot-products');
                        showproduct($bestsaleproduct, 'bestsale-products');
                        showproduct($saleproduct, 'sale-products');
                    ?>
                </div>
                <center>
                    <button onclick="pre1()" class="left"><i class="fas fa-arrow-left"></i></button>
                    <button onclick="next1()" class="right"><i class="fas fa-arrow-right"></i></button>
                </center>
            </section>
            <section class="slogan">
                <img class="img-hight" src="view/layout/Image/Image-slogan1.jpg" alt="">
                <img class="img-low" src="view/layout/Image/Image-slogan2.jpg" alt="">
                <div class="slogan-bg">
                    <h1 class="slogan-text">Hãy có khoảng thời gian tuyệt vời với chiếc đồng hồ hoàn hảo</h1>
                </div>
            </section>
            <section class="list-products">
                <div class="top-rate">
                    <h1>Đánh giá cao</h1>
                    <?php
                        function itemsale($item){
                            if($item['price']>0){
                                if($item['priceold']>0){
                                    return '<p class="price-item">$'.$item['price'].'.00<span>$'.$item['priceold'].'.00</span></p>';
                                }else{
                                    return '<p class="price-item">$'.$item['price'].'.00</p>';
                                }
                            }else{
                                return '<p class="price-item">Đang cập nhật</p>';
                            }
                            
                        }
                        function print_item_product($toprateproduct){
                            foreach ($toprateproduct as $item) {
                                extract($item);
                                $hinh=PATH_IMG.$img;
                                if(is_file($hinh)){
                                    $img='<img src="'.$hinh.'">';
                                }else{
                                    $img='';
                                }
                                $linkdetail='index.php?pg=detail&id='.$id;
                                $strproduct='';
                                $strproduct= '<div class="item-product">
                                <div class="item-img">
                                    <a href="'.$linkdetail.'">'.$img.'</a>
                                </div>
                                <div class="item-info">
                                    <p class="name-item">'.$name.'</p>
                                    <div class="ratting">';
                                    for($i=1;$i<=$rate;$i++){
                                        $strproduct.='<i style="color:orange" class="fa fa-star star1"></i>';
                                    }
                                    for($i=$rate;$i<5;$i++){
                                        $strproduct.='<i style="color:black" class="fa fa-star star1"></i>';
                                    }
                                $strproduct.= '</div>
                                '.itemsale($item).'
                                </div>
                            </div>';
                                echo $strproduct;
                            }
                        }
                        print_item_product($toprateproduct);
                    ?>
                </div>
                <div class="luxury">
                    <h1>Cao cấp</h1>
                    <?php
                        print_item_product($luxuryproduct);
                    ?>
                </div>
                <div class="noibat">
                    <h1>Nổi bật</h1>
                    <?php
                        print_item_product($noibatproduct);
                    ?>
                    <style>
                        .list-products .ratting{
                            font-size: 15px;
                            margin-bottom: 10px;
                        }  
                        .price-item span{
                            margin-left: 5px;
                        }
                    </style>
                </div>
            </section>
            <!-- <script>
                function next1() {
                    var slide = document.getElementsByClassName('products')[0].children;
                    for (let i = 0; i < document.getElementsByClassName('products')[0].children.length; i++) {
                        document.getElementsByClassName('products')[0].children[i].style.animation = "";
                    }
                    setTimeout(function () {
                        for (let i = 0; i < document.getElementsByClassName('products')[0].children.length; i++) {
                            document.getElementsByClassName('products')[0].children[i].style.animation = "move-img-next 0.5s ease-in-out 1 forwards";
                        }
                        document.getElementsByClassName('products')[0].appendChild(slide[0]);
                    }, 200);
                }
                function pre1() {
                    var slide = document.getElementsByClassName('products')[0].children;
                    for (let i = 0; i < document.getElementsByClassName('products')[0].children.length; i++) {
                        document.getElementsByClassName('products')[0].children[i].style.animation = "";
                    }
                    setTimeout(function () {
                        for (let i = 0; i < document.getElementsByClassName('products')[0].children.length; i++) {
                            document.getElementsByClassName('products')[0].children[i].style.animation = "move-img-pre 0.5s ease-in-out 1 forwards";
                        }
                        document.getElementsByClassName('products')[0].prepend(slide[slide.length - 1]);
                    }, 200);
                }
            </script> -->
            
            
            <section class="watch-knowledge">
                <h1>Kiến thức đồng hồ</h1>
                <div class="knowledge">
                    <div class="knowledge-main">
                        <img src="view/layout/Image/img-knowledge-main.jpg" alt="">
                        <h1>Đồng hồ mạ vàng có bền không</h1>
                        <p>Hiện nay các dòng đồng hồ mạ vàng đang rất được <br>
                            sang trọng cho người đeo thu hút hơn.</p>
                    </div>
                    <div class="knowledge-sub1">
                        <img src="view/layout/Image/img-knowledge1.jpg" alt="">
                        <div class="text-knowledge">
                            <h1>Open Heart Là Gì? </h1>
                            <p>Mẫu đồng hồ Open Heart đang được rất nhiều người quan tâm.
                                Để hiểu rõ hơn đồng hồ</p>
                        </div>
                        <button>Xem thêm</button>
                    </div>
                    <div class="knowledge-sub2">
                        <img src="view/layout/Image/img-knowledge2.jpg" alt="">
                        <div class="text-knowledge">
                            <h1>Cho người mới bắt đầu</h1>
                            <p>Nếu bạn muốn tìm mua chiếc đồng hồ đầu tiên nhưng không biết bắt đầu từ đâu? </p>
                        </div>
                        <button>Xem thêm</button>
                    </div>
                    <div class="knowledge-sub3">
                        <img src="view/layout/Image/img-knowledge3.jpg" alt="">
                        <div class="text-knowledge">
                            <h1>Đồng hồ thế giới</h1>
                            <p>Đồng hồ GMT là gì? Cùng khám phá các thuật ngữ về đồng
                                Worldtimer, đồng hồ GMT</p>
                        </div>
                        <button>Xem thêm</button>
                    </div>
                </div>
            </section>
            <h1 class="title-news">Tin tức</h1>
            <center>
                <section class="news">
                    <div class="box-news1">
                        <img src="view/layout/Image/image-news5.png" alt="">
                        <div class="content-news1">
                            <h1>
                                Bulova
                            </h1>
                            <span>Bulova ra mắt đồng hồ</span>
                            <p>Bulova Classic Wilton GMT mới công bố vừa qua mang đến</p>
                        </div>
                    </div>
                    <div class="box-news2">
                        <div class="content-news2">
                            <h1>
                                Gucci
                            </h1>
                            <span>BST Đồng Hồ Gucci</span>
                            <p>Bulova Classic Wilton GMT mới <br> công bố vừa qua mang đến</p>
                        </div>
                        <img src="view/layout/Image/image-new4.png" alt="">
                    </div>
                    <div class="box-news3">
                        <div class="content-news3">
                            <h1>
                                Versace
                            </h1>
                            <span>Top 10 Dòng Đồng Hồ Versace</span>
                            <p>Versace là một trong những thương hiệu thời <br> trang cao cấp bậc nhất thế giới</p>
                        </div>
                        <img src="view/layout/Image/image-news2.png" alt="">
                    </div>
                    <div class="box-news4">
                        <div class="content-news4">
                            <h1>
                                Bvlgari
                            </h1>
                            <span>6 Thương Hiệu Đồng Hồ Ý</span>
                            <p>Thương hiệu đồng hồ Ý <br> hoàn toàn mới</p>
                        </div>
                        <img src="view/layout/Image/image-news6.png" alt="">

                    </div>
                </section>
            </center>
        </article>
    </div>