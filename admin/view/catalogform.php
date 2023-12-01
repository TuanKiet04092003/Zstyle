<section class="capnhat">
    <div class="capnhat-top">
        <h2>Cập nhật thông tin danh mục</h2>
        <hr>
    </div>
    <?php
        extract($detail);
        if($home==1){
            $strhome='checked';
        }else{
            $strhome='';
        }
        echo '<form action="index.php?pg=updatecatalog" method="post" class="layoutform" enctype="multipart/form-data">
        <input type="hidden" name="id" value="'.$id.'">
        <h1>Tên danh mục</h1>
        <input type="text" name="name" value="'.$name.'">
        <h1>Stt hiển thị</h1>
        <input type="text" name="stt" value='.$stt.'>
        <h1>Hiển thị tại trang chủ</h1>
        <div class="checkbox">
        <input type="checkbox" name="home" '.$strhome.'>
        </div>
        <h1>Mô tả</h1>
        <input type="text" name="mota" value="'.$mota.'">
        <button name="btnupdate" type="submit">Cập nhật</button>
    </form>';
    ?>
</section>