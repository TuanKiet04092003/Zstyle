<section class="capnhat">
    <div class="capnhat-top">
        <div class="search-big">
            <h2>Danh mục</h2>
            <div class="search">
                <form action="index.php?pg=searchcatalog" method="post">
                    <input type="text" name="inpcatalog" placeholder="Tìm kiếm">
                    <button id='butsearch' name="btncatalog" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>                    
        <hr>
    </div>
    <div class="sanpham">
    <a href="index.php?pg=addcatalogform"><button>Thêm mới<i class="fas fa-plus"></i></button></a>
        <table border="1">
            <thead>
                <th>Stt</th>
                <th>Tên</th>
                <th>Stt hiển thị</th>
                <th>Hiển thị tại trang chủ</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($catalog as $item) {
                        extract($item);
                        $strcatalog= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$name.'</td>
                            <td>'.$stt.'</td>
                            <td>'.$home.'</td>
                            <td><a href="index.php?pg=catalogform&id='.$id.'">Sửa/</a><a href="index.php?pg=delcatalog&id='.$id.'">Xóa</a></td>
                        </tr>';
                        echo $strcatalog;
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
    menu[2].style.backgroundColor='white';
</script>