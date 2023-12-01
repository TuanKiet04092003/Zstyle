<?php
    session_start();
    ob_start();
    include_once "../model/connectdb.php";
    include_once "../model/user.php";
    include_once "../model/product.php";
    
    if(isset($_POST['login'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $_SESSION['role']=getlogin($user,$pass)['role'];
        if(getlogin($user,$pass)['role']==1) 
            header('location: index.php');
        else
            header('location: login.php'); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/layout/login.css">
    <link rel="stylesheet" href="view/layout/Homepage.css">
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
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div class="boxlogin">
        <img src="../upload/Logo.png" alt="">
        <form class="formlogin" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <h1>Tên đăng nhập</h1>
            <input type="text" name="user" placeholder="Nhập tên đăng nhập">
            <h1>Mật khẩu</h1>
            <div class="matkhau">
                <input type="password" name="pass" placeholder="Nhập mật khẩu">
                <i onclick="anmatkhau()" class="fas fa-eye hien"></i>
            </div> 
            <button type="submit" name="login">Đăng nhập</button>
        </form>
    </div>
    <script>
        function anmatkhau(){
            document.getElementsByClassName('hien')[0].classList.toggle('fa-eye-slash');
            if(document.getElementsByClassName('matkhau')[0].getElementsByTagName('input')[0].type=='password')
                document.getElementsByClassName('matkhau')[0].getElementsByTagName('input')[0].type='text';
            else
                document.getElementsByClassName('matkhau')[0].getElementsByTagName('input')[0].type='password';
        }
    </script>
</body>
</html>