<section class="capnhat">
    <div class="capnhat-top">
        <h2>Cập nhật thông tin thương hiệu</h2>
        <hr>
    </div>
    <?php
        extract($detail);
        echo '<form action="index.php?pg=updatebrand" method="post" class="layoutform" enctype="multipart/form-data">
        <input type="hidden" name="hinhcu" value="'.$logo.'">
        <input type="hidden" name="id" value="'.$id.'">
        <h1>Tên thương hiệu</h1>
        <input type="text" name="name" value="'.$name.'">
        <h1>Hình ảnh thương hiệu</h1>
        <input id="file-input" type="file" name="img" accept="image/*">
        <p></p>
        <img id="img-preview" height="80px" src="../upload/'.$logo.'" alt="">
        <script>
            var input = document.getElementById("file-input");
            var image = document.getElementById("img-preview");

            input.addEventListener("change", (e) => {
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.src = src;
                }
            });
        </script>
        <button name="btnupdate" type="submit">Cập nhật</button>
    </form>';
    ?>
</section>