<?php
  session_start();
  ob_start();
  if($_SESSION['role']!=1){
    header('location: ../../index.php');
  }
   

    include_once "../../model/connectdb.php";
    include_once "../../model/product.php";
    include_once "../../model/catalog.php";
    include_once "../../model/detail.php";
    include_once "../../model/cart.php";
    include_once "../../model/user.php";
    include_once "../../model/donhang.php";
    include_once "../../model/giamgia.php";
    include_once "../../model/comment.php";
    include_once "../../model/global.php";

   
   include_once "header.php";
   if(isset($_GET['pg'])&&($_GET['pg']!="")){
      $pg=$_GET['pg'];
      switch ($pg) {
         case 'catalog':
            $catalog=getcatalog();
            include_once "catalog.php";
            break;

          case 'addcatalog':
            if(isset($_POST['btnsave'])){
              $stt=$_POST['stt'];
              $name=$_POST['name'];
              $sethome=$_POST['sethome'];
              if($sethome=='Hiển thị'){
                $sethome=1;
              }else{
                $sethome=0;
              }
              add_catalog($name, $stt,  $sethome);
            }
            $catalog=getcatalog();
            include_once "catalog.php";
            break;

          case 'updatecatalog':
            if(isset($_GET['id']) && $_GET['id']){
              $_SESSION['update_id']=$_GET['id'];
              $catalogdetail=getcatalogdetail($_SESSION['update_id']);
            }
            if(isset($_GET['close']) && $_GET['close']){
              unset($_SESSION['update_id']);
            }
            if(isset($_POST['btnupdate'])){
              $stt=$_POST['stt'];
              $name=$_POST['name'];
              $sethome=$_POST['sethome'];
              if($sethome=='Hiển thị'){
                $sethome=1;
              }else{
                $sethome=0;
              }
              if(isset($_SESSION['update_id'])){
                update_catalog($_SESSION['update_id'], $name, $stt, $sethome);
                unset($_SESSION['update_id']);
              }    
            }
            $catalog=getcatalog();
            include_once 'catalog.php';
            break;
          case 'delcatalog':
            if(isset($_GET['id']) && $_GET['id']){
              delcatalog($_GET['id']);
            }
            $catalog=getcatalog();
            include_once 'catalog.php';
            break;
          case 'product':
            $product=getproduct();
            $catalog=getcatalog();
            include_once 'product.php';
            break;
          case 'addproduct':
            if(isset($_POST['btnsave'])){
              $ma_sanpham=$_POST['ma_sanpham'];
              $name=$_POST['name'];
              $price=$_POST['price'];
              $priceold=$_POST['priceold'];
              $chitiet=$_POST['chitiet'];
              $hot=$_POST['hot'];
              $noibat=$_POST['noibat'];
              $gioitinh=$_POST['gioitinh'];
              $idcatalog=$_POST['idcatalog'];
              $bestsell=$_POST['bestsell'];
              $trend=$_POST['trend'];
              $view=$_POST['view'];
              if($hot=='Có'){
                $hot=1;
              }else{
                $hot=0;
              }
              if($noibat=='Có'){
                $noibat=1;
              }else{
                $noibat=0;
              }
              if($bestsell=='Có'){
                $bestsell=1;
              }else{
                $bestsell=0;
              }
              if($trend=='Có'){
                $trend=1;
              }else{
                $trend=0;
              }
              if($gioitinh=='Unisex'){
                $gioitinh=0;
              }else{
                if($gioitinh=='Nam'){
                  $gioitinh=1;
                }else{
                  $gioitinh=2;
                }
              }
              $catalog=getcatalog();
              foreach ($catalog as $item) {
                if($idcatalog==$item['name']){
                  $idcatalog=$item['id'];
                  break;
                }
              }
              add_product($ma_sanpham,$name,$price,$priceold,$hot,$noibat,$gioitinh,$idcatalog,$chitiet,$bestsell,$trend,$view);
            }
            $product=getproduct();
            $catalog=getcatalog();
            include_once "product.php";
            break;
          case 'updateproduct':
            if(isset($_GET['id']) && $_GET['id']){
              $_SESSION['update_id']=$_GET['id'];
              $product_detail=getproductdetail($_SESSION['update_id']);
              $catalog_product=getcatalogdetail($product_detail['idcatalog']);
            }
            if(isset($_GET['close']) && $_GET['close']){
              unset($_SESSION['update_id']);
            }
            if(isset($_POST['btnupdate'])){
              $ma_sanpham=$_POST['ma_sanpham'];
              $name=$_POST['name'];
              $price=$_POST['price'];
              $priceold=$_POST['priceold'];
              $chitiet=$_POST['chitiet'];
              $hot=$_POST['hot'];
              $noibat=$_POST['noibat'];
              $gioitinh=$_POST['gioitinh'];
              $idcatalog=$_POST['idcatalog'];
              $bestsell=$_POST['bestsell'];
              $trend=$_POST['trend'];
              $view=$_POST['view'];
              if($hot=='Có'){
                $hot=1;
              }else{
                $hot=0;
              }
              if($noibat=='Có'){
                $noibat=1;
              }else{
                $noibat=0;
              }
              if($bestsell=='Có'){
                $bestsell=1;
              }else{
                $bestsell=0;
              }
              if($trend=='Có'){
                $trend=1;
              }else{
                $trend=0;
              }
              if($gioitinh=='Unisex'){
                $gioitinh=0;
              }else{
                if($gioitinh=='Nam'){
                  $gioitinh=1;
                }else{
                  $gioitinh=2;
                }
              }
              $catalog=getcatalog();
              foreach ($catalog as $item) {
                if($idcatalog==$item['name']){
                  $idcatalog=$item['id'];
                  break;
                }
              }
              if(isset($_SESSION['update_id'])){
                update_product($_SESSION['update_id'],$ma_sanpham,$name,$price,$priceold,$hot,$noibat,$gioitinh,$idcatalog,$chitiet,$bestsell,$trend,$view);
                unset($_SESSION['update_id']);
              }    
            }
            $product=getproduct();
            $catalog=getcatalog();
            include_once 'product.php';
            break;
          case 'delproduct':
            if(isset($_GET['id']) && $_GET['id']){
              delproduct($_GET['id']);
            }
            $product=getproduct();
            $catalog=getcatalog();
            include_once 'product.php';
            break;
          case 'user':
            $user=getusertable();
            include_once 'user.php';
            break;
          case 'adduser':
            if(isset($_POST['btnsave'])){
              $name=$_POST['name'];
              $user=$_POST['user'];
              $pass=$_POST['pass'];
              $email=$_POST['email'];
              $sdt=$_POST['sdt'];
              $gioitinh=$_POST['gioitinh'];
              $ngaysinh=$_POST['ngaysinh'];
              $diachi=$_POST['diachi'];
              $role=$_POST['role'];
              $kichhoat=$_POST['kichhoat'];
              if($gioitinh=='Khác'){
                $gioitinh=0;
              }else{
                if($gioitinh=='Nam'){
                  $gioitinh=1;
                }else{
                  $gioitinh=2;
                }
              }
              if($role=='Khách hàng'){
                $role=0;
              }else{
                $role=1;
              }
              if($kichhoat=='Kích hoạt'){
                $kichhoat=1;
              }else{
                $kichhoat=0;
              }
              $img=$_FILES['img1']['name'];
              if($img!=''){
                $target_file = PATH_IMG_ADMIN . basename($img);
                move_uploaded_file($_FILES['img1']["tmp_name"], $target_file);
              }
              creatuser($user,$pass, $name,$email,$sdt,$gioitinh,$ngaysinh,$diachi,$role,$img,$kichhoat);
            }
            $user=getusertable();
            include_once "user.php";
            break;
          case 'updateuser':
            if(isset($_GET['id']) && $_GET['id']){
              $_SESSION['update_id']=$_GET['id'];
              $user_detail=getuser($_SESSION['update_id']);
            }
            if(isset($_GET['close']) && $_GET['close']){
              unset($_SESSION['update_id']);
            }
            if(isset($_POST['btnupdate'])){
              $name=$_POST['name'];
              $user=$_POST['user'];
              $pass=$_POST['pass'];
              $email=$_POST['email'];
              $sdt=$_POST['sdt'];
              $gioitinh=$_POST['gioitinh'];
              $ngaysinh=$_POST['ngaysinh'];
              $diachi=$_POST['diachi'];
              $role=$_POST['role'];
              $kichhoat=$_POST['kichhoat'];
              if($gioitinh=='Khác'){
                $gioitinh=0;
              }else{
                if($gioitinh=='Nam'){
                  $gioitinh=1;
                }else{
                  $gioitinh=2;
                }
              }
              if($role=='Khách hàng'){
                $role=0;
              }else{
                $role=1;
              }
              if($kichhoat=='Kích hoạt'){
                $kichhoat=1;
              }else{
                $kichhoat=0;
              }
              $img=$_FILES['img2']['name'];
              if($img!=''){
                $target_file = PATH_IMG_ADMIN . basename($img);
                move_uploaded_file($_FILES['img2']["tmp_name"], $target_file);
                if($_POST['hinhcu']!=''){
                    $hinhcu=PATH_IMG_ADMIN.$_POST['hinhcu'];
                    delimghost($hinhcu);
                }
              }
              if(isset($_SESSION['update_id'])){
                update_user($_SESSION['update_id'],$user,$pass, $name,$email,$sdt,$gioitinh,$ngaysinh,$diachi,$role,$img,$kichhoat);
                unset($_SESSION['update_id']);
              }    
            }
            $user=getusertable();
            include_once 'user.php';
            break;
          case 'deluser':
            if(isset($_GET['id']) && $_GET['id']){
              $id=$_GET['id'];
              if(getuser($id)['img']!=''){
                $img_file=PATH_IMG_ADMIN.getuser($id)['img'];
                delimghost($img_file);
             }
              deluser($_GET['id']);
            }
            $user=getusertable();
            include_once 'user.php';
            break;
          case 'cart':
            $cart = getcarttable();
            include_once 'cart.php';
            break;
          case 'delcart':
            if (isset($_GET['id']) && $_GET['id']) {
              $id_user = $_GET['id'];
      
              del_cart($_GET['id']);
            }
            $cart = getcarttable();
            include_once 'cart.php';
            break;
          case 'donhang':
              $donhang = getdonhangtable();
              include_once 'donhang.php';
              break;
              case 'deldonhang':
                if (isset($_GET['id']) && $_GET['id']) {
                  $id_donhang = $_GET['id'];
                  
                  // del_cart($_GET['id']);
                  deldonhang($_GET['id']);
                }
                $donhang = getdonhangtable();
                include_once 'donhang.php';
                break;
              case 'binhluan':
                $binhluan = getcomment();
                include_once 'binhluan.php';
                break;
              case 'delbinhluan':
                if (isset($_GET['id']) && $_GET['id']) {
                  $id_user = $_GET['id'];
                  delcomment($_GET['id']);
                }
                $binhluan = getcomment();
                include_once 'binhluan.php';
                break;
              case 'logout':
                unset($_SESSION['loginuser']);
                unset($_SESSION['role']);
                unset($_SESSION['iduser']);
                header('location: index.php');
                break;
         default:
            
            include_once "dashboard.php";
            break;
      }
   }else{
        
        include_once "dashboard.php";
      
   }

    include_once "footer.php";
?>

            
            
  

        
