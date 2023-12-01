<div class="container" id="blur">
        <div class="title">
            <h1>Đăng nhập</h1>
            <img class="title-left" src="view/layout/Image/image-news6.png" alt="">
            <img class="title-right" src="view/layout/Image/Product2.png" alt="">
        </div>
        <form action="index.php?pg=login" method="post">
        <article class="layout-login">
            <div class="img-login">
            </div>
            <section class="form-login">
                <center>
                    <img src="view/layout/Image/Logo.png" alt="">
                    <h1>Welcome to back!</h1>
                    <p>Đăng nhập vào tài khoản của bạn</p>
                </center>
                <label for="">Tài khoản</label><br>
                <input name="username" class="input-long" type="text" placeholder="Nhập tài khoản"><br>
                <?php
                    if(isset($username) && $username==''){
                        echo '<p style="color:red;">* Bạn chưa nhập tên đăng nhập</p>';
                    }else{
                        if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']==-1){
                            echo '<p style="color:red;">* Tên đăng nhập hoặc mật khẩu không đúng</p>';
                        }
                    }
                    
                ?>
                <label for="">Mật khẩu</label><br>
                <input name="password" class="input-long" type="password" placeholder="Nhập mật khẩu"><br>
                <?php
                    if(isset($password) && $password==''){
                        echo '<p style="color:red;">* Bạn chưa nhập mật khẩu</p>';
                    }else{
                        if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']==-1){
                            echo '<p style="color:red;">* Tên đăng nhập hoặc mật khẩu không đúng</p>';
                        }
                    }
                ?>
                <div class="layout-pass">
                    <div>
                        <input class="icon-rem" type="checkbox">
                        <label class="remember-pass" for="">Nhớ mặt khẩu</label>
                    </div>
                    <button name="login" type="submit" class="btn-login" onclick="successful()">Đăng nhập</button>
                </div>
                <h3>Không có tài khoản? <a href="index.php?pg=register">Đăng lý</a> </h3>
                <h2>Or</h2>
                <div class="icon-login">
                    <i class="facebook fab fa-facebook"></i>
                    <i class="twitter fab fa-twitter	"></i>
                    <i class="google fab fa-google-plus	"></i>
                </div>
            </section>
        </article>
        </form>
    </div>
    <section id="abc" class="checkout-success">
        <div class="icon-check">
            <i class="fa fa-check"></i>
        </div>
        <img class="img-logo" src="view/layout/Image/Logo.png" alt="">
        <h1>Đăng nhập thành công</h1>
        <p>Cảm ơn quý khách đã đăng ký</p>
        <a href="Chechout.html"><button onclick="after_successful()">Ok</button></a>
    </section>
    <script>
        var box = document.getElementById('abc');
        var blur = document.getElementById('blur');
        function successful() {
            if (document.getElementsByClassName('input-long')[0].value == '') {
                document.getElementById('error-account').innerHTML = '* Bạn chưa nhập tên tài khoản<br>';
                document.getElementById('error-account').style.color = 'red';
            } else {
                document.getElementById('error-account').innerHTML = '';
            }
            if (document.getElementsByClassName('input-long')[1].value == '') {
                document.getElementById('error-password').innerHTML = '* Bạn chưa nhập mật khẩu<br>';
                document.getElementById('error-password').style.color = 'red';
            } else {
                document.getElementById('error-password').innerHTML = '';
            }
            if (document.getElementsByClassName('input-long')[0].value != '' && document.getElementsByClassName('input-long')[1].value != '') {
                box.style.top = '200px';
                box.style.transition = '1s'
                blur.classList.toggle('active');
                localStorage.setItem('login',true);
            }
        }
        function after_successful() {
            box.style.top = '-235px';
            blur.classList.toggle('active');
        }
    </script>