<section class="capnhat">
    <div class="capnhat-top">
        <h2>Thêm bình luận</h2>
        <hr>
    </div>
    <?php
        echo '<form action="index.php?pg=addcomment" method="post" class="layoutform" enctype="multipart/form-data">
        <h1>ID sản phẩm</h1>
        <input type="text" name="id_product">
        <h1>ID khách hàng</h1>
        <input type="text" name="id_user">
        <h1>Nội dung</h1>
        <input type="text" name="noidung">
        <h1>Đánh giá</h1>
        <input type="text" name="rate">
        <button name="btnadd" type="submit">Thêm mới</button>
    </form>';
    ?>
</section>