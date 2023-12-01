<section class="capnhat">
    <div class="capnhat-top">
        <div class="search-big">
            <h2>Đơn hàng</h2>
            <div class="search">
                <form action="index.php?pg=searchproduct" method="post">
                <input type="text" name="inpproduct" placeholder="Tìm kiếm">
                <button id='butsearch' name="btnproduct" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>                    
        <hr>
    </div>
    <div class="sanpham">
    <a href="index.php?pg=addproductform"><button>Thêm mới<i class="fas fa-plus"></i></button></a>
        <table border="1">
            <thead>
                <th>Stt</th>
                <th>Người đặt</th>
                <th>Người nhận</th>
                <th>Email đặt</th>
                <th>Email nhận</th>
                <th>Địa chỉ người nhận</th>
                <th>Trạng thái</th>
                <th>Phương thức TT</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($donhang as $item) {
                        extract($item);
                        $strproduct= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$tendat.'</td>
                            <td>'.$tennhan.'</td>
                            <td>'.$emaildat.'</td>
                            <td>'.$emailnhan.'</td>
                            <td>'.$diachinhan.'</td>
                            <td>'.$trangthai.'</td>
                            <td>'.$ptthanhtoan.'</td>
                            <td><a href="">Sửa</a>/<a href="">Xóa</a></td>
                        </tr>';
                        echo $strproduct;
                        $j++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>
<script>
    var menu=document.getElementsByClassName('tag');
    for(let i=0;i<menu.length;i++){
        menu[i].style.backgroundColor='#FBF2F2';
    }
    menu[6].style.backgroundColor='white';
</script>