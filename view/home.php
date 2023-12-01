
      <section class="hero">
        <div class="hero-slider">
          <div class="hero-item">
            <div class="hero-image">
              <a href="#">
                <img src="view/layout/assets/images/banner 1.png" alt="" />
              </a>
              <div class="hero-btn">
                <a href="view/layout/assets/pages/thietke.html">
                  <button class="button-primary">Thiết kế ngay</button>
                </a>
              </div>
            </div>
          </div>
          <div class="hero-item">
            <a href="view/layout/assets/pages/thietke.html">
              <img src="view/layout/assets/images/banner 2.png" alt="" />
            </a>
          </div>
          <div class="hero-item">
            <div class="hero-image">
              <a href="view/layout/assets/pages/thietke.html">
                <img src="view/layout/assets/images/banner 3.png" alt="" />
              </a>
              <div class="hero-btn hero-btn-3">
                <button class="button-primary">Thiết kế ngay</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="product">
        <div class="container">
          <div class="heading-primary">SẢN PHẨM NỔI BẬT</div>
          <div class="product-main">
            <div class="product-left">
              <div class="product-list product-list-2">

              <?php
                $html_product='';
                foreach ($product_noibat as $item) {
                    $html_product.= showproduct($item);
                }
                echo $html_product;
            ?>
                
              </div>
            </div>
            <div class="product-right">
              <div class="product-banner">
                <a href="#">
                  <img class="banner-img" src="view/layout/assets/images/banner-custom-1.png" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="product-btn">
          <button class="button-primary">Xem tất cả</button>
        </div>
      </section>
      <section class="deal">
        <div class="container">
          <div class="heading-primary deal-heading">DEAL HOT TRONG TUẦN</div>
          <div class="deal-main">
          <?=showproduct_box_mobile($product_hot, 1)?>
            
          <?php
                $html_product='';
                foreach ($product_hot as $item) {
                    $html_product.= showproduct_box($item);
                }
                echo $html_product;
            ?>

          </div>
          <div class="product-btn">
            <button class="button-primary button-secondary">Xem tất cả</button>
          </div>
        </div>
      </section>
      <section class="top">
        <div class="container">
          <div class="heading-primary">DÀNH CHO BẠN</div>
          <h2 class="top-item-title top-item-title-mobile">Bán chạy</h2>
          <div class="top-list">
            <div class="top-main-list">

              <?= showproduct_column($product_bestsell, 'Bán chạy')?>

            </div>
            <h2 class="top-item-title top-item-title-mobile">Nhiều lượt xem</h2>
            <div class="top-main-list">
              
            <?= showproduct_column($product_topview, 'Nhiều lượt xem')?>
        
            </div>
            <h2 class="top-item-title top-item-title-mobile">Xu hướng</h2>
            <div class="top-main-list">
              
            <?= showproduct_column($product_trend, 'Xu hướng')?>

            </div>
          </div>
        </div>
      </section>
      <section class="product">
        <div class="container">
          <div class="heading-primary">SẢN PHẨM CỦA CHÚNG TÔI</div>
          <ul class="tab-menu">
            <?php
                $html_catalog='';
                $html_product='';
                $i=0;
                foreach ($catalog_home as $item) {
                    $i++;
                    if($i==1){
                        $html_catalog.='<li class="tab-item"><a onclick="click_catalog(this)" class="tab-link active">'.$item['name'].'</a></li>';
                    }else{
                        $html_catalog.='<li class="tab-item"><a onclick="click_catalog(this)" class="tab-link">'.$item['name'].'</a></li>';
                    }
                    $product_catalog=getproduct_catalog($item['id']);
                    extract($product_catalog[0]);
                    
                    $html_product.='<div class="my-product" style="display:none;">
                    <div class="product-main mt-30">
                    <div class="product-box">
                    <div class="deal-item">
                        <div class="deal-list">
                        <div class="deal-item__image">
                            <a href="#">
                            '.check_img(getimg_product_main($id)['main_img']).'
                            </a>
                            <div class="deal-items">
                            '.check_img(getimg_product_main($id)).'
                            </div>
                        </div>
                        <div class="deal-content">
                            <div class="deal-title">'.$name.'</div>
                            <div class="deal-price">'.number_format($product_catalog[0]['price'],0,'',',').'đ
                            '.sale($product_catalog[0]).'
                            </div>
                            <div class="deal-bestseller">Best Seller</div>
                            <div class="deal-auth">
                            <a href="#" class="deal-view">Xem chi tiết</a>
                            <a href="index.php?pg=checkout&id='.$id.'" class="add"><button class="deal-btn">Mua ngay</button></a>

                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="product-list product-box__list">';
                
                    if(isset($product_catalog[1])){
                        $html_product.=showproduct($product_catalog[1]);
                    }
                    
                    if(isset($product_catalog[2])){
                        $html_product.=showproduct($product_catalog[2]);
                    }
                    $html_product.='</div>
                    </div>
                    <div class="product-list mt-30">';
                    if(isset($product_catalog[3])){
                        $html_product.=showproduct($product_catalog[3]);
                    }
                    if(isset($product_catalog[4])){
                        $html_product.=showproduct($product_catalog[4]);
                    }
                    if(isset($product_catalog[5])){
                        $html_product.=showproduct($product_catalog[5]);
                    }
                    if(isset($product_catalog[6])){
                        $html_product.=showproduct($product_catalog[6]);
                    }
                    
                    $html_product.=
                '</div>
                </div>';
                }
                echo $html_catalog;
            ?>
          </ul>
            <?=$html_product?>
        <!-- <div class="my-product">
          <div class="product-main mt-30">
            <div class="product-box">
              <div class="deal-item">
                <div class="deal-list">
                  <div class="deal-item__image">
                    <a href="#">
                      <img src="view/layout/assets/images/product-4.png" alt="" />
                    </a>
                    <div class="deal-items">
                      <img src="view/layout/assets/images/product-4.png" alt="" />
                      <img src="view/layout/assets/images/product-4.png" alt="" />
                      <img src="view/layout/assets/images/product-4.png" alt="" />
                      <img src="view/layout/assets/images/product-4.png" alt="" />
                    </div>
                  </div>
                  <div class="deal-content">
                    <div class="deal-title">Áo Thun Regular Bear Cool</div>
                    <div class="deal-price">290,000đ</div>
                    <div class="deal-bestseller">Best Seller</div>
                    <div class="deal-auth">
                      <a href="#" class="deal-view">Xem chi tiết</a>
                      <button class="deal-btn">Mua ngay</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="product-list product-box__list">
              <div class="product-item">
                <div class="product-images">
                  <a href="#">
                    <img src="view/layout/assets/images/product-1.png" alt="" />
                  </a>
                  <div class="icons">
                    <a href="#" class="views">Xem chi tiết</a>
                    <a href="#" class="add">Mua ngay</a>
                  </div>
                </div>
                <div class="product-title">Áo Thun Regular Bear Cool</div>
                <div class="product-price">290,000đ</div>
              </div>
              <div class="product-item">
                <div class="product-images">
                  <a href="#">
                    <img src="view/layout/assets/images/product-2.png" alt="" />
                  </a>
                  <div class="icons">
                    <a href="#" class="views">Xem chi tiết</a>
                    <a href="#" class="add">Mua ngay</a>
                  </div>
                </div>
                <div class="product-title">Áo Thun Regular Bear Cool</div>
                <div class="product-price">290,000đ</div>
              </div>
            </div>
          </div>
          <div class="product-list mt-30">
            <div class="product-item">
              <div class="product-images">
                <a href="#">
                  <img src="view/layout/assets/images/product-3.png" alt="" />
                </a>
                <div class="icons">
                  <a href="#" class="views">Xem chi tiết</a>
                  <a href="#" class="add">Mua ngay</a>
                </div>
              </div>
              <div class="product-title">Áo Thun Regular Bear Cool</div>
              <div class="product-price">290,000đ</div>
            </div>
            <div class="product-item">
              <div class="product-images">
                <a href="#">
                  <img src="view/layout/assets/images/product-4.png" alt="" />
                </a>
                <div class="icons">
                  <a href="#" class="views">Xem chi tiết</a>
                  <a href="#" class="add">Mua ngay</a>
                </div>
              </div>
              <div class="product-title">Áo Thun Regular Bear Cool</div>
              <div class="product-price">290,000đ</div>
            </div>
            <div class="product-item">
              <div class="product-images">
                <a href="#">
                  <img src="view/layout/assets/images/product-5.png" alt="" />
                </a>
                <div class="icons">
                  <a href="#" class="views">Xem chi tiết</a>
                  <a href="#" class="add">Mua ngay</a>
                </div>
              </div>
              <div class="product-title">Áo Thun Regular Bear Cool</div>
              <div class="product-price">290,000đ</div>
            </div>
            <div class="product-item">
              <div class="product-images">
                <a href="#">
                  <img src="view/layout/assets/images/product-6.png" alt="" />
                </a>
                <div class="icons">
                  <a href="#" class="views">Xem chi tiết</a>
                  <a href="#" class="add">Mua ngay</a>
                </div>
              </div>
              <div class="product-title">Áo Thun Regular Bear Cool</div>
              <div class="product-price">290,000đ</div>
            </div>
          </div>
        </div> -->
        </div>
      </section>
      <section class="service">
        <div class="container">
          <div class="service-list">
            <div class="service-box item-1">
              <div class="service-icon">
                <img src="view/layout/assets/images/customer-icon.svg" alt="" />
              </div>
              <div class="service-content">
                <h4 class="service-title">Miễn phí giao hàng</h4>
                <p class="service-desc">
                  Áp dụng Free ship cho tất cả đơn hàng từ 500 nghìn, giao ngay trong vòng 24h
                </p>
              </div>
            </div>
            <div class="service-box item-2">
              <div class="service-icon">
                <img src="view/layout/assets/images/customer-icon-2.svg" alt="" />
              </div>
              <div class="service-content">
                <h4 class="service-title">ĐỔI TRẢ DỄ DÀNG</h4>
                <p class="service-desc">
                  Đổi ngay trong ngày nếu sản phẩm bị lỗi sản xuất, giao sai yêu cầu của quý khách
                </p>
              </div>
            </div>
            <div class="service-box item-3">
              <div class="service-icon">
                <img src="view/layout/assets/images/customer-icon-3.svg" alt="" />
              </div>
              <div class="service-content">
                <h4 class="service-title">Tư vấn 24/7</h4>
                <p class="service-desc">
                  Gọi hotline: 1900 6750 để được hỗ trợ ngay, hỗ trợ tư vấn mọi vấn đề về thể thao
                </p>
              </div>
            </div>
            <div class="service-box item-4">
              <div class="service-icon">
                <img src="view/layout/assets/images/customer-icon-4.svg" alt="" />
              </div>
              <div class="service-content">
                <h4 class="service-title">THANH TOÁN ĐA DẠNG</h4>
                <p class="service-desc">
                  Thanh toán khi nhận hàng COD, Chuyển Khoản, Napas, Visa, ATM, Trả góp
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="seller">
        <div class="container">
          <div class="heading-primary">BEST SELLER</div>
          <div class="seller-main">
            <div class="seller-product">
              <div class="seller-product-list">
                <div class="product-item">
                  <div class="product-images">
                    <a href="#">
                      <img src="view/layout/assets/images/product-1.png" alt="" />
                    </a>
                    <div class="icons">
                      <a href="#" class="views">Xem chi tiết</a>
                      <a href="#" class="add">Mua ngay</a>
                    </div>
                  </div>
                  <div class="product-title">Áo Thun Regular Bear Cool</div>
                  <div class="product-price">290,000đ</div>
                </div>
                <div class="product-item">
                  <div class="product-images">
                    <a href="#">
                      <img src="view/layout/assets/images/product-2.png" alt="" />
                    </a>
                    <div class="icons">
                      <a href="#" class="views">Xem chi tiết</a>
                      <a href="#" class="add">Mua ngay</a>
                    </div>
                  </div>
                  <div class="product-title">Áo Thun Regular Bear Cool</div>
                  <div class="product-price">290,000đ</div>
                </div>
                <div class="product-item">
                  <div class="product-images">
                    <a href="#">
                      <img src="view/layout/assets/images/product-3.png" alt="" />
                    </a>
                    <div class="icons">
                      <a href="#" class="views">Xem chi tiết</a>
                      <a href="#" class="add">Mua ngay</a>
                    </div>
                  </div>
                  <div class="product-title">Áo Thun Regular Bear Cool</div>
                  <div class="product-price">290,000đ</div>
                </div>
                <div class="product-item">
                  <div class="product-images">
                    <a href="#">
                      <img src="view/layout/assets/images/product-4.png" alt="" />
                    </a>
                    <div class="icons">
                      <a href="#" class="views">Xem chi tiết</a>
                      <a href="#" class="add">Mua ngay</a>
                    </div>
                  </div>
                  <div class="product-title">Áo Thun Regular Bear Cool</div>
                  <div class="product-price">290,000đ</div>
                </div>
              </div>
            </div>
            <div class="seller-banner">
              <a href="#">
                <img src="https://source.unsplash.com/random" alt="" />
              </a>
            </div>
          </div>
        </div>
      </section> -->
      <section class="customer">
        <div class="customer-main">
          <div class="customer-banner">
            <a href="#">
              <img class="customer-image" src="https://source.unsplash.com/random" alt="" />
            </a>
          </div>
          <div class="customer-content">
            <div class="customer-icon">
              <i class="fa fa-quote-left" aria-hidden="true"></i>
            </div>
            <div class="customer-title">KHÁCH HÀNG NÓI GÌ VỀ SẢN PHẨM CỦA ZSTYLE THỂ THAO</div>
            <p class="customer-desc">
              “Cảm ơn ZStyle đã giúp mình tậu được 2 đôi giày ưng ý cho mùa hè này. Đối với mình
              OH!Sport luôn là lựa chọn đầu tiên của mình, mẫu mã đa dạng, cách phục vụ chu đáo và
              luôn support khách hàng nhiệt tình. Chúc OH!Sport thành công hơn nữa.”
            </p>
            <div class="customer-info">
              <div class="customer-name">Diễm Hồng</div>
              <div class="customer-member">Khách hàng mua áo tạo ZSTYLE</div>
              <div class="customer-rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="blog">
        <div class="container">
          <div class="heading-primary">TIN TỨC MỚI NHẤT</div>
          <div class="blog-list">
            <div class="blog-item">
              <div class="blog-image">
                <a href="#">
                  <img src="https://source.unsplash.com/random" alt="" />
                </a>
              </div>
              <div class="blog-content">
                <h3 class="blog-title">
                  <a href="#"
                    >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                  </a>
                </h3>
                <div class="blog-date">05/10/2023</div>
                <div class="blog-desc">
                  Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                  nhìn của nữ giới,...
                </div>
                <div class="blog-btn">
                  <button class="blog-button">Đọc tiếp</button>
                </div>
              </div>
            </div>
            <div class="blog-item">
              <div class="blog-image">
                <a href="#">
                  <img src="https://source.unsplash.com/random" alt="" />
                </a>
              </div>
              <div class="blog-content">
                <h3 class="blog-title">
                  <a href="#"
                    >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                  </a>
                </h3>
                <div class="blog-date">05/10/2023</div>
                <div class="blog-desc">
                  Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                  nhìn của nữ giới,...
                </div>
                <div class="blog-btn">
                  <button class="blog-button">Đọc tiếp</button>
                </div>
              </div>
            </div>
            <div class="blog-item">
              <div class="blog-image">
                <a href="#">
                  <img src="https://source.unsplash.com/random" alt="" />
                </a>
              </div>
              <div class="blog-content">
                <h3 class="blog-title">
                  <a href="#"
                    >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                  </a>
                </h3>
                <div class="blog-date">05/10/2023</div>
                <div class="blog-desc">
                  Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                  nhìn của nữ giới,...
                </div>
                <div class="blog-btn">
                  <button class="blog-button">Đọc tiếp</button>
                </div>
              </div>
            </div>
            <div class="blog-item">
              <div class="blog-image">
                <a href="#">
                  <img src="https://source.unsplash.com/random" alt="" />
                </a>
              </div>
              <div class="blog-content">
                <h3 class="blog-title">
                  <a href="#"
                    >Tất tần tật bí quyết chọn mua quần áo thể thao nam chất lượng nhất
                  </a>
                </h3>
                <div class="blog-date">05/10/2023</div>
                <div class="blog-desc">
                  Là những người đam mê bộ môn Gym và mong muốn có thân hình đẹp, thu hút mọi ánh
                  nhìn của nữ giới,...
                </div>
                <div class="blog-btn">
                  <button class="blog-button">Đọc tiếp</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
