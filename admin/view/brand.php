<section class="capnhat">
    <div class="capnhat-top">
        <div class="search-big">
            <h2>Thương hiệu</h2>
            <div class="search">
                <form action="index.php?pg=searchbrand" method="post">
                    <input type="text" name="inpbrand" placeholder="Tìm kiếm">
                    <button id='butsearch' name="btnbrand" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>                    
        <hr>
    </div>
    <div class="sanpham">
    <a href="index.php?pg=addbrandform"><button>Thêm mới<i class="fas fa-plus"></i></button></a>
        <table border="1">
            <thead>
                <th>Stt</th>
                <th>Tên</th>
                <th>Logo</th>
                <th>Thao tác</th>
            </thead>
            <tbody>
                <?php
                    $j=1;
                    foreach ($brand as $item) {
                        extract($item);
                        $hinh='../'.PATH_IMG.$logo;
                        if(is_file($hinh)){
                            $img='<img style="margin-top: 10px;" height="80px" src="'.$hinh.'">';
                        }else{
                            $img='';
                        }
                        $strbrand= '<tr>
                            <td>'.$j.'</td>
                            <td>'.$name.'</td>
                            <td>'.$img.'</td>
                            <td><a href="index.php?pg=brandform&id='.$id.'">Sửa/</a><a href="index.php?pg=delbrand&id='.$id.'">Xóa</a></td>
                        </tr>';
                        echo $strbrand;
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
    menu[4].style.backgroundColor='white';
</script>