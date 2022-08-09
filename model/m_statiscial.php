<?php 

class StatDB {


    public static function getPro_stat() {
        $sql = "SELECT DM.ten_danhmuc as ten_danhmuc, count(HH.ma_danhmuc) as countSP, min(HH.don_gia) as minPrice, max(HH.don_gia) as maxPrice, avg(HH.don_gia) as avgPrice ";
        $sql.= " FROM danh_muc DM left join hang_hoa HH on DM.ma_danhmuc = HH.ma_danhmuc";
        $sql.= " GROUP BY DM.ma_danhmuc ORDER BY DM.ma_danhmuc DESC";
        return pdo_query($sql);
    }

    public static function getProM_stat() {
        $sql = "SELECT DM.ten_danhmuc as ten_danhmuc, count(HH.ma_danhmuc) as countSP, sum(MD.so_luong) as so_luong, min(MD.so_luong) as sl_min, max(MD.so_luong) as sl_max, avg(MD.so_luong) as sl_avg";
        $sql.= " FROM danh_muc DM join hang_hoa HH on DM.ma_danhmuc = HH.ma_danhmuc join model_hang_hoa MD on HH.ma_hanghoa = MD.ma_hanghoa";
        $sql.= " GROUP BY DM.ma_danhmuc ORDER BY DM.ma_danhmuc DESC";
        return pdo_query($sql);
    }

    public static function getBill_stat($value) {
        $sql = "SELECT HH.ma_danhmuc AS ma_danhmuc, HDCT.ma_hanghoa AS ma_hanghoa, HDCT.ten_hanghoa AS ten_hanghoa, sum(HDCT.so_luong) AS so_luong, sum(HDCT.thanh_tien) AS tong_tien, HDCT.hinh AS hinh";
        $sql.= " FROM hoa_don_chi_tiet HDCT JOIN hoa_don HD on HD.ma_hoadon = HDCT.idbill";
        $sql.= " JOIN hang_hoa HH on HH.ma_hanghoa = HDCT.ma_hanghoa";
        if($value == 1){
            $sql.= " WHERE HD.trang_thai = 3 GROUP BY HDCT.ma_hanghoa, HDCT.ten_hanghoa HAVING so_luong > 0 ORDER BY so_luong DESC LIMIT 5";
        }else if($value == 2) {
            $sql.= " WHERE HD.trang_thai = 3 GROUP BY HDCT.ma_hanghoa, HDCT.ten_hanghoa HAVING so_luong > 0 ORDER BY so_luong ASC LIMIT 5";
        }else{
            $sql.= " WHERE HD.trang_thai = 3 GROUP BY HDCT.ma_hanghoa, HDCT.ten_hanghoa HAVING so_luong > 0";
        }
        return pdo_query($sql);
    }



}


?>