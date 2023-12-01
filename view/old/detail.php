<div class="sub-menu">
        <a href="Index.html">Trang chủ</a>
        <a href="#">Thương hiệu</a>
        <a href="Products.html">Sản phẩm</a>
        <a href="#">Đơn hàng</a>
        <a href="Contact.html">Liên hệ</a>
    </div>
    <div class="sub-menu-signout">
        <a href="#">Quản lý</a>
        <a href="#">Lịch sử</a>
        <a onclick="signoutLogin()" href="Detail.html">Đăng suất</a>
    </div>
    <script>
        var subMenu = document.getElementsByClassName('sub-menu')[0];
        function appear() {
            if (subMenu.style.display === 'none') {
                subMenu.style.display = 'block';
            } else {
                subMenu.style.display = 'none';
            }
        }
    </script>
    <script>
        function exchangimg(a) {
            var main = document.getElementsByClassName('img-detail-main')[0].children[0];
            var sub_img = document.getElementsByClassName('img-detail-sub')[0].children;
            main.style.opacity = '0';
            setTimeout(() => {
                for (let i = 0; i < sub_img.length; i++) {
                    sub_img[i].style.filter = 'blur(2px)';
                }
                a.style.filter = 'blur(0)';
                main.src = a.src;
                main.style.opacity = '1';
            }, 400)
        }
    </script>
    <!-- <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0"
        nonce="bLDmFjX2"></script> -->
    <?php
        $img2=$img;
        $hinh=PATH_IMG.$img;
        if(is_file($hinh)){
            $imgnho='<img src="'.$hinh.'" onclick="exchangimg(this)">';
            $img='<img id="img-main" height="90%" src="'.$hinh.'">';
        }else{
            $imgnho='';
            $img='';
        }
    ?>
    <div class="container">
        <div class="title">
            <h1>Chi tiết</h1>
            <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
            <img class="title-right" src="view/layout/Image/Product2.png" alt="">
        </div>
        <div class="content-detail">
            <div class="image-detail">
                <div class="img-detail-main">
                    <?=$img?>
                </div>
                <div class="img-detail-sub">
                    <?=$imgnho?>
                    <img class="img_sub_2" src="view/layout/Image/Detail1.png" onclick="exchangimg(this)" alt="">
                    <img class="img_sub_2" src="view/layout/Image/Detail2.jpg" onclick="exchangimg(this)" alt="">
                    <img class="img_sub_2" src="view/layout/Image/Detail3.png" onclick="exchangimg(this)" alt="">
                </div>
            </div>
            <div class="text-detail">
                <h1><?=$name?> 131.58.29.20.55.001 Watch 29mm</h1>
                <div class="views-like">
                    <p class="views">Lượt xem: 4818 | Ngày đăng: 25/12/2019</p>
                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width=""
                        data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                </div>
                <hr>
                <?php
                        if($price>0){
                            $gia= '$'.$price.'.00';
                        }else{
                            $gia= 'Đang cập nhật';
                        }
                        if($priceold>0){
                            $giacu= '$'.$priceold.'.00';
                        }else{
                            $giacu= 'Đang cập nhật';
                        }
                ?>
                <div class="info-detail">
                    <p>
                        Mã sản phẩm <br>
                        Giá đang khuyễn mãi <br>
                        GIá cũ <br>
                        Tiết kiệm được <br>
                        Trả góp <br>
                        Xuất xứ hàng hóa <br>
                        Tình trạng <br>
                    </p>
                    <p>: 101605 <br>
                        : <span> <?=$gia?> </span> <br>
                        : <?=$giacu?> <br>
                        : 30.912.000đ <br>
                        : ≈ 161.000.000 VNĐ x 3 kỳ <br>
                        : Sản phẩm nhập khẩu chính hãng <br>
                        : còn hàng <br>
                    </p>
                </div>
                <hr />
                <div class="color-picker">
                    <div class="maudachon">
                    <p>Chọn Màu Sắc: </p>
                    <?php
                        if(isset($color) && $color!=''){
                            echo '<input type="hidden" id="color" value="'.$color.'">';
                        }
                    ?>
                    <div id="colorDisplay"></div>
                    </div>
                    <?php
                        $_SESSION['idproduct_comment']=$id;
                        echo '<a href="index.php?pg=detailcolor&id='.$id.'&color=red"><button id="redButton"></button></a>';
                        echo '<a href="index.php?pg=detailcolor&id='.$id.'&color=green"><button id="greenButton"></button></a>';
                        echo '<a href="index.php?pg=detailcolor&id='.$id.'&color=blue"><button id="blueButton"></button></a>';
                        echo '<a href="index.php?pg=detailcolor&id='.$id.'&color=black"><button id="blackButton"></button></a>';
                    ?> 
                </div>
                <div class="text-detail-button">
                    <?php
                        if($price>0){
                            $form='<form action="index.php?pg=addcart" method="post">
                            <input type="hidden" name="id" value="'.$id.'">
                            <input class="input_color" type="hidden" name="color" value="red">
                            <input type="hidden" name="name" value="'.$name.'">
                            <input type="hidden" name="img" value="'.$img2.'">
                            <input type="hidden" name="soluong" value="1">
                            <input type="hidden" name="price" value="'.$price.'">
                            <input type="hidden" name="priceold" value="'.$priceold.'">
                            <input type="hidden" name="rate" value="'.$rate.'">
                            <button class="button1">Mua</button>
                            <button type="submit" name="addtocart" class="button2">Giỏ hàng</button>
                            </form>';
                        }else{
                            $form='<button class="button1">Mua</button>
                            <a href="index.php?pg=contact"><button class="button2">Liên hệ</button></a>';
                        }
                        $strproduct= $form;
                        echo $strproduct;
                    ?>
                </div>
            </div>
        </div>
        <div class="tags">
            <p id="tag-infodetail" onclick="quathongtin()">Thông tin sản phẩm</p>
            <p id="tag-comment" onclick="quabinhluan()">Bình luận</p>
        </div>
        <div class="box-infodetail">
        <p class="thongtinsanpham">Omega Constellation 131.58.29.20.55.001 là chiếc đồng hồ sang trọng và thanh lịch, hoàn hảo cho những phụ nữ đánh giá cao sự khéo léo tinh xảo và thiết kế vượt thời gian. Vỏ bằng vàng hồng 18K và đai kính nạm kim cương mang đến cho chiếc đồng hồ vẻ ngoài sang trọng, trong khi mặt số xà cừ khảm trai và vạch chỉ giờ bằng kim cương tăng thêm vẻ sang trọng. Bộ chuyển động Omega Co-Axial Master Chronometer Calibre 8520 đảm bảo rằng đồng hồ hoạt động chính xác và đáng tin cậy, đồng thời khả năng dự trữ năng lượng trong 55 giờ đồng nghĩa với việc bạn sẽ không phải lo lắng về việc lên dây cót mỗi ngày. Dây đeo bằng da cá sấu màu nâu mang lại sự vừa vặn thoải mái và phong cách.
        Chiếc đồng hồ này là sự lựa chọn tuyệt vời cho những phụ nữ đang tìm kiếm một chiếc đồng hồ sang trọng và thanh lịch sẽ bổ sung cho phong cách cá nhân của họ. Đây cũng là một khoản đầu tư tốt, vì giá trị của đồng hồ có khả năng tăng theo thời gian
        </p><br>
        <p>        Chiếc đồng hồ này là sự lựa chọn tuyệt vời cho những phụ nữ đang tìm kiếm một chiếc đồng hồ sang trọng và thanh lịch sẽ bổ sung cho phong cách cá nhân của họ. Đây cũng là một khoản đầu tư tốt, vì giá trị của đồng hồ có khả năng tăng theo thời gian
        </p>
        </div>
        <?php
            $html_comment='';
            if(isset($comment) && is_array($comment)){
                foreach ($comment as $item) {
                    extract($item);
                    $username=getuser($id_user)['name'];
                    $imguser=getuser($id_user)['img'];
                    $html_comment.='<div class="accout-comment">
                                        <img src="view/layout/Image/'.$imguser.'" onclick="exchangimg(this)" alt="">
                                        <p>'.$username.'</p>
                                    </div>
                                    <div class="date-comment">
                                        <div class="rating">';
                                        for($i=1;$i<=$rate;$i++){
                                            $html_comment.='<i style="color:orange" class="fa fa-star star1"></i>';
                                        }
                                        for($i=$rate;$i<5;$i++){
                                            $html_comment.='<i style="color:black" class="fa fa-star star1"></i>';
                                        }
    
                                        $html_comment.='</div>
                                        <p>'.$thoigian.'</p>
                                    </div>
                                    <p class="content-comment">
                                    '.$noidung.'
                                    </p>';
                }
            }
        ?>
        <div class="box-comment">
            <?=$html_comment;?>
            <hr>
            <div class="your-comment">
                <p>Đánh giá của bạn: </p>
                <div class="your-rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5"></label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4"></label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3"></label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2"></label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1"></label>
                </div>
            </div>
                <form class="div-comment" action="index.php?pg=comment" method="post">
                    <input id="selectedRating" type="hidden" name="rate">
                    <input type="text" name="comment" class="comment" placeholder="Bình luận...">
                    <button type="submit" name="send"><i class="fa fa-send send"></i></button>
                </form>
            <script>
                
                // Lấy tất cả các đối tượng radio input
                const ratingInputs = document.querySelectorAll('input[name="rating"]');

                // Đặt sự kiện click cho từng đối tượng input
                ratingInputs.forEach(input => {
                    input.addEventListener("click", function () {
                        const selectedRating = document.getElementById("selectedRating");
                        selectedRating.value = this.value;
                    });
                });
            </script>
        </div>
        <script>
            var tagdetail=document.getElementById('tag-infodetail');
            var tagcomment=document.getElementById('tag-comment');
            function quathongtin(){
                tagcomment.style.backgroundColor='#FBF2F2';
                tagdetail.style.backgroundColor='white';
                document.getElementsByClassName('box-comment')[0].style.display='none';
                document.getElementsByClassName('box-infodetail')[0].style.display='block';
            }
            function quabinhluan(){
                tagcomment.style.backgroundColor='white';
                tagdetail.style.backgroundColor='#FBF2F2';
                document.getElementsByClassName('box-comment')[0].style.display='block';
                document.getElementsByClassName('box-infodetail')[0].style.display='none';
            }
        </script>
        <article>
            <section class="products-catalog">
                <h1 class="title-products">Sản Phẩm Liên Quan</h1>
                <div class="products">
                <style>
                    .title-products{
                        margin: 30px;
                    }
                </style>
                    <?php
                        function giadetail($item){
                            if($item['price']>0){
                                if($item['priceold']>0){
                                    return '<p class="price-product">$'.$item['price'].'.00<span>$'.$item['priceold'].'.00</span></p>';
                                }else{
                                    return '<p class="price-product">$'.$item['price'].'.00</p>';
                                }
                            }else{
                                return '<p class="price-product">Đang cập nhật</p>';
                            }
                            
                        }
                        foreach ($splienquan as $item) {
                            extract($item);
                            $linkdetail='index.php?pg=detail&id='.$id;
                            $strproduct='';
                            $strproduct='<div class="product new-products">
                            <div class="image-product">
                                <center>
                                    <a href="'.$linkdetail.'"><img src="view/layout/Image/'.$img.'" alt=""></a>
                                </center>
                                <div class="product-icons">
                                    <i class="fa fa-shopping-cart cart"></i>
                                    <i class="fas fa-heart heart"></i>
                                    <a href="Detail.html"><i onclick="getInfoDetail(this)" class="fas fa-info info"></i></a>
                                </div>
                            </div>
                            <div class="content-product">
                                <p class="name-product">'.$name.'</p>
                                <div class="ratting">';
                            for($i=1;$i<=$rate;$i++){
                                $strproduct.='<i style="color:orange" class="fa fa-star star1"></i>';
                            }
                            for($i=$rate;$i<5;$i++){
                                $strproduct.='<i style="color:black" class="fa fa-star star1"></i>';
                            }
                                $strproduct.='</div>
                                    '.giadetail($item);
                            if($price>0){
                                    $strproduct.='<form action="index.php?pg=addcart" method="post">
                                    <input type="hidden" name="id" value="'.$id.'">
                                    <input type="hidden" name="name" value="'.$name.'">
                                    <input type="hidden" name="img" value="'.$img.'">
                                    <input class="input_color" type="hidden" name="color" value="red">
                                    <input type="hidden" name="soluong" value="1">
                                    <input type="hidden" name="price" value="'.$price.'">
                                    <input type="hidden" name="priceold" value="'.$priceold.'">
                                    <input type="hidden" name="rate" value="'.$rate.'">';
                                        $strproduct.='<button type="submit" name="addtocart">Giỏ hàng</button>';
                                    $strproduct.='</form>
                                </div>
                            </div>';
                            }else{
                                $strproduct.='<a href="index.php?pg=contact"><button>Liên hệ</button></a></div>
                                </div>';
                            }
                            echo $strproduct;
                        }
                    ?>
                </div>
                <center>
                    <button class="left"><i class="fas fa-arrow-left"></i></button>
                    <button class="right"><i class="fas fa-arrow-right"></i></button>
                </center>
            </section>
        </article>
    </div>
    <article>
    </article>
    <script>
    let color=document.getElementById("color").value;
    document.getElementById("colorDisplay").style.backgroundColor=color;
    const redButton = document.getElementById("redButton");
    const greenButton = document.getElementById("greenButton");
    const blueButton = document.getElementById("blueButton");
    const blackButton = document.getElementById("blackButton");
    const colorDisplay = document.getElementById("colorDisplay");

    redButton.addEventListener("click", () => {
        colorDisplay.style.backgroundColor = "red";
    });

    greenButton.addEventListener("click", () => {
        colorDisplay.style.backgroundColor = "green";
    });

    blueButton.addEventListener("click", () => {
        colorDisplay.style.backgroundColor = "blue";
    });

    blackButton.addEventListener("click", () => {
        colorDisplay.style.backgroundColor = "black";
    });

    document.getElementsByClassName('input_color')[0].value=colorDisplay.style.backgroundColor;

</script>