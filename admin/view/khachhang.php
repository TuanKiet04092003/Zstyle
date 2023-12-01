<section class="capnhat">
    <div class="capnhat-top">
        <div class="search-big">
            <h2>Khách hàng</h2>
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
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Tên</th>
                <th>Email</th>
                <th>SDT</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Quyền</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($user as $item) {
                        extract($item);
                        $strproduct= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$user.'</td>
                            <td>'.$pass.'</td>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$sdt.'</td>
                            <td>'.$gioitinh.'</td>
                            <td>'.$ngaysinh.'</td>
                            <td>'.$diachi.'</td>
                            <td>'.$role.'</td>
                            <td><a href="">Sửa/</a><a href="">Xóa</a></td>
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
    menu[5].style.backgroundColor='white';
</script>