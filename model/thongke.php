<?php
    function getusertable(){
        $sql="select month(HD.NgayLapHD) Thang, year(HD.NgayLapHD) Nam, HD.MaHH, HH.TenHH, sum(HD.SoLuong) TongSoLuong
        from hanghoa HH inner join hoadon HD on HH.MaHH=HD.MaHH
        group by Thang, Nam";
        return getall($sql);
     }

?>