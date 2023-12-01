<?php
$html_cart = '';
foreach ($cart as $item) {
    extract($item);
    if (check_img_admin($img) == '') {
        $img = check_img_admin('user.webp');
    } else {
        $img = check_img_admin($img);
    }
    $html_cart .= '<tr>
        <td>' . $id_user . '</td>
        <td >' . $img . '</td>
        <td>' . number_format($price, 0, '.', ',') . '</td>
        <td>' . $soluong . '</td>
        <td>' . number_format($thanhtien, 0, '.', ',') . '</td>
        <td>' . $id_size . '</td>
        <td>' . $id_color . '</td>
        <td>
            
            <a href="index.php?pg=delcart&id=' . $id . '" class="del" style="padding: 0px">Xóa</a>
        </td>
        </tr>';
    // $active = '';
    $iduser = '';
    $img = '';
    $price = '';
    $soluong = '';
    $thanhtien = '';
    $size = '';
    $color = '';


    $img = 'user.webp';

    $hinhcu = '';
    if (isset($_SESSION['update_id']) && $_SESSION['update_id']) {
        $active = 'active';
        if (isset($user_detail)) {
            extract($user_detail);
            if ($role == 1) {
                $role = 'Quản trị viên';
            } else {
                $role = 'Khách hàng';
            }
            if ($kichhoat == 1) {
                $kichhoat = 'Kích hoạt';
            } else {
                $kichhoat = 'Bị khóa';
            }
            if ($gioitinh == 0) {
                $gioitinh = 'Khác';
            } else {
                if ($gioitinh == 1) {
                    $gioitinh = 'Nam';
                } else {
                    $gioitinh = 'Nữ';
                }
            }
            $hinhcu = $img;
            if ($img == '') {
                $img = 'user.webp';
            }
        }
    }
}
?>


<div class="dashboard-content"
    data-tab="6">

    <div class="modal modal-addpro">
        <div class="modal-overlay">
        </div>
        <div
            class="modal-content modal-addproduct">
            <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
            <div class="modal-main">
                <form
                    action="index.php?pg=addcart"
                    method="post"
                    enctype="multipart/form-data">
                    <div
                        class="modal-heading">
                        Thêm sản phẩm
                        mới</div>
                    <div
                        class="modal-form modal-form-addpro">
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Mã khách
                                hàng
                            </div>
                            <input
                                name="id_user"
                                type="text" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Hình ảnh
                            </div>
                            <div
                                class='input-image'>
                                <input
                                    id="file-input2"
                                    name="img2"
                                    type="file"
                                    accept="image/*" />
                                <?= substr_replace(check_img_admin($img), ' id="img-preview2" ', 5, 0) ?>
                            </div>
                        </div>
                        <input
                            type="hidden"
                            name="hinhcu"
                            value="<?= $hinhcu ?>">
                        <script>
                            var input2 = document.getElementById("file-input2");
                            var image2 = document.getElementById("img-preview2");

                            input2.addEventListener("change", (e) => {
                                if (e.target.files.length) {
                                    const src = URL.createObjectURL(e.target.files[0]);
                                    image2.src = src;
                                }
                            });
                        </script>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Giá
                            </div>
                            <input
                                name="price"
                                type="text" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Số lượng
                            </div>
                            <input
                                name="soluong"
                                type="text" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Thành
                                tiền
                            </div>
                            <input
                                name="thanhtien"
                                type="text" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Size
                            </div>
                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="1">
                                        Khác
                                    </div>
                                    <input
                                        name="size"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="Khác"
                                        dropdown="1" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="1"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="1">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Khác
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        1
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Color
                            </div>
                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="2">
                                        Khác
                                    </div>
                                    <input
                                        name="color"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="Khác"
                                        dropdown="2" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="2"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="2">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Khác
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        1
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            var input = document.getElementById("file-input1");
                            var image = document.getElementById("img-preview1");

                            input.addEventListener("change", (e) => {
                                if (e.target.files.length) {
                                    const src = URL.createObjectURL(e.target.files[0]);
                                    image.src = src;
                                }
                            });
                        </script>


                    </div>
                    <div
                        class="modal-btn">
                        <button
                            name="btnsave"
                            class="modal-button">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="dashboard-heading">
        <h2 class="title-primary">Giỏ
            hàng</h2>
       
    </div>

    <div
        class="modal modal-update <?= $active ?>">
        <div class="modal-overlay">
        </div>
        <div class="modal-content">
            <a
                href="index.php?pg=updateuser&close=1">
                <span
                    class="modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </a>
            <div class="modal-main">
                <form
                    action="index.php?pg=updateuser"
                    method="post"
                    enctype="multipart/form-data">
                    <div
                        class="modal-heading">
                        Cập nhật danh
                        mục</div>
                    <div
                        class="modal-form  modal-form-addpro">
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Họ tên*
                            </div>
                            <input
                                name="name"
                                type="text"
                                value="<?= $name ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Tên đăng
                                nhập*
                            </div>
                            <input
                                name="user"
                                type="text"
                                value="<?= $user ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Mật
                                khẩu*
                            </div>
                            <input
                                name="pass"
                                type="text"
                                value="<?= $pass ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Email
                            </div>
                            <input
                                name="email"
                                type="text"
                                value="<?= $email ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Số điện
                                thoại
                            </div>
                            <input
                                name="sdt"
                                type="text"
                                value="<?= $sdt ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Giới
                                tính
                            </div>

                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="4">
                                        <?= $gioitinh ?>
                                    </div>
                                    <input
                                        name="gioitinh"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="<?= $gioitinh ?>"
                                        dropdown="4" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="4"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="4">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Khác
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Nam
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Nữ
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Ngày
                                sinh
                            </div>
                            <input
                                name="ngaysinh"
                                type="date"
                                value="<?= $ngaysinh ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Địa chỉ
                            </div>
                            <input
                                name="diachi"
                                type="text"
                                value="<?= $diachi ?>" />
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Hình ảnh
                            </div>
                            <div
                                class='input-image'>
                                <input
                                    id="file-input1"
                                    name="img1"
                                    type="file"
                                    accept="image/*" />
                                <?= substr_replace(check_img_admin('user.webp'), ' id="img-preview1" ', 5, 0) ?>
                            </div>
                        </div>
                        <input
                            type="hidden"
                            name="hinhcu"
                            value="<?= $hinhcu ?>">
                        <script>
                            var input2 = document.getElementById("file-input2");
                            var image2 = document.getElementById("img-preview2");

                            input2.addEventListener("change", (e) => {
                                if (e.target.files.length) {
                                    const src = URL.createObjectURL(e.target.files[0]);
                                    image2.src = src;
                                }
                            });
                        </script>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Vai trò
                            </div>

                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="5">
                                        <?= $role ?>
                                    </div>
                                    <input
                                        name="role"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="<?= $role ?>"
                                        dropdown="5" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="5"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="5">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Khách
                                        hàng
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Quản
                                        trị
                                        viên
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="modal-form-item">
                            <div
                                class="modal-form-name">
                                Kích
                                hoạt
                            </div>

                            <div
                                class="dropdown">
                                <div
                                    class="dropdown-select">
                                    <div class="dropdown-content"
                                        dropdown="6">
                                        <?= $kichhoat ?>
                                    </div>
                                    <input
                                        name="kichhoat"
                                        type="hidden"
                                        class="dropdown-input"
                                        value="<?= $kichhoat ?>"
                                        dropdown="6" />
                                    <i class="fa fa-angle-down dropdown-icon icon1"
                                        aria-hidden="true"
                                        dropdown="6"
                                        onclick="dropdown(this)"></i>
                                </div>
                                <div class="dropdown-list active"
                                    dropdown="6">
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Kích
                                        hoạt
                                    </div>
                                    <div class="dropdown-item"
                                        onclick="select(this)">
                                        Bị
                                        khóa
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="modal-btn">
                        <button
                            name="btnupdate"
                            class="modal-button">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table class="product">
        <thead>
            <tr>
                <th>Mã khách hàng</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Size</th>
                <th>Color</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?= $html_cart; ?>

        </tbody>
    </table>
</div>