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
        <a onclick="signoutLogin()" href="Contact.html">Đăng suất</a>
    </div>
    <script>
        var subMenu=document.getElementsByClassName('sub-menu')[0];
        function appear(){
            if (subMenu.style.display==='none'){
                subMenu.style.display='block';
            }else{
                subMenu.style.display='none';
            }
        }
    </script>
    <div class="container">
        <div class="title">
            <h1>Liên hệ</h1>
            <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
            <img class="title-right" src="view/layout/Image/Product2.png" alt="">
        </div>
        <article class="layout-contact">
            <section class="info-contact">
                <h1>Thông tin</h1>
                <div class="layout-info-contact">
                    <p class="title-contact">Địa chỉ</p>
                    <p> : 331 Nguyen Dinh Chieu/P.3/Q.3/HCM </p>
                    <p class="title-contact">SDT</p> <p> : 1800 0091 | 028-3833-9999</p>
                    <p class="title-contact">Email</p>
                        <p>: contact@luxshopping.vn</p>
                        <p class="title-contact">Tax code</p> <p>: 0312756049</p>
                </div>
                <h1>Nội dung liên hệ</h1>
                <form action="">
                    <div class="layout-input">
                        <label class="title-contact" for="">Họ tên</label>
                        <input type="text" placeholder="Họ tên">
                        <label class="title-contact" for="">Số điện thoại</label>
                        <input type="text" placeholder="Số điện thoại">
                        <label class="title-contact" for="">Email</label>
                        <input type="email" placeholder="Email">
                        <label class="title-contact" for="">Nội dung</label>
                        <textarea name="" id="" cols="64" rows="6" placeholder="Nội dung"></textarea>
                    </div>
                    <button type="submit">Gửi</button>
                </form>
            </section>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.50822
            20660593!2d106.68190867394487!3d10.77233295927144!2m3!1f0!2f0!3f0!3m2!1i1024!
            2i768!4f13.1!3m3!1m2!1s0x31752ee6fbf50b0d%3A0xeafd545dc3bb1ea3!2sLuxury%20Sho
            pping!5e0!3m2!1svi!2s!4v1686192595843!5m2!1svi!2s" width="600" height="570"
            style="border:0;" allowfullscreen="" loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"></iframe>
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