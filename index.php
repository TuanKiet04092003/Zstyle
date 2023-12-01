<?php
   session_start();
   ob_start();

    include_once "model/connectdb.php";
    include_once "model/product.php";
    include_once "model/catalog.php";
    include_once "model/detail.php";
    include_once "model/cart.php";
    include_once "model/user.php";
    include_once "model/donhang.php";
    include_once "model/giamgia.php";
    include_once "model/comment.php";
    include_once "model/global.php";
    include_once "model/design.php";
    include_once "model/soluongtonkho.php";
 

   
   include_once "view/header.php";
   if(isset($_GET['pg'])&&($_GET['pg']!="")){
      $pg=$_GET['pg'];
      switch ($pg) {
         case 'product':
            $catalog=getcatalog();
            if(isset($_GET['ind']) && $_GET['ind']){
               $ind=$_GET['ind'];
               $catalog_pick=getcatalogdetail($ind);
            }else{
               $ind=0;
            }
            $product=getproduct_catalog($ind);
            if(isset($_POST['btn_search'])){
               $product=searchproduct($_POST['search']);
            }
            include_once "view/product.php";
            break;

         case 'design':
            if(isset($_POST['onlyaddcart'])){
               if(isset($_SESSION['product_checkout']) && !isset($_SESSION['giohang'])){
                  $_SESSION['giohang']=[];
                  $_SESSION['giohang']=$_SESSION['product_checkout'];
                  unset($_SESSION['product_checkout']);
               }else{
                  if(isset($_SESSION['product_checkout']) && isset($_SESSION['giohang'])){
                     $_SESSION['giohang']=array_merge($_SESSION['product_checkout'], $_SESSION['giohang']);
                     unset($_SESSION['product_checkout']);
                  }
               }
               $product_design_user=getproductdesignuser($_POST['id_design']);
               $sp=["id"=>1,"img"=>$product_design_user['img_front'] ,"name"=>'Áo thun tự thiết kế' ,"price"=>300000 ,"color"=>getcolor($product_design_user['id_color']),"size"=>getsize($product_design_user['id_size']),"soluong"=>1,"product_design"=>1,"id_product_design"=>$product_design_user['id']];
               $_SESSION['giohang'][]=$sp;
               add_cart($_SESSION['iduser'], 1, 1, 1, 300000,300000,$product_design_user['img_front'],$product_design_user['id_color'],$product_design_user['id_size'],1,$_POST['id_design']);
            }
            if(isset($_POST['design_upload'])){
               $img=$_FILES['img_design']['name'];
               if($img!=''){
                 $target_file = PATH_IMG . basename($img);
                 move_uploaded_file($_FILES['img_design']["tmp_name"], $target_file);
               }
               add_img_design($img, $_SESSION['iduser']);
            }
            if(isset($_GET['id_color']) && $_GET['id_color']){
               $_SESSION['id_color_design']=$_GET['id_color'];
            }
            if(isset($_GET['id_size']) && $_GET['id_size']){
               $_SESSION['id_size_design']=$_GET['id_size'];
            }
            if(isset($_POST['save_btn']) && isset($_SESSION['iduser']) && isset($_SESSION['role']) && isset($_SESSION['img_front']) &&  $_SESSION['role']==0){
               add_design($_SESSION['id_color_design'], $_SESSION['id_size_design'], $_SESSION['img_front'], $_SESSION['img_back'],200000,'Áo thun tự thiết kế', $_SESSION['iduser']);
               unset($_SESSION['id_color_design']);
               unset($_SESSION['id_size_design']);
               unset($_SESSION['img_front']);
               unset($_SESSION['img_back']);
            }
            if(isset($_POST['addcart_btn_con']) && isset($_SESSION['iduser']) && isset($_SESSION['img_front']) && isset($_SESSION['role']) &&  $_SESSION['role']==0){
               add_design($_SESSION['id_color_design'], $_SESSION['id_size_design'], $_SESSION['img_front'], $_SESSION['img_back'],300000,'Áo thun tự thiết kế', $_SESSION['iduser']);
               $sp=["id"=>1,"img"=>$_SESSION['img_front'] ,"name"=>'Áo thun tự thiết kế' ,"price"=>300000 ,"color"=>getcolor($_SESSION['id_color_design']),"size"=>getsize($_SESSION['id_size_design']),"soluong"=>1,"product_design"=>1,"id_product_design"=>getnewdesign()['id']];
               add_cart($_SESSION['iduser'], 1, 1, $sp['soluong'], $sp['price'],$sp['soluong']*$sp['price'],$sp['img'],$_SESSION['id_color_design'],$_SESSION['id_size_design'],1,getnewdesign()['id']);
               $_SESSION['giohang'][]=$sp;
               unset($_SESSION['id_color_design']);
               unset($_SESSION['id_size_design']);
               unset($_SESSION['img_front']);
               unset($_SESSION['img_back']);
            }
            if(isset($_POST['addcart_btn_cart']) && isset($_SESSION['iduser']) && isset($_SESSION['img_front']) && isset($_SESSION['role']) &&  $_SESSION['role']==0){
               add_design($_SESSION['id_color_design'], $_SESSION['id_size_design'], $_SESSION['img_front'], $_SESSION['img_back'],300000,'Áo thun tự thiết kế', $_SESSION['iduser']);
               $sp=["id"=>1,"img"=>$_SESSION['img_front'] ,"name"=>'Áo thun tự thiết kế' ,"price"=>300000 ,"color"=>getcolor($_SESSION['id_color_design']),"size"=>getsize($_SESSION['id_size_design']),"soluong"=>1,"product_design"=>1,"id_product_design"=>getnewdesign()['id']];
               add_cart($_SESSION['iduser'], 1, 1, $sp['soluong'], $sp['price'],$sp['soluong']*$sp['price'],$sp['img'],$_SESSION['id_color_design'],$_SESSION['id_size_design'],1,getnewdesign()['id']);
               $_SESSION['giohang'][]=$sp;
               unset($_SESSION['id_color_design']);
               unset($_SESSION['id_size_design']);
               unset($_SESSION['img_front']);
               unset($_SESSION['img_back']);
               header('location: index.php?pg=cart');
            }
            if(isset($_SESSION['iduser']) && isset($_SESSION['role']) && $_SESSION['role']==0){
               $product_design=getproductdesign($_SESSION['iduser']);
            }
            if(isset($_SESSION['iduser'])){
               $img_design_user=getimgdesignuser($_SESSION['iduser']);
            }
            $img_design=getimgdesign();
            $list_color=getlistcolor(1);
            $imgproduct=getlistimgcolor(1);
            $list_size=getlistsize();
            if(!isset($_SESSION['id_color_design'])){
               $_SESSION['id_color_design']=$list_color[0]['id'];
            }
            if(!isset($_SESSION['id_size_design'])){
               $_SESSION['id_size_design']=$list_size[0]['id'];
            }
            include_once "view/design.php";
            break;
         case 'detail':
            if(isset($_GET['id']) && ($_GET['id']>0)){
               $idsp=$_GET['id'];
               $detail=getproductdetail($idsp);
               extract($detail);
               $idcatalog=getidcatalog($idsp);
               $idsp=intval($idsp);
               $splienquan=getrelatedproduct($idsp,$idcatalog);
               $list_color=getlistcolor($id);
               $imgproduct=getlistimgcolor($id);
               $list_size=getlistsize();
               $idcatalog=getidcatalog($idsp);
               $idsp=intval($idsp);
               $splienquan=getrelatedproduct($idsp,$idcatalog);
               $listcomment=get_comment_product($idsp,1000);
               $listsoluongtonkho=getsoluongtonkho($idsp);
               tangluotview($idsp, $detail['view']+1);
            }else{
               header('location: index.php');
            }  
            include_once "view/detail.php";   
            break;
         case 'cart':  
            if(isset($_SESSION['product_checkout']) && !isset($_SESSION['giohang'])){
               $_SESSION['giohang']=[];
               $_SESSION['giohang']=$_SESSION['product_checkout'];
               unset($_SESSION['product_checkout']);
            }else{
               if(isset($_SESSION['product_checkout']) && isset($_SESSION['giohang'])){
                  unset($_SESSION['giohang']);
                  $_SESSION['giohang']=[];
                  $_SESSION['giohang']=$_SESSION['product_checkout'];
                  unset($_SESSION['product_checkout']);
               }
            }
            if(!isset($_SESSION['giohang'])){
               $_SESSION['giohang']=[];
            }   
            if(isset($_POST['soluongmoi'])){
               $soluong=$_POST['soluongmoi'];
               $ind=$_POST['ind'];
               if($soluong==0)
                  array_splice($_SESSION['giohang'],$ind,1);
               else
                  $_SESSION['giohang'][$ind]['soluong']=$soluong;
               header('location: index.php?pg=cart');
            }
            if(isset($_GET['delcart']) && ($_GET['delcart']==true)){
               unset($_SESSION['giohang']);
               header('location: index.php?pg=cart');
            }
            if(isset($_GET['id']) && ($_GET['id']>=0)){
               array_splice($_SESSION['giohang'],$_GET['id'],1);
               header('location: index.php?pg=cart');
            }
            include_once "view/cart.php";
            break;
         case 'addtocart':
            if(isset($_SESSION['product_checkout']) && !isset($_SESSION['giohang'])){
               $_SESSION['giohang']=[];
               $_SESSION['giohang']=$_SESSION['product_checkout'];
               unset($_SESSION['product_checkout']);
            }else{
               if(isset($_SESSION['product_checkout']) && isset($_SESSION['giohang']) && count($_SESSION['product_checkout'])>0){
                  unset($_SESSION['giohang']);
                  $_SESSION['giohang']=[];
                  $_SESSION['giohang']=$_SESSION['product_checkout'];
                  unset($_SESSION['product_checkout']);
               }else{
                  if(isset($_SESSION['product_checkout']) && isset($_SESSION['giohang']) && count($_SESSION['product_checkout'])==0){
                     unset($_SESSION['giohang']);
                     unset($_SESSION['product_checkout']);
                  }
               }
            }
            if(!isset($_SESSION['giohang'])){
               $_SESSION['giohang']=[];
            }
            if(isset($_POST['addtocart'])){
               $id=$_POST['id'];
               $color=$_POST['color'];
               $size=$_POST['size'];
               $img=$_POST['img'];
               $name=$_POST['name'];
               $price=$_POST['price'];
               $soluong=$_POST['soluong'];
               $sp=["id"=>$id,"img"=>$img ,"name"=>$name ,"price"=>$price ,"color"=>$color,"size"=>$size,"soluong"=>$soluong, "product_design"=>0,"id_product_design"=>1];
               $i=0;
               $kt=true;
               foreach ($_SESSION['giohang'] as $item) {
                  if($sp['id']==$item['id'] && $sp['img']==$item['img'] && $sp['name']==$item['name'] && $sp['price']==$item['price'] && $sp['color']==$item['color'] && $sp['size']==$item['size']){
                     $_SESSION['giohang'][$i]['soluong']+=$sp['soluong'];
                     $kt=false;
                     break;
                  }
                  $i++;
               }
               if($kt==true)
               $_SESSION['giohang'][]=$sp;
               header('location: index.php?pg=cart');
            }
            break;
         case 'checkout':
            if(isset($_POST['btndetailcheckout'])){
               $id=$_POST['id_checkout'];
               $soluong=$_POST['soluong_checkout'];
               if(!isset($_SESSION['giohang'])){
                  $_SESSION['giohang']=[];
               }
               $_SESSION['product_checkout']=[];
               $_SESSION['product_checkout']=$_SESSION['giohang'];
               unset($_SESSION['giohang']);
               $spdetail=getproductdetail($id);
               
               $sp=["id"=>$id,"img"=> getlistimgcolor($id)[0]['main_img'],"name"=>$spdetail['name'] ,"price"=>$spdetail['price'] ,"color"=>getcolor(getlistimgcolor($id)[0]['id_color']),"size"=>getlistsize()[0]['ma_size'],"soluong"=>$soluong,"product_design"=>0,"id_product_design"=>1];
               $_SESSION['giohang'][]=$sp;
            }
            if(isset($_GET['id']) && $_GET['id']){
               if(!isset($_SESSION['giohang'])){
                  $_SESSION['giohang']=[];
               }
               $id=$_GET['id'];
               $_SESSION['product_checkout']=[];
               $_SESSION['product_checkout']=$_SESSION['giohang'];
               unset($_SESSION['giohang']);
               $spdetail=getproductdetail($id);
               
               $sp=["id"=>$id,"img"=> getlistimgcolor($id)[0]['main_img'],"name"=>$spdetail['name'] ,"price"=>$spdetail['price'] ,"color"=>getcolor(getlistimgcolor($id)[0]['id_color']),"size"=>getlistsize()[0]['ma_size'],"soluong"=>1,"product_design"=>0,"id_product_design"=>1];
               $_SESSION['giohang'][]=$sp;
            }
            if(!isset($_SESSION['giamgia'])){
               $_SESSION['giamgia']=0;
            }
            if(isset($_POST['btngiamgia'])){
               $_SESSION['btngiamgia']=1;
               $_SESSION['name']=$_POST['tendat'];
               $_SESSION['email']=$_POST['emaildat'];
               $_SESSION['sdt']=$_POST['sdtdat'];
               $_SESSION['diachi']=$_POST['diachidat'];
               $_SESSION['phuongthuc']=$_POST['phuongthuc'];
                  $_SESSION['namenhan']=$_POST['tennhan'];
                  $_SESSION['emailnhan']=$_POST['emailnhan'];
                  $_SESSION['sdtnhan']=$_POST['sdtnhan'];
                  $_SESSION['diachinhan']=$_POST['diachinhan'];
               if(isset($_POST['tocdo']) && $_POST['tocdo']){
                  $_SESSION['giaohangnhanh']=1;
               }else{
                  $_SESSION['giaohangnhanh']=0;
               }
               if(is_array(getvoucher($_POST['magiamgia']))){
                  if(isset($_SESSION['iduser']) && is_array(getdadung_voucher(getvoucher($_POST['magiamgia'])['id'], $_SESSION['iduser']))){

                  }else{
                     $_SESSION['giamgia']=getvoucher($_POST['magiamgia'])['giamgia'];
                     $_SESSION['id_voucher']=getvoucher($_POST['magiamgia'])['id'];
                  }
               }
            }
            if(isset($_SESSION['iduser']) && $_SESSION['iduser']){
               $cart=getcartuser($_SESSION['iduser']);
               foreach ($cart as $item) {
                  extract($item);
                  del_cart($id);
            }
            }
            if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']==0 && isset($_SESSION['role']) && $_SESSION['role']==0){
               $idusercu=getidusercu($_SESSION['username'],$_SESSION['password']);
               $user=getuser($idusercu);
               if(isset($_SESSION['giohang']) && isset($_SESSION['iduser']) && count($_SESSION['giohang'])>0){
                  $tongtien=0;
                  $_SESSION['id_cart']=[];
                  foreach ($_SESSION['giohang'] as $item) {
                     extract($item);
                     $tongtien+=$soluong*$price;
                     $id=intval($id);
                     if($product_design==0){
                        add_cart($_SESSION['iduser'], 1, $id, $soluong, $price,$soluong*$price,$img,getidsize($size),getidcolor($color),0,1);
                     }else{
                        add_cart($_SESSION['iduser'], 1, 1, $soluong, $price,$soluong*$price,$img,getidsize($size),getidcolor($color),1,$id_product_design);
                     }
                     array_push($_SESSION['id_cart'],getidcartmoi());
                  }
               }
               if(isset($_POST['thanhtoan'])){
                  $tendat=$_POST['tendat'];
                  $emaildat=$_POST['emaildat'];
                  $sdtdat=$_POST['sdtdat'];
                  $diachidat=$_POST['diachidat'];
                  $phuongthuc=$_POST['phuongthuc'];
                  $date = date('Y-m-d');
                  if(isset($_POST['tocdo']) && $_POST['tocdo']){
                     $giaohangnhanh=1;
                  }else{
                     $giaohangnhanh=0;
                  }
                  if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']>0){
                     $id_voucher=$_SESSION['id_voucher'];
                     add_dadung_voucher($id_voucher,$_SESSION['iduser']);
                  }else{
                     $id_voucher=1;
                  }
                  if(isset($_POST['emailnhan']) && $_POST['emailnhan']!=''){
                     $tennhan=$_POST['tennhan'];
                     $emailnhan=$_POST['emailnhan'];
                     $sdtnhan=$_POST['sdtnhan'];
                     $diachinhan=$_POST['diachinhan'];
                     creatdonhang(getidusercu($_SESSION['username'],$_SESSION['password']), createma_donhang(),$date,'Chưa thanh toán',($tongtien*(100-$_SESSION['giamgia'])/100),$tendat,$tennhan,$emaildat,$emailnhan,$sdtdat,$sdtnhan,$diachidat,$diachinhan,$phuongthuc,$giaohangnhanh,$id_voucher);
                  }else{
                     creatdonhang(getidusercu($_SESSION['username'],$_SESSION['password']), createma_donhang(),$date,'Chưa thanh toán',($tongtien*(100-$_SESSION['giamgia'])/100),$tendat,'',$emaildat,'',$sdtdat,'',$diachidat,'',$phuongthuc,$giaohangnhanh,$id_voucher);
                  }
                  if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']>0){
                     unset($_SESSION['id_voucher']);
                     unset($_SESSION['giamgia']);
                  }
                  $iddonhang=getiddonhang();
                  if(isset($_SESSION['id_cart']) && isset($_SESSION['iduser']) && count($_SESSION['id_cart'])>0){
                     foreach ($_SESSION['id_cart'] as $item) {
                        update_cart_ma_donhang($item,$iddonhang);
                        extract(getcartthanhtoan($item));
                        $soluongkho=getsoluongtonkhothat($id_product,$id_color,$id_size);
                        update_soluongtonkho($id_product,$id_color,$id_size,$soluongkho-$soluong);
                     }
                     
                  }
                  unset($_SESSION['giohang']);
                  // header('location: index.php?pg=account');
               }
            }else{
               if(isset($_POST['thanhtoan']) && isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){          
                  $tendat=$_POST['tendat'];
                  $emaildat=$_POST['emaildat'];
                  $sdtdat=$_POST['sdtdat'];
                  $diachidat=$_POST['diachidat'];
                  $phuongthuc=$_POST['phuongthuc'];
                  $date = date('Y-m-d');
                  if(isset($_POST['tocdo']) && $_POST['tocdo']){
                     $giaohangnhanh=1;
                  }else{
                     $giaohangnhanh=0;
                  }
                  $_SESSION['username']=creatusername($emaildat);
                  $_SESSION['password']=creatpass();
                  creatuser($_SESSION['username'],$_SESSION['password'], $tendat,$emaildat,$sdtdat,0,'',$diachidat,0,'',1);
                  $_SESSION['iduser']=getidusercu($_SESSION['username'],$_SESSION['password']);
                  $_SESSION['loginuser']=0;
                  $_SESSION['role']=getrole($_SESSION['username'],$_SESSION['password']);
                  $tongtien=0;
                  foreach ($_SESSION['giohang'] as $item) {
                     extract($item);
                     $tongtien+=$soluong*$price;
                  }
                  if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']>0){
                     $id_voucher=$_SESSION['id_voucher'];
                     add_dadung_voucher($id_voucher,$_SESSION['iduser']);
                  }else{
                     $id_voucher=1;
                  }
                  if(isset($_POST['emailnhan']) && $_POST['emailnhan']!=''){
                     $tennhan=$_POST['tennhan'];
                     $emailnhan=$_POST['emailnhan'];
                     $sdtnhan=$_POST['sdtnhan'];
                     $diachinhan=$_POST['diachinhan'];
                     creatdonhang(getidusercu($_SESSION['username'],$_SESSION['password']), createma_donhang(),$date,'Chưa thanh toán',($tongtien*(100-$_SESSION['giamgia'])/100),$tendat,$tennhan,$emaildat,$emailnhan,$sdtdat,$sdtnhan,$diachidat,$diachinhan,$phuongthuc,$giaohangnhanh,$id_voucher);
                  }else{
                     creatdonhang(getidusercu($_SESSION['username'],$_SESSION['password']), createma_donhang(),$date,'Chưa thanh toán',($tongtien*(100-$_SESSION['giamgia'])/100),$tendat,'',$emaildat,'',$sdtdat,'',$diachidat,'',$phuongthuc,$giaohangnhanh,$id_voucher);
                  }
                  $iddonhang=getiddonhang();
                  foreach ($_SESSION['giohang'] as $item) {
                     extract($item);
                     $tongtien+=$soluong*$price;
                     $id=intval($id);
                     if($product_design==0){
                        add_cart($_SESSION['iduser'], $iddonhang, $id, $soluong, $price,$soluong*$price,$img,getidsize($size),getidcolor($color),0,1);
                        $id_color=getidcolor($color);
                        $id_size=getidsize($size);
                        $soluongkho=getsoluongtonkhothat($id,$id_color,$id_size);
                        update_soluongtonkho($id,$id_color,$id_size,$soluongkho-$soluong);
                     }else{
                        add_cart($_SESSION['iduser'], $iddonhang, 1, $soluong, $price,$soluong*$price,$img,getidsize($size),getidcolor($color),1,$id_product_design);
                     }
                  }
                  if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']>0){
                     unset($_SESSION['id_voucher']);
                     unset($_SESSION['giamgia']);
                  }
                  unset($_SESSION['giohang']);
                  // header('location: index.php?pg=account');
               }

            }
            include_once "view/checkout.php";
            break;
         case 'login':
            if(isset($_POST['login'])){
               $username=$_POST['username'];
               $password=$_POST['password'];
               if(is_array(getlogin($username,$password)) && getrole($username,$password)==0){
                  $_SESSION['username']=$username;
                  $_SESSION['password']=$password;
                  $_SESSION['iduser']=getlogin($username,$password)['id'];
                  $_SESSION['loginuser']=0;
                  $_SESSION['role']=0;
                  $cart=getcartuser($_SESSION['iduser']);
                  foreach ($cart as $item) {
                     extract($item);
                     if($product_design==0){
                        $name=getproductdetail($id_product)['name'];
                        $color=getcolor($id_color);
                        $size=getsize($id_size);
                        $sp=["id"=>$id_product,"img"=>$img ,"name"=>$name ,"price"=>$price ,"color"=>$color,"size"=>$size,"soluong"=>$soluong,"product_design"=>$product_design,"id_product_design"=>$id_product_design];
                     }else{
                        $name=getproductdesigndetail($id_product_design)['name'];
                        $color=getcolor($id_color);
                        $size=getsize($id_size);
                        $sp=["id"=>$id_product,"img"=>$img ,"name"=>$name ,"price"=>$price ,"color"=>$color,"size"=>$size,"soluong"=>$soluong,"product_design"=>$product_design,"id_product_design"=>$id_product_design];

                     }
                     $_SESSION['giohang'][]=$sp;
                  }
                  unset($_SESSION['id_voucher']);
                     unset($_SESSION['giamgia']);
                  header('location: index.php?pg=account');
               }else{
                  if(getrole($username,$password)==1){
                     $_SESSION['role']=1;
                     $_SESSION['loginuser']=0;
                     header('location: view/admin/index.php');
                  }else{
                     $_SESSION['loginuser']=-1;
                  }
                  
               }
            }
            include_once "view/login.php";
            break;
         case 'register':
            if(isset($_POST['btn_register'])){
               $user=$_POST['user'];
               $email=$_POST['email'];
               $pass=$_POST['pass'];
               $repass=$_POST['repass'];
               creatuser($user,$pass, '',$email,'','','','',0,'',1);
               header('location: index.php?pg=login');
            }
            include_once "view/register.php";
            break;
         case 'comment':
            $_SESSION['err_comment']=0;
            if(isset($_POST['send'])){
               $id_product=$_POST['id_product'];

               if(isset($_SESSION['loginuser']) && isset($_SESSION['role']) && $_SESSION['role']==0){
                  if(is_array(getdonhang($_SESSION['iduser'])) && count(getdonhang($_SESSION['iduser']))>0){
                     $rate=$_POST['rate'];
                     $comment=$_POST['comment'];                
                     add_comment($id_product, $_SESSION['iduser'], $comment, $rate);
                     $_SESSION['err_comment']=0;
                  }else{
                     $_SESSION['err_comment']=2;
                  }             
               }else{
                  $_SESSION['err_comment']=1;
               }
               header('location: index.php?pg=detail&id='.$id_product);
            }
            break;
         case 'about':
            include_once "view/about.php";
            break;
         case 'contact':
            include_once "view/contact.php";
            break;
         case 'news':
            include_once "view/news.php";
            break;
         case 'account':
            if(isset($_SESSION['loginuser']) && isset($_SESSION['role']) && $_SESSION['loginuser']==0 && $_SESSION['role']==0){
               if(isset($_POST['update_account'])){
                  $name=$_POST['name'];
                  $user=$_POST['user'];
                  $email=$_POST['email'];
                  $pass=$_POST['pass'];
                  $sdt=$_POST['sdt'];
                  $ngaysinh=$_POST['ngaysinh'];
                  $diachi=$_POST['diachi'];
                  $img=$_FILES['img']['name'];
                  if($img!=''){
                     $target_file = PATH_IMG . basename($img);
                     move_uploaded_file($_FILES['img']["tmp_name"], $target_file);
                     if($_POST['hinhcu']!=''){
                        $hinhcu=PATH_IMG.$_POST['hinhcu'];
                        delimghost($hinhcu);
                     }
                     update_user($_SESSION['iduser'],$user,$pass, $name,$email,$sdt,0,$ngaysinh,$diachi,0,$img,1);
                  }else{
                     update_user($_SESSION['iduser'],$user,$pass, $name,$email,$sdt,0,$ngaysinh,$diachi,0,$_POST['hinhcu'],1);

                  }
               }
               if(isset($_POST['del_account'])){
                  deluser($_SESSION['iduser']);
                  if($_POST['hinhcu']!=''){
                     $hinhcu=PATH_IMG.$_POST['hinhcu'];
                     delimghost($hinhcu);
                  }
               }
               if(isset($_GET['id']) && $_GET['id']){
                  deldonhang($_GET['id']);
               }
               $idusercu=getidusercu($_SESSION['username'],$_SESSION['password']);
               $donhang=getdonhang($idusercu);
               $user=getuser($_SESSION['iduser']);
               $listdonhang=getdonhang($_SESSION['iduser']);
               extract($user);
               
               include_once "view/account.php";
            }else{
               include_once "view/login.php";
            }
            
            break;
         
         case 'logoutuser':

            
            $cart=getcartuser($_SESSION['iduser']);
            foreach ($cart as $item) {
               extract($item);
               $soluongkho=getsoluongtonkhothat($id_product,$id_color,$id_size);
               update_soluongtonkho($id_product,$id_color,$id_size,$soluongkho+$soluong);
               del_cart($id);
            }
            if(isset($_SESSION['giohang']) && isset($_SESSION['iduser']) && count($_SESSION['giohang'])>0){
               foreach ($_SESSION['giohang'] as $item) {
                  extract($item);
                  $id=intval($id);
                  if($product_design==0){
                     add_cart($_SESSION['iduser'], 1, $id, $soluong, $price,$soluong*$price,$img,getidsize($size),getidcolor($color),0,1);
                     $id_color=getidcolor($color);
                     $id_size=getidsize($size);
                     $soluongkho=getsoluongtonkhothat($id,$id_color,$id_size);
                     update_soluongtonkho($id,$id_color,$id_size,$soluongkho-$soluong);
                  }else{
                     add_cart($_SESSION['iduser'], 1, 1, $soluong, $price,$soluong*$price,$img,getidsize($size),getidcolor($color),1,$id_product_design);
                     update_soluongtonkho($id);
                  }
               }
            }
            unset($_SESSION['btngiamgia']);
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['sdt']);
            unset($_SESSION['diachi']);
            unset($_SESSION['namenhan']);
            unset($_SESSION['emailnhan']);
            unset($_SESSION['sdtnhan']);
            unset($_SESSION['diachinhan']);
            unset($_SESSION['phuongthuc']);
            unset($_SESSION['giaohangnhanh']);
            
            unset($_SESSION['giohang']);
            if(isset($_SESSION['loginuser'])){
               unset($_SESSION['loginuser']);
               unset($_SESSION['role']);
               unset($_SESSION['iduser']);
            }
            if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']){
               unset($_SESSION['id_voucher']);
               unset($_SESSION['giamgia']);
            }
            header('location: index.php');
            break;
         default:
            $product_noibat=getproduct_noibat(4);
            $product_hot=getproduct_hot(2);
            $product_topview=getproduct_topview(3);
            $product_trend=getproduct_trend(3);
            $product_bestsell=getproduct_bestsell(3);
            $catalog_home=getcatalog_home();
            include_once "view/home.php";
            break;
      }
   }else{
        $product_noibat=getproduct_noibat(4);
        $product_hot=getproduct_hot(2);
        $product_topview=getproduct_topview(3);
        $product_trend=getproduct_trend(3);
        $product_bestsell=getproduct_bestsell(3);
        $catalog_home=getcatalog_home();
        include_once "view/home.php";
      
   }

    include_once "view/footer.php";
?>