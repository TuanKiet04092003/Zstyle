<?php




    function getlogin($user,$pass){
        $sql="SELECT * FROM users WHERE user=? AND pass=?";
        $kq= pdo_query_one($sql, $user, $pass);
        if(is_array($kq) && $kq['kichhoat']==1){
            return $kq;
        }else
            return -1;
            
     }

     function getrole($user,$pass){
      $sql="SELECT * FROM users WHERE user=? AND pass=?";
      $kq= pdo_query_one($sql, $user, $pass);
      if(is_array($kq) && $kq['kichhoat']==1){
          return $kq['role'];
      }else
          return -1;
          
   }

     function getidusercu($user,$pass){
      $sql="SELECT * FROM users WHERE user=? AND pass=?";
      $kq= pdo_query_one($sql, $user, $pass);
      if(is_array($kq)){
          extract($kq);
          return $id;
      }else
          return -1;
          
      }






//-----------------Đơn hàng------------------
function creatpass() {
   $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{};:,.<>/?`~';
   $password = '';
   for ($i = 0; $i < 8; $i++) {
     $password .= $characters[mt_rand(0, strlen($characters) - 1)];
   }
   return $password;
 }
 function creatusername($name) {
   $username='';
   for($i=0;$i<strlen($name);$i++){
         if($name[$i]=='@'){
            break;
         }else{
            $username.=$name[$i];
         }
   }
   $characters = '0123456789';
   for ($i = 0; $i < 6; $i++) {
     $username .= $characters[mt_rand(0, strlen($characters) - 1)];
   }
   return $username;
 }
 function creatuser($user,$pass, $name,$email,$sdt,$gioitinh,$ngaysinh,$diachi,$role,$img,$kichhoat){
   $sql = "INSERT INTO users (user,pass, name,email,sdt,gioitinh,ngaysinh,diachi,role,img,kichhoat)
   VALUES (?,?,?,?,?,?,?,?,?,?,?)";      
   pdo_execute($sql, $user,$pass, $name,$email,$sdt,$gioitinh,$ngaysinh,$diachi,$role,$img,$kichhoat);
}

function update_user($id,$user,$pass, $name,$email,$sdt,$gioitinh,$ngaysinh,$diachi,$role,$img,$kichhoat){
  $sql = "UPDATE users SET user=?,pass=?,name=?,email=?,sdt=?,gioitinh=?, ngaysinh=?, diachi=?, role=?, img=?, kichhoat=? WHERE id=?";
  pdo_execute($sql, $user,$pass, $name,$email,$sdt,$gioitinh,$ngaysinh,$diachi,$role,$img,$kichhoat,$id);
}
function deluser($id){
   $sql = "DELETE FROM users WHERE  id=?";
   if(is_array($id)){
       foreach ($id as $ma) {
           pdo_execute($sql, $ma);
       }
   }
   else{
       pdo_execute($sql, $id);
   }
}

function getuser($id){
   $sql="SELECT * FROM users WHERE id=?";
   return pdo_query_one($sql, $id);
}
function getusertable($limit=100000){
   $sql="SELECT * FROM users ORDER BY id DESC limit ".$limit;
   return pdo_query($sql);
}

?>