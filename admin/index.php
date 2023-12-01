<?php
   session_start();
   ob_start();

    include_once "../model/connectdb.php";
    include_once "../model/product.php";
    include_once "../model/catalog.php";
    include_once "../model/brand.php";
    include_once "../model/cart.php";
    include_once "../model/global.php";
    include_once "../model/user.php";
    include_once "../model/donhang.php";
    include_once "../model/comment.php";

   if($_SESSION['role']==1){
   include_once "view/header.php";
   if(isset($_GET['pg'])&&($_GET['pg']!="")){
      $pg=$_GET['pg'];
      switch ($pg) {
   // -----------Table product
         case 'searchproduct':
            if(isset($_POST['btnproduct'])){
               $kw=$_POST['inpproduct'];
               $product=searchproduct($kw);
            }else{
               $product=getproduct();
            }
            include_once "view/product.php";
            break;
         case 'searchcatalog':
            if(isset($_POST['btncatalog'])){
               $kw=$_POST['inpcatalog'];
               $catalog=searchcatalog($kw);
            }else{
               $catalog=getcatalog();
            }
            include_once "view/catalog.php";
            break;
         case 'searchbrand':
            if(isset($_POST['btnbrand'])){
               $kw=$_POST['inpbrand'];
               $brand=searchbrand($kw);
            }else{
               $brand=getbrand();
            }
            include_once "view/brand.php";
            break;
         case 'product':
            $product=getproduct(100);
            include_once "view/product.php";
            break;
         case 'user':
            $user=getusertable(100);
            include_once "view/khachhang.php";
            break;
         case 'donhang':
            $donhang=getdonhangtable(100);
            include_once "view/donhang.php";
            break;
         case 'productform':
            if(isset($_GET['id']) && ($_GET['id']>0)){
               $brand=getbrand(100);
               $catalog=getcatalog(100);
               $idsp=$_GET['id'];
               $detail=getproductdetail($idsp);
            }else{
               header('location: index.php');
            }
            include_once "view/productform.php";
            break;
         case 'addproductform':
               $brand=getbrand();
               $catalog=getcatalog();
               include_once "view/addproduct.php";
               break;
         case 'addproduct':
            if(isset($_POST['btnadd'])){
               $name=$_POST['name'];
               $rate=$_POST['rate'];
               $price=$_POST['price'];
               $priceold=$_POST['priceold'];
               $brands=getbrand();
               $catalogs=getcatalog();
               $catalog=$_POST['catalog'];
               $brand=$_POST['brand'];
               foreach ($brands as $item) {
                  if($item['name']==$brand){
                     $idbrand=$item['id'];
                     break;
                  }
               }
               
               
               foreach ($catalogs as $item) {
                  if($item['name']==$catalog){
                     $idcatalog=$item['id'];
                     break;
                  }
               }
               $mota=$_POST['mota'];
               $chitiet=$_POST['chitiet'];
               if(isset($_POST['new']) && $_POST['new']){
                  $new=1;
               }else{
                  $new=0;
               }
               if(isset($_POST['hot']) && $_POST['hot']){
                  $hot=1;
               }else{
                  $hot=0;
               }
               if(isset($_POST['bestsale']) && $_POST['bestsale']){
                  $bestsale=1;
               }else{
                  $bestsale=0;
               }
               if(isset($_POST['noibat']) && $_POST['noibat']){
                  $noibat=1;
               }else{
                  $noibat=0;
               }
               $img=$_FILES['img']['name'];
               if($img!=''){
                  $target_file = '../'.PATH_IMG . basename($img);
                  move_uploaded_file($_FILES['img']["tmp_name"], $target_file);
               }
               
               //  echo $id.'_'.$name.'_'.$img.'_'.$rate.'_'.$price.'_'.$priceold.'_'.$idcatalog.'_'.$idbrand.'_'.$mota.'_'.$chitiet.'_'.$new.'_'.$hot.'_'.$noibat;
               add_product($name,$img,$price,$priceold,$hot,$new,$bestsale,$noibat,$rate,$idcatalog,$idbrand,$mota,$chitiet,0);
            }
            $product=getproduct(100);
            include_once "view/product.php";
            break;
         case 'updateproduct':
            if(isset($_POST['btnupdate'])){
               $id=$_POST['id'];
               $name=$_POST['name'];
               $rate=$_POST['rate'];
               $price=$_POST['price'];
               $priceold=$_POST['priceold'];
               $brands=getbrand();
               $catalogs=getcatalog();
               $catalog=$_POST['catalog'];
               $brand=$_POST['brand'];
               foreach ($brands as $item) {
                  if($item['name']==$brand){
                     $idbrand=$item['id'];
                     break;
                  }
               }
               
               
               foreach ($catalogs as $item) {
                  if($item['name']==$catalog){
                     $idcatalog=$item['id'];
                     break;
                  }
               }
               $mota=$_POST['mota'];
               $chitiet=$_POST['chitiet'];
               if(isset($_POST['new']) && $_POST['new']){
                  $new=1;
               }else{
                  $new=0;
               }
               if(isset($_POST['hot']) && $_POST['hot']){
                  $hot=1;
               }else{
                  $hot=0;
               }
               if(isset($_POST['noibat']) && $_POST['noibat']){
                  $noibat=1;
               }else{
                  $noibat=0;
               }
               if(isset($_POST['bestsale']) && $_POST['bestsale']){
                  $bestsale=1;
               }else{
                  $bestsale=0;
               }
               $img=$_FILES['img']['name'];
               if($img!=''){
                  $target_file = '../'.PATH_IMG . basename($img);
                  move_uploaded_file($_FILES['img']["tmp_name"], $target_file);
                  $hinhcu='../'.PATH_IMG.$_POST['hinhcu'];
                  if($_POST['hinhcu']!=''){
                     delimghost($hinhcu);
                  }
               }
               
               //  echo $id.'_'.$name.'_'.$img.'_'.$rate.'_'.$price.'_'.$priceold.'_'.$idcatalog.'_'.$idbrand.'_'.$mota.'_'.$chitiet.'_'.$new.'_'.$hot.'_'.$noibat;
               update_product($id,$name,$img,$price,$priceold,$hot,$new,$bestsale,$noibat,$rate,$idcatalog,$idbrand,$mota,$chitiet,0);
            }
            $product=getproduct(100);
            include_once "view/product.php";
            break;
         case 'delproduct':
            if(isset($_GET['id']) && $_GET['id']){
               $id=$_GET['id'];
               if(getproductdetail($id)['img']!=''){
                  $img_file='../'.PATH_IMG.getproductdetail($id)['img'];
                  delimghost($img_file);
               }
               delproduct($id);
            }
            $product=getproduct();
            include_once "view/product.php";
            break;

// --------- Table Catalog-------------------------

         case 'catalog':
            $catalog=getcatalog(100);
            include_once "view/catalog.php";
            break;
         case 'catalogform':
            if(isset($_GET['id']) && ($_GET['id']>0)){
               $catalog=getcatalog();
               $idsp=$_GET['id'];
               $detail=getcatalogdetail($idsp);
            }else{
               header('location: index.php');
            }
            include_once "view/catalogform.php";
            break;
         case 'addcatalogform':
               include_once "view/addcatalog.php";
               break;
         case 'addcatalog':
            if(isset($_POST['btnadd'])){
               $name=$_POST['name'];
               $stt=$_POST['stt'];
               $mota=$_POST['mota'];
               if(isset($_POST['home']) && $_POST['home']){
                  $home=1;
               }else{
                  $home=0;
               }               
               add_catalog( $name, $stt, $mota, $home);
            }
            $catalog=getcatalog();
            include_once "view/catalog.php";
            break;
         case 'updatecatalog':
            if(isset($_POST['btnupdate'])){
               $id=$_POST['id'];
               $name=$_POST['name'];    
               $stt=$_POST['stt'];
               $stt=intval($stt);
               $id=intval($id);
               $mota=$_POST['mota'];
               if(isset($_POST['home']) && $_POST['home']){
                  $home=1;
               }else{
                  $home=0;
               }                     
               update_catalog($id, $name, $stt, $mota, $home);
            }
            $catalog=getcatalog();
            include_once "view/catalog.php";
            break;
         case 'delcatalog':
            if(isset($_GET['id']) && $_GET['id']){
               $id=$_GET['id'];
               delcatalog($id);
            }
            $catalog=getcatalog();
            include_once "view/catalog.php";
            break;

            // --------- Table Comment-------------------------

         case 'comment':
            $comment=getcomment(100);
            include_once "view/comment.php";
            break;
         case 'commentform':
            if(isset($_GET['id']) && ($_GET['id']>0)){
               $comment=getcomment(100);
               $idsp=$_GET['id'];
               $detail=getcommentdetail($idsp);
            }else{
               header('location: index.php');
            }
            include_once "view/commentform.php";
            break;
         case 'addcommentform':
               include_once "view/addcomment.php";
               break;
         case 'addcomment':
            if(isset($_POST['btnadd'])){
               $id_product=$_POST['id_product'];
               $id_user=$_POST['id_user'];
               $noidung=$_POST['noidung'];
               $rate=$_POST['rate'];             
               add_comment( $id_product, $id_user, $noidung, $rate);
            }
            $comment=getcomment();
            include_once "view/comment.php";
            break;
         case 'updatecomment':
            if(isset($_POST['btnupdate'])){
               $id=$_POST['id'];
               $id=intval($id);
               $id_product=$_POST['id_product'];
               $id_user=$_POST['id_user'];
               $thoigian=$_POST['thoigian'];
               $noidung=$_POST['noidung'];
               $rate=$_POST['rate'];    
               $id_product=intval($id_product);
               $id_user=intval($id_user);
               $rate=intval($rate);         
               update_comment($id, $id_product, $id_user, $thoigian, $noidung, $rate);
            }
            $comment=getcomment();
            include_once "view/comment.php";
            break;
         case 'delcomment':
            if(isset($_GET['id']) && $_GET['id']){
               $id=$_GET['id'];
               delcomment($id);
            }
            $comment=getcomment();
            include_once "view/comment.php";
            break;

//-------------------Brand-----------------------------

         case 'brand':
            $brand=getbrand(100);
            include_once "view/brand.php";
            break;
         case 'brandform':
            if(isset($_GET['id']) && ($_GET['id']>0)){
               $idsp=$_GET['id'];
               $detail=getbranddetail($idsp);
            }else{
               header('location: index.php');
            }
            include_once "view/brandform.php";
            break;
         case 'addbrandform':
               include_once "view/addbrand.php";
               break;
         case 'addbrand':
            if(isset($_POST['btnadd'])){
               $name=$_POST['name'];
               $img=$_FILES['img']['name'];
               if($img!=''){
                  $target_file = '../'.PATH_IMG . basename($img);
                  move_uploaded_file($_FILES['img']["tmp_name"], $target_file);
               }               
               add_brand($name,$img);
            }
            $brand=getbrand();
            include_once "view/brand.php";
            break;
         case 'updatebrand':
            if(isset($_POST['btnupdate'])){
               $id=$_POST['id'];
               $name=$_POST['name'];
               $img=$_FILES['img']['name'];
               $img=$_FILES['img']['name'];
               if($img!=''){
                  $target_file = '../'.PATH_IMG . basename($img);
                  move_uploaded_file($_FILES['img']["tmp_name"], $target_file);
                  $hinhcu='../'.PATH_IMG.$_POST['hinhcu'];
                  if($_POST['hinhcu']!=''){
                     delimghost($hinhcu);
                  }
               }             
               update_brand($id,$name,$img);
            }
            $brand=getbrand();
            include_once "view/brand.php";
            break;
         case 'delbrand':
            if(isset($_GET['id']) && $_GET['id']){
               $id=$_GET['id'];
               if(getbranddetail($id)['logo']!=''){
                  $img_file='../'.PATH_IMG.getbranddetail($id)['logo'];
                  delimghost($img_file);
               }
               delbrand($id);
            }
            $brand=getbrand();
            include_once "view/brand.php";
            break;


         case 'logout':
            if(isset($_SESSION['role'])){
               unset($_SESSION['role']);
            }
            header('location: login.php');
            break;

         default:
            // $newproduct=getproducthome();
            // $saleproduct=getproducthome_promo();
            // $viewproduct=getproducthome_view();
            $souser=count(getusertable());
            $sodonhang=count(getdonhangtable());
            $donhang=getdonhangtable();
            $doanhthu=0;
            foreach ($donhang as $item) {
               extract($item);
               $doanhthu+=$tongtien;
            }
            $thongke_product_catalog=thongke_product_catalog();
            $thongke_product_doanhthu=thongke_product_doanhthu();
            $thongke_product_binhluan=thongke_product_binhluan();
            include_once "view/home.php";
            break;
      }

   }else{
      $souser=count(getusertable());
      $sodonhang=count(getdonhangtable());
      $donhang=getdonhangtable();
      $doanhthu=0;
      foreach ($donhang as $item) {
         extract($item);
         $doanhthu+=$tongtien;
      }
      $thongke_product_catalog=thongke_product_catalog();
      $thongke_product_doanhthu=thongke_product_doanhthu();
      $thongke_product_binhluan=thongke_product_binhluan();
      include_once "view/home.php";
      
   }
      include_once "view/footer.php";
   }else{
      header('location: login.php');
   }
?>