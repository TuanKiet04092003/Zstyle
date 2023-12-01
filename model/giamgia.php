<?php
    function getvoucher($ma_voucher){
        $sql = "SELECT * FROM voucher WHERE ma_voucher=?";
        return pdo_query_one($sql, $ma_voucher);
     }

     function getdadung_voucher($id_voucher, $id_user){
        $sql = "SELECT * FROM dadung_voucher WHERE id_voucher=? and id_user=?";
        return pdo_query_one($sql, $id_voucher, $id_user);
     } 
     function add_dadung_voucher($id_voucher, $id_user){
        $sql = "INSERT INTO dadung_voucher(id_voucher, id_user) VALUES (?,?)";
        pdo_execute($sql, $id_voucher, $id_user);
    }
?>