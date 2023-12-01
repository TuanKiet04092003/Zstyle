<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/layout/Homepage.css">
    <link rel="shortcut icon" href="../upload/Logo.png">

    <link rel="stylesheet" href="view/layout/admin.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Alice:regular"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <title>My Account</title>
    
</head>
<body>
        <article class="taikhoan-layout">
            <aside class="left-menu">
                <div class="taikhoan"> 
                    <img src="../upload/Image-customer.jpg" alt="">
                    <p>dotuankiet</p>
                </div>
                <hr>
                <a href="index.php"><p class="hienthi tag" onclick="active(this)"><i class="fa fa-dashboard"></i>Thông tin truy cập</p></a>
                <a href="index.php?pg=product"><p class="tag" onclick="active(this)"><i class="fab fa-product-hunt"></i>Sản phẩm</p></a>
                <a href="index.php?pg=catalog"><p class="tag" onclick="active(this)"><i class="fas fa-clipboard-list"></i>Danh mục</p></a>
                <a href="index.php?pg=comment"><p class="tag" onclick="active(this)"><i class="fas fa-comment-dots"></i>Bình luận</p></a>
                <a href="index.php?pg=brand"><p class="tag" onclick="active(this)"><i class="fas fa-building"></i>Thương hiệu</p></a>
                <a href="index.php?pg=user"><p class="tag" onclick="active(this)"><i class="fas fa-users"></i>Khách hàng</p></a>
                <a href="index.php?pg=donhang"><p class="tag" onclick="active(this)"><i class="fas fa-shopping-bag"></i>Đơn hàng</p></a>
                <a href="index.php?pg=logout"><p class="dangxuat tag"><i class="fas fa-sign-out-alt"></i>Đăng xuất</p></a>
            </aside>

            <script>
                var menu=document.getElementsByClassName('tag');
                function active(a){
                    for(let i=0;i<menu.length;i++){
                        menu[i].style.backgroundColor='#FBF2F2';
                    }
                    a.style.backgroundColor='white';
                    document.getElementsByClassName('capnhat-top')[0].children[0].innerHTML=a.innerHTML;
                    var layout=document.getElementsByClassName('capnhat')[0].children;
                    layout.splice(0,1);
                }

            </script>