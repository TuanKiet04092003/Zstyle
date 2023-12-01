<section class="capnhat">
    <div class="capnhat-top">
        <h2>Cập nhật thông tin bình luận</h2>
        <hr>
    </div>
    <?php
        extract($detail);
        echo '<form action="index.php?pg=updatecomment" method="post" class="layoutform" enctype="multipart/form-data">
        <input type="hidden" name="id" value="'.$id.'">
        <h1>ID sản phẩm</h1>
        <input type="text" name="id_product" value='.$id_product.'>
        <h1>ID khách hàng</h1>
        <input type="text" name="id_user" value='.$id_user.'>
        <h1>Thời gian</h1>
        <input type="text" name="thoigian" value='.$thoigian.'>
        <h1>Nội dung</h1>
        <input type="text" name="noidung" value='.$noidung.'>
        <h1>Đánh giá</h1>
        <input type="text" name="rate" value='.$rate.'>
        <button name="btnupdate" type="submit">Cập nhật</button>
    </form>';
    ?>
</section>