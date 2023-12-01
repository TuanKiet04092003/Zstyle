<div class="container" id="blur">
        <div class="title">
            <h1>Đăng ký</h1>
            <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
            <img class="title-right" src="view/layout/Image/Product2.png" alt="">
        </div>
        <article class="layout-login">
            <div class="img-login">
            </div>
            <section class="form-login">
                <center>
                    <img src="view/layout/Image/Logo.png" alt="">
                <h1>Welcome to Luxury!</h1>
                <p>Đăng ký tài khoản để có trải nghiệm tốt hơn</p>
                </center>   
                <form action="index.php?pg=dangkyuser" method="post">
                <label for="">Tên đăng nhập</label><br>
                <input name="username" class="input-long" type="text" placeholder="Nhập tên đăng nhập" value=<?=$username?>><br>
                <?php
                if(isset($_POST['btndangky'])){
                    if(isset($username) && $username==''){
                        echo '<p style="color:red;">* Bạn chưa nhập tên đăng nhập</p>';
                    }else{
                        if(isset($ktusername) && $ktusername==1){
                            echo '<p style="color:red;">* Tên đăng nhập đã tồn tại</p>';
                        }
                    }
                }
                ?>
                <label for="">Email</label><br>
                <input name="email" class="input-long" type="email" placeholder="Nhập email" value=<?=$email?>><br>
                <?php
                if(isset($_POST['btndangky'])){
                    if(isset($email) && $email==''){
                        echo '<p style="color:red;">* Bạn chưa nhập email</p>';
                    }else{
                        if(isset($ktemail) && $ktemail==1){
                            echo '<p style="color:red;">* Email đã tồn tại</p>';
                        }
                    }
                }
                ?>
                <label for="">Tạo mật khẩu</label><br>
                <input name="password" class="input-long" type="password" placeholder="Tạo mật khẩu" value=<?=$password?>><br>
                <?php
                if(isset($_POST['btndangky'])){
                    if(isset($password) && $password==''){
                        echo '<p style="color:red;">* Bạn chưa nhập mật khẩu</p>';
                    }else{
                        if(isset($password) && strlen($password)<4){
                            echo '<p style="color:red;">* Mật khẩu phải có ít nhất 4 ký tự</p>';
                        }
                    }
                }
                ?>
                <button type="submit" name="btndangky" class="btn-register">Đăng ký</button>
                </form>
                <h2>Or</h2>
                <div class="icon-login">
                    <i class="facebook fab fa-facebook"></i>
                    <i class="twitter fab fa-twitter	"></i>
                    <i class="google fab fa-google-plus	"></i>
                </div>
            </section>
        </article>
    </div>
    <section id="abc" class="checkout-success">
        <div class="icon-check">
            <i class="fa fa-check"></i>
        </div>
        <img class="img-logo" src="view/layout/Image/Logo.png" alt="">
        <h1>Đăng ký thành công</h1>
        <p>Cảm ơn quý khách đã đăng ký</p>
        <a href="index.php?pg=login"><button onclick="after_successful()">Ok</button></a>
    </section>
    <script>
        var box=document.getElementById('abc');
        var blur=document.getElementById('blur');
        function successful(){
            box.style.top='200px';
            box.style.transition='1s'
            blur.classList.toggle('active');
        }
        function after_successful(){
            box.style.top='-235px';
            blur.classList.toggle('active');
        }
    </script>