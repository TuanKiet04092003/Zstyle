<div class="container">
        <div class="title">
            <h1>Đơn hàng</h1>
            <img class="title-left" src="Image/image-news6.png" alt="">
            <img class="title-right" src="Image/Product2.png" alt="">
        </div>
        <article class="donhang_layout">
            <section class="noi_dung_don_hang">
                <div class="menu-donhang">
                    <p onclick="doidonhang(this)">Tất cả</p>
                    <p onclick="doidonhang(this)">Chờ xác nhận</p>
                    <p onclick="doidonhang(this)">Chờ lấy hàng</p>
                    <p onclick="doidonhang(this)">Đang giao</p>
                    <p onclick="doidonhang(this)">Hoàn thành</p>
                </div>
                <div class="box-don-hang">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Mã đơn hàng</th>
                                <th>Mã khách hàngt</th>
                                <th>Người đặt hàng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </section>
            <img src="view/layout/Image/Image_trangdonhang.png" alt="">
        </article>
    </div>
    <script>
        
        function doidonhang(a) {
            var menu_donhang = a.parentElement.children;
            for (let i = 0; i < menu_donhang.length; i++) {
                menu_donhang[i].style.backgroundColor = '#FBF2F2';
            }
            a.style.backgroundColor = 'white';
        }
        
    </script>