<section class="capnhat">
    <div class="capnhat-top">
        <h2>Thêm danh mục</h2>
        <hr>
    </div>
    <?php
        echo '<form action="index.php?pg=addcatalog" method="post" class="layoutform" enctype="multipart/form-data">
        <h1>Tên danh mục</h1>
        <input type="text" name="name">
        <h1>Stt hiển thị</h1>
        <input type="text" name="stt">
        <h1>Hiển thị tại trang chủ</h1>
        <div class="checkbox">
        <input type="checkbox" name="home">
        </div>
        <h1>Mô tả</h1>
        <input type="text" name="mota">
        <button name="btnadd" type="submit">Thêm mới</button>
    </form>';
    ?>
</section>