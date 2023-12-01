<div class="container">
        <div class="title">
            <h1>Sản phẩm</h1>
            <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
            <img class="title-right" src="view/layout/Image/Product2.png" alt="">
        </div>
        <article class="Page-products">

            <div class="search">
                <form action="index.php?pg=searchproduct" method="post">
                <input type="text" name="inpproduct" placeholder="Tìm kiếm">
                <button id='butsearch' name="btnproduct" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <aside class="filter">
                <h1>Danh mục</h1>
                    <div class="search-suggestion-all">
                        <?php
                            echo '<a href="index.php?pg=products&ind=0">Tất cả</a><span>('.countproduct(0).')</span>';
                            foreach ($catalogs as $item) {
                                extract($item);
                                $soluong=countproduct($id);
                                $link='index.php?pg=products&ind='.$id;
                                echo '<a href="'.$link.'">'.$name.'</a><span>('.$soluong.')</span>';
                            }
                        ?>
                        
                    
                    </div>
                  
                    <hr/>
                    
                    <div class="choose-price">
                        <h1>Giá</h1>
                        <select name="" id="">
                            <option>Dưới 10.000.000 Đ</option>
                            <option>Từ 10.000.000 Đ đến 20.000.000Đ</option>
                            <option>Từ 20.000.000 Đ đến 50.000.000Đ</option>
                            <option>Từ 50.000.000 Đ đến 100.000.000Đ</option>
                            <option>Từ 100.000.000 Đ đến 200.000.000Đ</option>
                            <option>Từ 200.000.000 Đ đến 500.000.000Đ</option>
                            <option>Trên 500.000.000Đ</option>
                        </select>
                    </div>
                    <hr>
                    <h1>Thương hiệu</h1>
                    <div class="choose-brand">
                        <?php
                            foreach ($brand as $item) {
                                extract($item);
                                echo '<img src="view/layout/Image/'.$logo.'" alt="">';
                            }
                            if($ind==0){
                                $tieude='<h2>Tất cả</h2>';
                            }else{
                                $tieude='<h2>Đồng hồ '.strtolower($catalog['name']).'</h2>';
                            }
                        ?>
                    </div>
            </aside>
            <section class="Page-products-big">
                <div class="top-products">
                    <?php
                        echo $tieude;
                    ?>
                    <div class="sort">
                        <p>Sắp xếp:</p>
                        <select name="" >
                            <option selected>Mặt định</option>
                            <option>Tên từ A-Z</option>
                            <option>Tên từ Z-A</option>
                            <option>Giá tăng dần</option>
                            <option>Giá giảm dần</option>
                        </select>
                        <p>Hiển thì:</p>
                        <select name="" >
                            <option selected>Tất cả</option>
                            <option>9 sản phẩm</option>
                            <option>15 sản phẩm</option>
                            <option>30 sản phẩm</option>
                        </select>
                    </div>
                </div>
                <div class="man-watch">
                    <?php
                        foreach ($products as $item) {
                            extract($item);
                            $img2=$img;
                            $hinh=PATH_IMG.$img;
                                if(is_file($hinh)){
                                    $img='<img src="'.$hinh.'">';
                                }else{
                                    $img='';
                                }
                            if($price>0){
                                $linkdetail='index.php?pg=detail&id='.$id;
                                $strproduct= '<div class="product">
                                <div class="image-product">
                                    <center>
                                        <a href="'.$linkdetail.'">'.$img.'</a>
                                    </center>
                                    <div class="product-icons">
                                        <a href="Cart.html"><i onclick="getInfoCart(this)"
                                                class="fa fa-shopping-cart cart"></i></a>
                                        <i class="fas fa-heart heart"></i>
                                        <a href="Detail.html"><i onclick="getInfoDetail(this)" class="fas fa-info info"></i></a>
                                    </div>
                                </div>
                                <div class="content-product">
                                    <p class="name-product">'.$name.'</p>
                                    <div class="rating">';
                                    for($i=1;$i<=$rate;$i++){
                                        $strproduct.='<i style="color:orange" class="fa fa-star star1"></i>';
                                    }
                                    for($i=$rate;$i<5;$i++){
                                        $strproduct.='<i style="color:black" class="fa fa-star star1"></i>';
                                    }
                                    $strproduct.='</div>
                                    '.sale($item).'
                                    <form action="index.php?pg=addcart" method="post">
                                    <input type="hidden" name="id" value="'.$id.'">
                                    <input class="input_color" type="hidden" name="color" value="red">
                                    <input type="hidden" name="name" value="'.$name.'">
                                    <input type="hidden" name="img" value="'.$img2.'">
                                    <input type="hidden" name="soluong" value="1">
                                    <input type="hidden" name="price" value="'.$price.'">
                                    <input type="hidden" name="priceold" value="'.$priceold.'">
                                    <input type="hidden" name="rate" value="'.$rate.'">';
                                        $strproduct.='<button type="submit" name="addtocart">Giỏ hàng</button>';
                                    $strproduct.='</form>
                                </div>
                            </div>';
                            echo $strproduct;
                            }else{
                                $linkdetail='index.php?pg=detail&id='.$id;
                                $strproduct= '<div class="product">
                                <div class="image-product">
                                    <center>
                                        <a href="'.$linkdetail.'">'.$img.'</a>
                                    </center>
                                    <div class="product-icons">
                                        <a href="Cart.html"><i onclick="getInfoCart(this)"
                                                class="fa fa-shopping-cart cart"></i></a>
                                        <i class="fas fa-heart heart"></i>
                                        <a href="Detail.html"><i onclick="getInfoDetail(this)" class="fas fa-info info"></i></a>
                                    </div>
                                </div>
                                <div class="content-product">
                                    <p class="name-product">'.$name.'</p>
                                    <div class="rating">';
                                    for($i=1;$i<=$rate;$i++){
                                        $strproduct.='<i style="color:orange" class="fa fa-star star1"></i>';
                                    }
                                    for($i=$rate;$i<5;$i++){
                                        $strproduct.='<i style="color:black" class="fa fa-star star1"></i>';
                                    }
                                    $strproduct.='</div>
                                    '.sale($item);
                                        $strproduct.='<a href="index.php?pg=contact"><button>Liên hệ</button></a>';
                                    $strproduct.='
                                </div>
                            </div>';
                            echo $strproduct;
                            }
                            
                        }
                    ?>
                </div>
            </section>
        </article>
    </div>