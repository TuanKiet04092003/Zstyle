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
                    <p><?=$user?></p>
                </div>
                <hr>
                <a onclick="capnhat()"><p class="hienthi">Cập nhật thông tin</p></a>
                <a  onclick="donhang()"><p class="menu-donhang">Đơn hàng</p></a>
                <a href="index.php?pg=logoutuser"><p class="dangxuat">Đăng xuất</p></a>
            </aside>
            <section class="capnhat capnhattt">
                <div class="capnhat-top">
                    <h2>Cập nhật thông tin</h2>
                    <hr>
                </div>
                <div class="capnhat-bottom">
                    <div class="capnhat-left">
                        <table>
                            <tr>
                                <td class="label">
                                    <label for="">Tên đăng nhập</label>
                                </td>
                                <td><input type="text" value=<?=$user?>><br>
                                </td>
                            </tr>
                            <tr><td class="label"><label for="">Họ và tên</label></td>
                                <td><input type="text" placeholder="Nhập họ và tên" <?=$name?>></td>
                            </tr>
                            <tr>
                                <td class="label"><label for="">Email</label></td>
                                <td><p><?=$email?></p></td>
                            </tr>
                            <tr>
                                <td class="label"><label for="">Số điện thoại</label></td>
                                <td><input type="text" placeholder="Nhập số điện thoại" <?=$sdt?>></td>
                            </tr>
                            <tr>
                                <td class="label"><label for="">Giới tính</label></td>
                                <td><input type="radio"> 
                                    <label class="label-radio" for="">Nam</label>
                                    <input type="radio"> 
                                    <label class="label-radio" for="">Nữ</label>
                                    <input type="radio"> 
                                    <label class="label-radio" for="">Khác</label></td>
                            </tr>
                            <tr><td class="label"><label for="">Ngày sinh</label></td>
                                <td><select>
                                    <option selected value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                    <option value="">11</option>
                                    <option value="">12</option>
                                    <option value="">13</option>
                                    <option value="">14</option>
                                    <option value="">15</option>
                                    <option value="">16</option>
                                    <option value="">17</option>
                                    <option value="">18</option>
                                    <option value="">19</option>
                                    <option value="">20</option>
                                    <option value="">21</option>
                                    <option value="">22</option>
                                    <option value="">23</option>
                                    <option value="">24</option>
                                    <option value="">25</option>
                                    <option value="">26</option>
                                    <option value="">27</option>
                                    <option value="">28</option>
                                    <option value="">29</option>
                                    <option value="">30</option>
                                    <option value="">31</option>
                                </select>
                                <select>
                                    <option selected value="">Tháng 1</option>
                                    <option value="">Tháng 2</option>
                                    <option value="">Tháng 3</option>
                                    <option value="">Tháng 4</option>
                                    <option value="">Tháng 5</option>
                                    <option value="">Tháng 6</option>
                                    <option value="">Tháng 7</option>
                                    <option value="">Tháng 8</option>
                                    <option value="">Tháng 9</option>
                                    <option value="">Tháng 10</option>
                                    <option value="">Tháng 11</option>
                                    <option value="">Tháng 12</option>
                                </select>
                                <select class="nhapnam">
                                    <option selected value="">1990</option>
                                    <option value="">1991</option>
                                    <option value="">1992</option>
                                    <option value="">1993</option>
                                    <option value="">1994</option>
                                    <option value="">1995</option>
                                    <option value="">1996</option>
                                    <option value="">1997</option>
                                    <option value="">1998</option>
                                    <option value="">1999</option>
                                    <option value="">2000</option>
                                    <option value="">2001</option>
                                    <option value="">2002</option>
                                    <option value="">2003</option>
                                    <option value="">2004</option>
                                    <option value="">2005</option>
                                    <option value="">2006</option>
                                    <option value="">2007</option>
                                    <option value="">2008</option>
                                    <option value="">2009</option>
                                    <option value="">2010</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td class="label"><label for="">Địa chỉ</label></td>
                                <td>
                                    <input type="text" placeholder="Nhập địa chỉ" <?=$diachi?>>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button>Lưu</button></td>
                            </tr>
                            </table>
                            
                    </div>
                    <div class="capnhat-right">
                    <img id="img-preview" height="80px" src="view/layout/Image/Image-customer.jpg" alt="">
                    <input id="file-input" type="file" name="img" accept="image/*">
                    <script>
                        var input = document.getElementById("file-input");
                        var image = document.getElementById("img-preview");

                        input.addEventListener("change", (e) => {
                            if (e.target.files.length) {
                                const src = URL.createObjectURL(e.target.files[0]);
                                image.src = src;
                            }
                        });
                    </script>
                        <p>Dụng lượng file tối đa <br>1 MB
                            Định dạng:.JPEG, .PNG</p>
                    </div>
                </div>
            </section>
            <section class="capnhat donhang" style="display:none;">
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
                                <th>Mã khách hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                if(isset($donhang)){
                                    foreach ($donhang as $item) {
                                        extract($item);
                                        echo '<tr>
                                        <td>'.$i.'</td>
                                        <td>'.$ma_donhang.'</td>
                                        <td>'.$iduser.'</td>
                                        <td>'.$ngaylap.'</td>
                                        <td>'.$trangthai.'</td>
                                        <td><a href="index.php?pg=xemdonhang&id='.$id.'">Xem</a>/<a>Hủy</a></td>
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