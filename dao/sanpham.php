<?php
// require_once 'pdo.php';

// function sanpham_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "INSERT INTO sanpham(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
// }

// function sanpham_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE sanpham SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }

// function sanpham_delete($ma_hh){
//     $sql = "DELETE FROM sanpham WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }

function sanpham_select_all($limit){
    $sql = "SELECT * FROM sanpham where bestseller = 1 order by id desc limit ".$limit;
    return pdo_query($sql);
}

function sanpham_all($iddm, $limit){
    $sql = "SELECT * FROM sanpham where 1";
    if($iddm>0){
        $sql.=" AND iddm=".$iddm;
    }
    $sql.=" order by id desc limit ".$limit;
    return pdo_query($sql);
}
function get_sp_by_id($ma_hh){
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $ma_hh);
}

// function sanpham_exist($ma_hh){
//     $sql = "SELECT count(*) FROM sanpham WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function sanpham_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE sanpham SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function sanpham_select_top10(){
//     $sql = "SELECT * FROM sanpham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function sanpham_select_dac_biet(){
//     $sql = "SELECT * FROM sanpham WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function sanpham_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM sanpham WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function sanpham_select_keyword($keyword){
//     $sql = "SELECT * FROM sanpham hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function sanpham_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM sanpham");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM sanpham ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }