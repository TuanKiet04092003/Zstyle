<section class="capnhat">
    <div class="capnhat-top">
        <div class="search-big">
            <h2>Bình luận</h2>
            <div class="search">
                <form action="index.php?pg=searchcomment" method="post">
                    <input type="text" name="inpcomment" placeholder="Tìm kiếm">
                    <button id='butsearch' name="btncomment" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>                    
        <hr>
    </div>
    <div class="sanpham">
    <a href="index.php?pg=addcommentform"><button>Thêm mới<i class="fas fa-plus"></i></button></a>
        <table border="1">
            <thead>
                <th>Stt</th>
                <th>ID sản phẩm</th>
                <th>ID khách hàng</th>
                <th>Thời gian</th>
                <th>Nội dung</th>
                <th>Đánh giá</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($comment as $item) {
                        $strcomment='';
                        extract($item);
                        $strcomment= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$id_product.'</td>
                            <td>'.$id_user.'</td>
                            <td>'.$thoigian.'</td>
                            <td>'.$noidung.'</td>
                            <td>';
                            for($i=1;$i<=$rate;$i++){
                                $strcomment.='<i style="color:orange" class="fa fa-star star1"></i>';
                            }
                            for($i=$rate;$i<5;$i++){
                                $strcomment.='<i style="color:black" class="fa fa-star star1"></i>';
                            }
                            $strcomment.='</td>
                            <td><a href="index.php?pg=commentform&id='.$id.'">Sửa/</a><a href="index.php?pg=delcomment&id='.$id.'">Xóa</a></td>
                        </tr>';
                        echo $strcomment;
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
    menu[3].style.backgroundColor='white';
</script>