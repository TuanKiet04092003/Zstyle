<section class="capnhat">
    <div class="capnhat-top">
        <h2>Thêm thương hiệu</h2>
        <hr>
    </div>
    <?php
        echo '<form action="index.php?pg=addbrand" method="post" class="layoutform" enctype="multipart/form-data">
        <h1>Tên thương hiệu</h1>
        <input type="text" name="name">
        <h1>Logo thương hiệu</h1>
        <input id="file-input" type="file" name="img" accept="image/*">
        <p></p>
        <img id="img-preview" height="80px" src="../upload/logo.png" alt="">
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
        <button name="btnadd" type="submit">Thêm mới</button>
    </form>';
    ?>
</section>