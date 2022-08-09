<?php
class userDB {
	public static function getuser() {
		$db = Database::getDB();
		$query = "SELECT * FROM khach_hang ";

		try {
			$statement = $db->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_OBJ);
			return $result;

		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo "Lỗi: " . $error;
			exit();
		}
	}

	
	public static function add_user($user, $pass, $name, $address, $phone, $email, $avatar){
		$sql = "INSERT INTO khach_hang(ten_dangnhap, mat_khau, ho_ten, hinh, so_dien_thoai, email, dia_chi) VALUES ('$user', '$pass', '$name', '$avatar', '$phone', '$email', '$address')";
		pdo_execute($sql);
	}

	public static function getUserById($ma_khachhang){
		$sql = "SELECT * FROM khach_hang WHERE ma_khachhang =".$ma_khachhang;
		return pdo_query_one($sql);
	}

	public static function edit_user($user,$name,$address,$phone,$email,$avatar,$ma_khachhang){
		if($avatar != ""){
			$sql = "UPDATE khach_hang SET ten_dangnhap = '".$user."', ho_ten = '".$name."', hinh = '".$avatar."', so_dien_thoai = '".$phone."', email = '".$email."', dia_chi = '".$address."', WHERE ma_khachhang =".$ma_khachhang;
		}else{
			$sql = "UPDATE khach_hang SET ten_dangnhap = '".$user."', ho_ten = '".$name."', so_dien_thoai = '".$phone."', email = '".$email."', dia_chi = '".$address."', WHERE ma_khachhang =".$ma_khachhang;
		}
		pdo_execute($sql);
	}

	public static function deleteUserById($ma_khachhang) {
		$sql = "DELETE FROM khach_hang WHERE ma_khachhang =".$ma_khachhang;
		pdo_execute($sql);
	}

	public static function check_login($username, $pass) {
		$db = Database::getDB();
		$query = "SELECT * FROM khach_hang WHERE ten_dangnhap = :username AND mat_khau = :pass ";
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':username', $username);
			$statement->bindValue(':pass', $pass);
			$statement->execute();
			$result = $statement->fetchAll();
			return $result;

		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo "Lỗi: " . $error;
			exit();
		}
	}

	public static function sign($sign) {
		$db = Database::getDB();
		$query = "INSERT INTO khach_hang(email, mat_khau)
       VALUES(:email,:mat_khau)";

		try {
			$statement = $db->prepare($query);
			$statement->bindValue(":email", $sign['email']);
			$statement->bindValue(":mat_khau", $sign['mat_khau']);
			$statement->execute();
			$count = $statement->rowCount(); //xac định số dòng được thêm vào
			$statement->closeCursor(); //đóng kết nối tới database
			return $count;

		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo "Lỗi: " . $error;
			exit();
		}
	}



}
?>