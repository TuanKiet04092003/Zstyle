<div class="container">
        <div class="title">
            <h1>Tài khoản</h1>
            <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
            <img class="title-right" src="view/layout/Image/Product2.png" alt="">
        </div>
        <article class="taikhoan-layout">
            <aside class="left-menu">
                <div class="taikhoan"> 
                    <img src="view/layout/Image/Image-customer.jpg" alt="">
                    <p>dotuankiet</p>
                </div>
                <hr>
                <a onclick="capnhat()"><p class="hienthi">Cập nhật thông tin</p></a>
                <a  onclick="donhang()"><p class="menu-donhang">Đơn hàng</p></a>
                <a href="index.php?pg=logoutuser"><p class="dangxuat">Đăng xuất</p></a>
            </aside>
            <section class="capnhat donhang">
                <div class="capnhat-top">
                    <h2>Đơn hàng</h2>
                    <hr>
                </div>
                <div class="box-don-hang">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Mã đơn hàng</th>
                                <th>Mã sản phẩm</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                if(isset($donhangct)){
                                    foreach ($donhangct as $item) {
                                        extract($item);
                                        echo '<tr>
                                        <td>'.$i.'</td>
                                        <td>'.$id_donhang.'</td>
                                        <td>'.$id_product.'</td>
                                        <td>'.$soluong.'</td>
                                        </tr>';
                                        $i++;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

                </div>
            </section>
    <script>
        function capnhat(){
            document.getElementsByClassName('capnhattt')[0].style.display='block';
            document.getElementsByClassName('donhang')[0].style.display='none';
            document.getElementsByClassName('hienthi')[0].style.backgroundColor='white';
            document.getElementsByClassName('menu-donhang')[0].style.backgroundColor='#FBF2F2';
        }
        function donhang(){
            document.getElementsByClassName('donhang')[0].style.display='block';
            document.getElementsByClassName('capnhattt')[0].style.display='none';
            document.getElementsByClassName('hienthi')[0].style.backgroundColor='#FBF2F2';
            document.getElementsByClassName('menu-donhang')[0].style.backgroundColor='white';
        }
    </script>
            <!-- <script>
                function taianh(){
                    // document.getElementsByClassName('capnhat-right')[0].children[0].src=document.getElementsByClassName('taianh')[0].value;

                    console.log(document.getElementsByClassName('taianh')[0].value);
                }
            </script> -->
        </article>
    </div>
