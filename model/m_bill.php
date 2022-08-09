

<?php

class BillDB {
    public static function getBill() {
        $sql = "SELECT * FROM hoa_don ORDER BY ma_hoadon DESC";
        return pdo_query($sql);
    }
    public static function getBillByUID($ma_khachhang) {
        $sql = "SELECT * FROM hoa_don WHERE ma_khachhang = '".$ma_khachhang."' ORDER BY ma_hoadon DESC";
        return pdo_query($sql);
    }

    public static function sum_bill() {
        $tong = 0;
        foreach ($_SESSION['cart'] as $cart) {
            $tmp_tong = $cart[3] * $cart[5];
            $tong+= $tmp_tong;
        }
        return $tong;
    }
    
    public static function insert_bill($iduser,$name, $email, $address, $tel, $date, $transport, $paymentMethod, $sumBill, $note) {
        $sql = "INSERT INTO hoa_don(ma_khachhang, ten_khachhang, dia_chi, dien_thoai, email, thanh_toan, van_chuyen, ngay_dat, tong_tien, ghi_chu) VALUES ('$iduser','$name','$address','$tel','$email','$paymentMethod','$transport','$date','$sumBill','$note') ";
        return pdo_execute_return_lastInsertId($sql);
    }
    
    public static function insert_billDetail($ma_hanghoa, $hinh, $ten_hanghoa, $gia, $size, $so_luong, $thanh_tien, $idill) {
        $sql = "INSERT INTO hoa_don_chi_tiet(ma_hanghoa, hinh, ten_hanghoa, gia, size, so_luong, thanh_tien, idbill) VALUES ('$ma_hanghoa','$hinh','$ten_hanghoa','$gia','$size','$so_luong','$thanh_tien','$idill') ";
        pdo_execute($sql);
    }

    public static function subpro_bill($ma_hanghoa, $size, $so_luong) {
        $sql = "UPDATE model_hang_hoa SET so_luong = so_luong - '".$so_luong."' WHERE 
        size LIKE '%".$size."%' AND ma_hanghoa =".$ma_hanghoa;
        pdo_execute($sql);
    }

    public static function getOne_bill($id) {
        $sql = "SELECT * FROM hoa_don WHERE ma_hoadon=".$id;
        return pdo_query_one($sql);
    }
    
    public static function getAll_billDetail($id) {
        $sql = "SELECT * FROM hoa_don_chi_tiet WHERE idbill=".$id;
        return pdo_query($sql);
    }

    
    public static function edit_bill($ma_hoadon, $trang_thai) {
        $sql = "UPDATE hoa_don SET trang_thai = '".$trang_thai."' WHERE ma_hoadon =".$ma_hoadon;
        pdo_execute($sql);
    }

    public static function cancel_bill($ma_hoadon) {
        $sql = "UPDATE hoa_don SET trang_thai = 4 WHERE ma_hoadon=".$ma_hoadon;
        pdo_execute($sql);
    }

    
    public static function delete_bill($ma_hoadon) {
        $sql = "DELETE FROM hoa_don WHERE ma_hoadon=".$ma_hoadon;
        pdo_execute($sql);
    }
}

?>