<?php
   session_start();
   ob_start();

    include_once "model/connectdb.php";
    include_once "model/product.php";
    include_once "model/brand.php";
    include_once "model/cart.php";
    include_once "model/global.php";
    include_once "model/user.php";
    include_once "model/catalog.php";
    include_once "model/donhang.php";
    include_once "model/comment.php";
    include_once "model/giamgia.php";

   
   include_once "view/header.php";
   if(isset($_GET['pg'])&&($_GET['pg']!="")){
      $pg=$_GET['pg'];
      switch ($pg) {
         case 'products':
            $brand=getbrand(20);
            $catalogs=getcatalog();
            if(isset($_GET['ind']) && $_GET['ind']){
               $ind=$_GET['ind'];
               $catalog=getcatalogdetail($ind);
            }else{
               $ind=0;
            }
            $products=getproduct_catalog($ind);
            include_once "view/products.php";
            break;
         case 'searchproduct':
            if(isset($_GET['ind']) && $_GET['ind']){
               $ind=$_GET['ind'];
               $catalog=getcatalogdetail($ind);
            }else{
               $ind=0;
            }
            if(isset($_POST['btnproduct'])){
               $kw=$_POST['inpproduct'];
               $products=searchproduct($kw);
            }else{
               $products=getproduct();
            }
            $brand=getbrand(20);
            $catalogs=getcatalog();
            include_once "view/products.php";
            break;
         case 'checkout':
            $cart=getcartuser($_SESSION['iduser']);
            foreach ($cart as $item) {
               extract($item);
               del_cart($id);
            }
            if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']==0){
               $idusercu=getidusercu($_SESSION['username'],$_SESSION['password']);
               $user=getuser($idusercu);
               if(isset($_SESSION['giohang']) && isset($_SESSION['iduser']) && count($_SESSION['giohang'])>0){
                  $tongtien=0;
                  $_SESSION['id_cart']=[];
                  foreach ($_SESSION['giohang'] as $item) {
                     extract($item);
                     $tongtien+=$soluong*$price;
                     add_cart($_SESSION['iduser'], 0, session_id(), $id, $id_product_color, $soluong, $price,$soluong*$price,$img);
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
                  if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']){
                     $id_voucher=$_SESSION['id_voucher'];
                     add_dadung_voucher($id_voucher,$_SESSION['iduser']);
                     unset($_SESSION['id_voucher']);
                     unset($_SESSION['giamgia']);
                  }else{
                     $id_voucher=0;
                  }
                  if(isset($_POST['emailnhan']) && $_POST['emailnhan']!=''){
                     $tennhan=$_POST['tennhan'];
                     $emailnhan=$_POST['emailnhan'];
                     $sdtnhan=$_POST['sdtnhan'];
                     $diachinhan=$_POST['diachinhan'];
                     creatdonhang(getidusercu($_SESSION['username'],$_SESSION['password']), createma_donhang(),$date,'Chưa thanh toán',($tongtien*(100-$_SESSION['giamgia'])/100),$tendat,$tennhan,$emaildat,$emailnhan,$sdtdat,$sdtnhan,$diachidat,$diachinhan,$phuongthuc,$id_voucher);
                  }else{
                     creatdonhang(getidusercu($_SESSION['username'],$_SESSION['password']), createma_donhang(),$date,'Chưa thanh toán',($tongtien*(100-$_SESSION['giamgia'])/100),$tendat,'',$emaildat,'',$sdtdat,'',$diachidat,'',$phuongthuc,$id_voucher);
                  }
                  $iddonhang=getiddonhang();
                  if(isset($_SESSION['id_cart']) && isset($_SESSION['iduser']) && count($_SESSION['id_cart'])>0){
                     foreach ($_SESSION['id_cart'] as $item) {
                        update_cart_ma_donhang($item,$iddonhang);
                     }
                     unset($_SESSION['giohang']);
                     header('location: index.php?pg=myaccount');
                  }
               }
            }else{
               if(isset($_POST['thanhtoan']) && isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){          
                  $tendat=$_POST['tendat'];
                  $emaildat=$_POST['emaildat'];
                  $sdtdat=$_POST['sdtdat'];
                  $diachidat=$_POST['diachidat'];
                  $phuongthuc=$_POST['phuongthuc'];
                  $date = date('Y-m-d');
                  $_SESSION['username']=creatusername($emaildat);
                  $_SESSION['password']=creatpass();
                  creatuser($_SESSION['username'],$_SESSION['password'], $tendat,$emaildat,$sdtdat,0,'',$diachidat,0,'',1);
                  $_SESSION['iduser']=getidusercu($_SESSION['username'],$_SESSION['password']);
                  $_SESSION['loginuser']=0;
                  $tongtien=0;
                  foreach ($_SESSION['giohang'] as $item) {
                     extract($item);
                     $tongtien+=$soluong*$price;
                  }
                  if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']){
                     $id_voucher=$_SESSION['id_voucher'];
                     add_dadung_voucher($id_voucher,$_SESSION['iduser']);
                     unset($_SESSION['id_voucher']);
                     unset($_SESSION['giamgia']);
                  }else{
                     $id_voucher=0;
                  }
                  if(isset($_POST['emailnhan']) && $_POST['emailnhan']!=''){
                     $tennhan=$_POST['tennhan'];
                     $emailnhan=$_POST['emailnhan'];
                     $sdtnhan=$_POST['sdtnhan'];
                     $diachinhan=$_POST['diachinhan'];
                     creatdonhang(getidusercu($_SESSION['username'],$_SESSION['password']), createma_donhang(),$date,'Chưa thanh toán',($tongtien*(100-$_SESSION['giamgia'])/100),$tendat,$tennhan,$emaildat,$emailnhan,$sdtdat,$sdtnhan,$diachidat,$diachinhan,$phuongthuc,$id_voucher);
                  }else{
                     creatdonhang(getidusercu($_SESSION['username'],$_SESSION['password']), createma_donhang(),$date,'Chưa thanh toán',($tongtien*(100-$_SESSION['giamgia'])/100),$tendat,'',$emaildat,'',$sdtdat,'',$diachidat,'',$phuongthuc,$id_voucher);
                  }
                  $iddonhang=getiddonhang();
                  foreach ($_SESSION['giohang'] as $item) {
                     extract($item);
                     add_cart($_SESSION['iduser'], $iddonhang, session_id(), $id, $id_product_color, $soluong, $price,$soluong*$price,$img);
                  }
                  unset($_SESSION['giohang']);
                  header('location: index.php?pg=myaccount');
               }

            }
            include_once "view/checkout.php";
            break;
         case 'addcart':
            if(!isset($_SESSION['giohang'])){
               $_SESSION['giohang']=[];
            }
            if(isset($_POST['addtocart'])){
               $id=$_POST['id'];
               $color=$_POST['color'];
               $id_product_color=getidproductcolor($id, $color);
               $img=$_POST['img'];
               $name=$_POST['name'];
               $price=$_POST['price'];
               $priceold=$_POST['priceold'];
               $rate=$_POST['rate'];
               $soluong=$_POST['soluong'];
               $sp=["id"=>$id, "id_product_color"=>$id_product_color, "img"=>$img ,"name"=>$name ,"price"=>$price ,"priceold"=>$priceold,"soluong"=>$soluong ,"rate"=>$rate];
               $i=0;
               $kt=true;
               foreach ($_SESSION['giohang'] as $item) {
                  if($sp['id']==$item['id']){
                     $_SESSION['giohang'][$i]['soluong']++;
                     $kt=false;
                     break;
                  }
                  $i++;
               }
               if($kt==true)
               $_SESSION['giohang'][]=$sp;
               header('location: index.php?pg=cart');
            }
            // include_once "view/cart.php";
            break;
         case 'cart':
            if(!isset($_SESSION['giohang'])){
               $_SESSION['giohang']=[];
            }
            if(isset($_GET['delcart']) && ($_GET['delcart']==true)){
               unset($_SESSION['giohang']);
            }
            if(isset($_GET['id']) && ($_GET['id']>=0)){
               array_splice($_SESSION['giohang'],$_GET['id'],1);
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
            if(isset($_POST['btngiamgia'])){
               if(is_array(getvoucher($_POST['magiamgia']))){
                  if(isset($_SESSION['iduser']) && is_array(getdadung_voucher(getvoucher($_POST['magiamgia'])['id'], $_SESSION['iduser']))){

                  }else{
                     $_SESSION['giamgia']=getvoucher($_POST['magiamgia'])['giamgia'];
                     $_SESSION['id_voucher']=getvoucher($_POST['magiamgia'])['id'];
                  }
               }
            }
            include_once "view/cart.php";
            break;
         case 'brand':
            $brand=getbrand(200);
            include_once "view/brand.php";
            break;
         // case 'donhang':
         //    include_once "view/donhang.php";
         //    break;
         case 'contact':
            include_once "view/contact.php";
            break;
         case 'detail':
            if(isset($_GET['id']) && ($_GET['id']>0)){
               $idsp=$_GET['id'];
               $detail=getproductdetail($idsp);
               extract($detail);
               if(isset($_GET['red']) && ($_GET['red']>0)){
                  $price=getpriceproductcolor($idsp,'red');
               }
               if(isset($_GET['green']) && ($_GET['green']>0)){
                  $price=getpriceproductcolor($idsp,'green');
               }
               if(isset($_GET['blue']) && ($_GET['blue']>0)){
                  $price=getpriceproductcolor($idsp,'blue');
               }
               if(isset($_GET['black']) && ($_GET['black']>0)){
                  $price=getpriceproductcolor($idsp,'black');
               }
               $idcatalog=getidcatalog($idsp);
               $idsp=intval($idsp);
               $splienquan=getrelatedproduct($idsp,$idcatalog);
            }else{
               header('location: index.php');
            }       
            $comment=get_comment_product($id,10);
            include_once "view/detail.php";
            break;
         case "comment":
            if(isset($_POST['send'])){
               if(!isset($_SESSION['loginuser']) || $_SESSION['loginuser']==-1){
                  header('location: index.php?pg=login');
               }else{
                  $rate=$_POST['rate'];
                  $comment=$_POST['comment'];
                  add_comment($_SESSION['idproduct_comment'], $_SESSION['iduser'], $comment, $rate);
               }            
            }else{
               header('location: index.php');
            }
            $idsp=$_SESSION['idproduct_comment'];
            $detail=getproductdetail($idsp);
            extract($detail);
            $idcatalog=getidcatalog($idsp);
            $idsp=intval($idsp);
            $splienquan=getrelatedproduct($idsp,$idcatalog);
            $comment=get_comment_product($id,10);
            include_once "view/detail.php";
            break;
         case 'detailcolor':
               $idsp=$_GET['id'];
               $detail=getproductdetail($idsp);
               extract($detail);
               $idcatalog=getidcatalog($idsp);
               $idsp=intval($idsp);
               $splienquan=getrelatedproduct($idsp,$idcatalog);
               if(isset($_GET['color']) && ($_GET['color']>0)){
                  $img=getdetailproductcolor($idsp,$_GET['color'])['img'];
                  $price=getpriceproductcolor($idsp,$_GET['color']);
               }   
               $color=$_GET['color'];
            include_once "view/detail.php";
            break;
         case 'login':
            if(isset($_POST['login'])){
               $username=$_POST['username'];
               $password=$_POST['password'];
               if(is_array(getlogin($username,$password))){
                  $_SESSION['username']=$username;
                  $_SESSION['password']=$password;
                  $_SESSION['iduser']=getlogin($username,$password)['id'];
                  $_SESSION['loginuser']=0;
                  $cart=getcartuser($_SESSION['iduser']);
                  foreach ($cart as $item) {
                     extract($item);
                     $name=getproductdetail($id_product)['name'];
                     $priceold=getproductdetail($id_product)['priceold'];
                     $rate=getproductdetail($id_product)['rate'];
                     $sp=["id"=>$id_product, "id_product_color"=>$id_product_color, "img"=>$img ,"name"=>$name ,"price"=>$price_product_color ,"priceold"=>$priceold,"soluong"=>$soluong ,"rate"=>$rate];
                     $_SESSION['giohang'][]=$sp;
                  }
                  unset($_SESSION['id_voucher']);
                     unset($_SESSION['giamgia']);
                  header('location: index.php?pg=myaccount');
               }else{
                  $_SESSION['loginuser']=-1;
               }
            }
            include_once "view/login.php";
            break;
         case 'register':
            $username='';
            $password='';
            $email='';
            include_once "view/register.php";
            break;
         case 'dangkyuser':
            if(isset($_POST['btndangky'])){
               $username=$_POST['username'];
               $password=$_POST['password'];
               $email=$_POST['email'];
               $ktusername=0;
               $ktemail=0;
               $users=getusertable();
               foreach ($users as $item) {
                  if($username==$item['user']){
                     $ktusername=1;
                     break;
                  }
                  if($email==$item['email']){
                     $ktemail=1;
                     break;
                  }
               }
               if($ktusername==0 && $ktemail==0 && strlen($password)>=4){
                  creatuser($username,$password, '',$email,'',0,'','',0,'',1);
                  $_SESSION['username']=$username;
                  $_SESSION['password']=$password;
                  $_SESSION['iduser']=getlogin($username,$password)['id'];
                  $_SESSION['loginuser']=0;
                  header('location: index.php');
               }
            }
            include_once "view/register.php";
            break;
         case 'myaccount':
            if(isset($_SESSION['loginuser']) && $_SESSION['loginuser']==0){
               $idusercu=getidusercu($_SESSION['username'],$_SESSION['password']);
               $donhang=getdonhang($idusercu);
               $user=getuser($_SESSION['iduser']);
               extract($user);
            }
            include_once "view/myaccount.php";
            break;
         case 'xemdonhang':
            if(isset($_GET['id']) && $_GET['id']>0){
               $donhangct=getdonhangct($_GET['id']);
            }
            include_once "view/donhangct.php";
            break;
         case 'logoutuser':

            if(isset($_SESSION['loginuser'])){
               unset($_SESSION['loginuser']);
            }
            if(isset($_SESSION['giamgia']) && $_SESSION['giamgia']){
               unset($_SESSION['id_voucher']);
               unset($_SESSION['giamgia']);
            }
            $cart=getcartuser($_SESSION['iduser']);
            foreach ($cart as $item) {
               extract($item);
               del_cart($id);
            }
            if(isset($_SESSION['giohang']) && isset($_SESSION['iduser']) && count($_SESSION['giohang'])>0){
               foreach ($_SESSION['giohang'] as $item) {
                  extract($item);
                  add_cart($_SESSION['iduser'], 0, session_id(), $id, $id_product_color, $soluong, $price,$soluong*$price,$img);
               }
            }
            unset($_SESSION['giohang']);
            header('location: index.php');
            break;
            
         default:
            include_once "view/home.php";
            break;
      }
   }else{
      $brand_home=getbrand(5);
        $newproduct=getproduct_new(6);
        $hotproduct=getproduct_hot(6);
        $bestsaleproduct=getproduct_bestsale(6);
        $saleproduct=getproduct_sale(6);
        $toprateproduct=getproduct_toprate(3);
         $luxuryproduct=getproduct_luxury(3);
         $noibatproduct=getproduct_noibat(3);
      include_once "view/home.php";
      
   }
   
   if(isset($_GET['pg']) && $_GET['pg']!='' && ($_GET['pg']=='login' || $_GET['pg']=='register')){

   }else{
      include_once "view/footer.php";
   }
?>