<section class="capnhat">
    <div class="capnhat-top">
        <h2>Thêm sản phẩm</h2>
        <hr>
    </div>
    <?php
        $strbrand='';
        foreach ($brand as $item) {
            if(1==$item['id']){
                $strbrand.='<option selected>'.$item['name'].'</option>';
            }else{
                $strbrand.='<option>'.$item['name'].'</option>';
            }
        }
        $strcatalog='';
        foreach ($catalog as $item) {
            if(1==$item['id']){
                $strcatalog.='<option selected>'.$item['name'].'</option>';
            }else{
                $strcatalog.='<option>'.$item['name'].'</option>';
            }
        }
        
        echo '<form action="index.php?pg=addproduct" method="post" class="layoutform" enctype="multipart/form-data">
        <h1>Danh mục</h1>
        <select name="catalog">
            '.$strcatalog.'
        </select>
        <h1>Thương hiệu</h1>
        <select name="brand">
            '.$strbrand.'
        </select>
        <h1>Tên sản phẩm</h1>
        <input type="text" name="name">
        <h1>Hình ảnh sản phẩm</h1>
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
        <h1>Thịnh hành</h1>
        <div class="checkbox">
        <input type="checkbox" name="hot">
        </div>
        <h1>Bán chạy</h1>
        <div class="checkbox">
        <input type="checkbox" name="bestsale">
        </div>
        <h1>Sản phẩm mới</h1>
        <div class="checkbox">
            <input type="checkbox" name="new">
        </div>
        <h1>Nổi bật</h1>
        <div class="checkbox">
            <input type="checkbox" name="noibat">
        </div>
        <h1>Đánh giá</h1>
        <input type="text" name="rate">
        <h1>Giá</h1>
        <input type="text" name="price">
        <h1>Giá cũ</h1>
        <input type="text" name="priceold">
        <h1>Mô tả</h1>
        <textarea name="mota"  cols="100" rows="3"></textarea>
        <h1>Chi tiết</h1>
        <textarea name="chitiet" id="" cols="100" rows="10"></textarea>
        <p></p>
        <button name="btnadd" type="submit">Thêm mới</button>
    </form>';
    ?>
</section>