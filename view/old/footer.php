<footer>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <div class="footer-layout">
            <div class="support">
                <h1>Trợ giúp</h1>
                <p>
                    Về chúng tôi <br>
                    Chính sách bảo mật <br>
                    Chính sách cookie <br>
                    Chính sách bán hàng <br>
                    Chính sách hậu mãi <br>
                    Chính sách vận chuyển <br>
                    Chính sách hoàn tiền <br>
                    Bảo hành và sửa chữa đồng hồ
                </p>
            </div>
            <div class="link">
                <h1>Liên kết</h1>
                <p>Trang chủ <br>
                    Thương hiệu <br>
                    Đồng hồ nam <br>
                    Đồng hồ nữ <br>
                    Đồng hồ đôi <br>
                    Giỏ hàng <br>
                    Đăng nhập <br>
                    Đăng ký</p>
            </div>
            <div class="contact">
                <h1>Liên hệ</h1>
                <p>Facebook: Luxuryshopping <br>
                    Gmail: Luxuryshop.vn <br>
                    Hotline: 0988556325</p>
                <img src="view/layout/Image/Logo.png" alt="">
            </div>
            <div class="info-company">
                <h1>Công ty xuất nhập khẩu hàng hiệu hoa kỳ</h1>
                <p>Địa chỉ: 331 Nguyễn Đình Chiểu, Phường 5, Quận 3, TP. HCM - Điện thoại: 1800 0091 |
                    028 3833 9999 | 028 7777 6677 | 024 7777 6677 - MST: 0312756049</p>
            </div>
        </div>
    </footer>
    <script>
        var banner = document.getElementsByClassName('banner')[0].children[0];
        console.log(banner.src);

        var arrBanner = ["view/layout/Image/imge-banner.jpg", "view/layout/Image/imge-banner1.jpg", "view/layout/Image/imge-banner2.jpg", "view/layout/Image/imge-banner3.jpg"];
        banner.src = arrBanner[2];
        var i = 0;
        const myInterval = setInterval(() => {
            banner.style.animation = '';
            setTimeout(function () {
                banner.style.animation = "slide-banner-appear 1s ease-in-out forwards";
                banner.src = arrBanner[i];
            }, 200);
            i++;
            if (i == 4) {
                i = 0;
            }
        }, 3000);
    </script>
    <!-- <script src="Get_Info_Detail.js"></script> -->
    <script src="view/layout/Homepage.js"></script>
    <script src="view/layout/Products.js"></script>
</body>

</html>