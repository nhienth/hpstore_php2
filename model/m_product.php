<?php

class productDB {

    public static function get_productsNew() {
        $db = Database::getDB();
        $query = "SELECT * FROM hang_hoa as pro INNER JOIN danh_muc as cate on pro.ma_danhmuc = cate.ma_danhmuc ORDER BY ma_hanghoa DESC LIMIT 6";
        
        try {
            $stm = $db->prepare($query);
            $stm -> execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return $result; 
        }
        catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Lỗi: ".$error;
            exit();
        }
    }

    public static function get_products() {
        $db = Database::getDB();
        $query = "SELECT * FROM hang_hoa as pro INNER JOIN danh_muc as cate on pro.ma_danhmuc = cate.ma_danhmuc ORDER BY ma_hanghoa DESC";
        
        try {
            $stm = $db->prepare($query);
            $stm -> execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return $result; 
        }
        catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Lỗi: ".$error;
            exit();
        }
    }

    public static function getProByCateId($id) {
        $db = Database::getDB();

        $query = "SELECT * FROM hang_hoa WHERE ma_danhmuc =:ID ORDER BY ma_hanghoa DESC";
        try {
            $stm = $db->prepare($query);
            $stm->bindValue(':ID', $id);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            $stm->closeCursor();
            return $result;
        }
        catch(PDOexception $e) {
            $error = $e->getMessage();
            echo "Lỗi: ".$error;
            exit();
        }
    }

    public static function search_products($value){
        $db = Database::getDB();
        $query = "SELECT * FROM hang_hoa WHERE ten_hanghoa LIKE :value";
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(":value", "%$value%");
            $statement -> execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Lỗi: ".$error;
            exit();
        }
    }

    public static function getProHomeByCateId($id) {
        $db = Database::getDB();

        $query = "SELECT * FROM hang_hoa WHERE ma_danhmuc =:ID ORDER BY ma_hanghoa DESC LIMIT 6";
        try {
            $stm = $db->prepare($query);
            $stm->bindValue(':ID', $id);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            $stm->closeCursor();
            return $result;
        }
        catch(PDOexception $e) {
            $error = $e->getMessage();
            echo "Lỗi: ".$error;
            exit();
        } 
    }

    public static function getProById($ma_hanghoa) {
        $sql ="SELECT * FROM hang_hoa WHERE ma_hanghoa=".$ma_hanghoa;
        return pdo_query_one($sql);
    }

    public static function add_pro($tensp, $dongia, $giamgia, $hinh, $danhmuc, $ngaynhap, $mota) {
        $sql = "INSERT INTO hang_hoa(ten_hanghoa, don_gia, giam_gia, hinh, ma_danhmuc, ngay_nhap, mo_ta) VALUES('$tensp','$dongia','$giamgia','$hinh','$danhmuc','$ngaynhap','$mota')";
        pdo_execute($sql);
    }

    
    public static function delete_pro($ma_hanghoa){
        $sql ="DELETE FROM hang_hoa WHERE ma_hanghoa=".$ma_hanghoa;
        pdo_execute($sql);
    }

    public static function edit_pro($tensp, $dongia, $giamgia, $hinhpath, $danhmuc, $mota, $ma_hanghoa){
        if($hinhpath != ""){
            $sql = "UPDATE hang_hoa SET ten_hanghoa = '".$tensp."', don_gia = '".$dongia."', giam_gia = '".$giamgia."', hinh = '".$hinhpath."', ma_danhmuc = '".$danhmuc."', mo_ta = '".$mota."' WHERE ma_hanghoa =".$ma_hanghoa;
        }else{
            $sql = "UPDATE hang_hoa SET ten_hanghoa = '".$tensp."', don_gia = '".$dongia."', giam_gia = '".$giamgia."', ma_danhmuc = '".$danhmuc."', mo_ta = '".$mota."' WHERE ma_hanghoa =".$ma_hanghoa;
        }
        pdo_execute($sql);
    }

    public static function getHintPro() {
        $sql = "SELECT * FROM hang_hoa WHERE giam_gia > 0 ORDER BY so_luot_xem DESC LIMIT 4";
        return pdo_query($sql);

    }

    public static function getSamePro($ma_danhmuc, $id) {
        $sql = "SELECT * FROM hang_hoa WHERE ma_danhmuc = ".$ma_danhmuc." AND ma_hanghoa <> ".$id." ORDER BY ma_hanghoa DESC LIMIT 5 ";
        return pdo_query($sql);
    }

    public static function getNameProbyId($ma_hanghoa) {
        $sql = "SELECT * FROM hang_hoa where ma_hanghoa=".$ma_hanghoa;
        $hanghoa = pdo_query_one($sql);
        extract($hanghoa);
        return $ten_hanghoa;
    }
}