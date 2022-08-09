<?php

class commentDB {
    public static function insert_binhluan($ma_khachhang,$ten_dangnhap,$ten_khachhang,$ma_hanghoa,$avatar,$content,$date) {
        $sql = "INSERT INTO binh_luan(noi_dung, ma_hanghoa, ma_khachhang, ten_dangnhap, ten_khachhang, avatar, ngay_binhluan) VALUES ('$content','$ma_hanghoa','$ma_khachhang','$ten_dangnhap','$ten_khachhang','$avatar','$date')";
        pdo_execute($sql);
    } 
    
    public static function selectAll_binhluan($id) {
        $sql = "SELECT * FROM binh_luan WHERE ma_hanghoa = '".$id."' ORDER BY ma_binhluan DESC";
        return pdo_query($sql);
    }
    
    public static function thongke_binhluan() {
        $sql = "SELECT HH.ma_hanghoa as ma_hanghoa , HH.ten_hanghoa as ten_hanghoa, count(*) as so_luong, min(BL.ngay_binhluan) as cu_nhat, max(BL.ngay_binhluan) as moi_nhat";
        $sql.= " FROM binh_luan BL join hang_hoa HH on BL.ma_hanghoa = HH.ma_hanghoa";
        $sql.= " GROUP BY HH.ma_hanghoa, HH.ten_hanghoa HAVING so_luong > 0";
        return pdo_query($sql);
    }
    
     public static function countAll_binhluan() {
        $sql = "SELECT count(*) FROM binh_luan";
        return pdo_query_value($sql);
    }
    
    public static function getCommentByIdP($ma_hanghoa) {
        $sql = "SELECT BL.*, HH.ten_hanghoa as ten_hanghoa";
        $sql .= " FROM binh_luan BL join hang_hoa HH on BL.ma_hanghoa = HH.ma_hanghoa WHERE BL.ma_hanghoa = '".$ma_hanghoa."' ORDER BY ngay_binhluan DESC";
        return pdo_query($sql);
    }
    
    public static function delete_binhluan($ma_binhluan) {
        $sql = "DELETE FROM binh_luan WHERE ma_binhluan =".$ma_binhluan;
        pdo_execute($sql);
    }
    
    public static function countCP_binhluan($ma_hanghoa) {
        $sql = "SELECT count(*) FROM binh_luan WHERE ma_hanghoa=".$ma_hanghoa;
        return pdo_query_value($sql);
    }
    
    public static function deleteCmt_hanghoa($ma_hanghoa) {
        $sql = "DELETE FROM binh_luan WHERE ma_hanghoa =".$ma_hanghoa;
        pdo_execute($sql);
    }
}



?>