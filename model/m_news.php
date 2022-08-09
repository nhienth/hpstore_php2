<?php 
    function insert_tintuc($tieude,$noidung,$ngaydang,$hinh,$tomtat){
        $sql = "INSERT INTO tin_tuc(tieu_de, ngay_dang, noi_dung, hinh, tom_tat) VALUES('$tieude','$ngaydang','$noidung','$hinh','$tomtat')";
        pdo_execute($sql);
    }
    function loadAll_tintuc(){
        $sql = "SELECT * FROM tin_tuc ORDER BY ma_tintuc DESC";
        $listtintuc = pdo_query($sql);
        return $listtintuc;
    }

    function loadHome_tintuc() {
        $sql = "SELECT * FROM tin_tuc ORDER BY ma_tintuc DESC LIMIT 4";
        $listtintuc = pdo_query($sql);
        return $listtintuc;
    }

    function delete_tintuc($ma_tintuc){
        $sql = "DELETE FROM tin_tuc WHERE ma_tintuc =".$ma_tintuc;
        pdo_execute($sql);
    }
    function loadOne_tintuc($ma_tintuc){
        $sql = "SELECT * FROM tin_tuc WHERE ma_tintuc =".$ma_tintuc;
        $tintuc = pdo_query_one($sql);
        return $tintuc;
    }
    
    function update_tintuc($tieude, $noidung, $hinh, $tomtat,$ma_tintuc){
        if($hinh != ""){
            $sql = "UPDATE tin_tuc SET noi_dung = '".$noidung."', tieu_de = '".$tieude."', hinh = '".$hinh."', tom_tat = '".$tomtat."' WHERE ma_tintuc =".$ma_tintuc;
        }else{
            $sql = "UPDATE tin_tuc SET noi_dung = '".$noidung."', tieu_de = '".$tieude."',  tom_tat = '".$tomtat."' WHERE ma_tintuc =".$ma_tintuc;
        }
        pdo_execute($sql);
    }

    function countAll_tintuc(){
        $sql = "SELECT count(*) FROM tin_tuc";
        $count = pdo_query_value($sql);
        return $count;
    }
?>