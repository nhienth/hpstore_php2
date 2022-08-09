<?php

class modelDB{
    public static function getModels() {
        $sql = "SELECT HH.ma_hanghoa as ma_hanghoa, MD.ma_model as ma_model,HH.ten_hanghoa as ten_hanghoa, HH.hinh as hinh, HH.don_gia as don_gia, sum(MD.so_luong) as SUMSL";
        $sql.= " FROM hang_hoa HH join model_hang_hoa MD ON HH.ma_hanghoa = MD.ma_hanghoa";
        $sql.= " GROUP BY HH.ma_hanghoa, HH.ten_hanghoa ORDER BY HH.ma_hanghoa DESC";
        return pdo_query($sql);
    }

    public static function add_model($masp, $size, $so_luong){
        $sql = "INSERT INTO model_hang_hoa(ma_hanghoa, size, so_luong) VALUES ('$masp','$size','$so_luong')";
        pdo_execute($sql);
    }

    public static function getModelById($ma_hanghoa){
        $sql = "SELECT * FROM hang_hoa HH join model_hang_hoa MDHH on MDHH.ma_hanghoa = HH.ma_hanghoa WHERE HH.ma_hanghoa =".$ma_hanghoa;
        return pdo_query($sql);
    }

    public static function getOneModelById($ma_model){
        $sql = "SELECT * FROM model_hang_hoa WHERE ma_model=".$ma_model;
        return pdo_query_one($sql);
    }

    public static function edit_model($ma_model, $size, $so_luong) {
        $sql = "UPDATE model_hang_hoa SET size = '".$size."', so_luong = '".$so_luong."'  WHERE ma_model =".$ma_model;
        pdo_execute($sql);
    }

    public static function delete_model($ma_model) {
        $sql = "DELETE FROM model_hang_hoa WHERE ma_model =".$ma_model;
        pdo_execute($sql);
    }
}

?>