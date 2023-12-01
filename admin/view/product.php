<section class="capnhat">
    <div class="capnhat-top">
        <div class="search-big">
            <h2>Sản phẩm</h2>
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
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Thịnh hành</th>
                <th>Mới</th>
                <th>Nổi bật</th>
                <th>Đánh giá</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($product as $item) {
                        extract($item);
                        $hinh='../'.PATH_IMG.$img;
                        if(is_file($hinh)){
                            $img='<img style="margin-top: 10px;" height="80px" src="'.$hinh.'">';
                        }else{
                            $img='';
                        }
                        if($hot==1){
                            $strhot='X';
                        }else{
                            $strhot='';
                        }
                        if($new==1){
                            $strnew='X';
                        }else{
                            $strnew='';
                        }
                        if($noibat==1){
                            $strnoibat='X';
                        }else{
                            $strnoibat='';
                        }
                        $strproduct= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$name.'</td>
                            <td>'.$img.'</td>
                            <td>'.number_format($price,2,".",",").'</td>
                            <td>'.$strhot.'</td>
                            <td>'.$strnew.'</td>
                            <td>'.$strnoibat.'</td>
                            <td>';
                            for($i=1;$i<=$rate;$i++){
                                $strproduct.='<i style="color:orange" class="fa fa-star star1"></i>';
                            }
                            for($i=$rate;$i<5;$i++){
                                $strproduct.='<i style="color:black" class="fa fa-star star1"></i>';
                            }
                            $strproduct.='</td>
                            <td><a href="index.php?pg=productform&id='.$id.'">Sửa/</a><a href="index.php?pg=delproduct&id='.$id.'">Xóa</a></td>
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
    menu[1].style.backgroundColor='white';
</script>