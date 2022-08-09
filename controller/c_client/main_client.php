<?php
	$action = filter_input(INPUT_POST, 'action');
	if (empty($action)) {
		$action = filter_input(INPUT_GET, 'action');
		if (empty($action)) {
			$action = 'default';
		}
	}
	if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

	$category = CategoryDB::get_categories();
	include_once 'view/v_client/header_site.php';

	switch ($action) {
		case 'default':
			include 'view/v_client/home.php';
			break;
		case 'catepro':
			$cateID = filter_input(INPUT_GET, 'iddm');
			$cate = CategoryDB::getCategoryById($cateID);
			$categories = CategoryDB::get_categories();
			$proByCate = productDB::getProByCateId($cateID);
			include 'view/v_client/product/proByCate.php';
			break;
		case 'search_product':
			$value = filter_input(INPUT_POST, 'kyw');
			if($value != '') {
				$proByCate = productDB::search_products($value);
				$cate = "";
				$categories = CategoryDB::get_categories();
				include 'view/v_client/product/proByCate.php';
				break;
			}
			include 'view/v_client/home.php';
			break;
		case 'details-pro':
			$proID = filter_input(INPUT_GET, 'proID');
			$product = productDB::getProById($proID);
			extract($product);
			$hintProList = productDB::getHintPro();
			$sameProList = productDB::getSamePro($ma_danhmuc, $ma_hanghoa);
			$listmodel = modelDB::getModelById($ma_hanghoa);
			include 'view/v_client/product/details.php';
			break;
		case 'manage_acc' :
			$listbill = BillDB::getBillByUID($_SESSION['user'][0]['ma_khachhang']);
			include "view/v_client/account/manage.php";
			break;
		case 'update_acc' :
			// if(isset($_POST['btn-update'])){
			// 	$ma_khachhang = $_POST['ma_khachhang'];
			// 	$user = $_POST['user'];
			// 	$pass = $_SESSION['user'][0]['mat_khau'];
			// 	$name = $_POST['name'];
			// 	$email = $_POST['email'];
			// 	$address = $_POST['address'];
			// 	$phone = $_POST['phone'];
			// 	$avatar = $_FILES['avatar']['name'];
			// 	//upload file
			// 	$target_dir = "./uploads/";
			// 	$target_file = $target_dir . basename($avatar);
			// 	move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
			// 	userDB::edit_user($user,$name,$address,$phone,$email,$avatar,$ma_khachhang);
			// 	$_SESSION['user'] = userDB::check_login($username, $pass);
			// 	$thongbao = "Tài khoản đã dược cập nhật !";
			// }
			include "view/v_client/account/info-update.php";
			break;
		case 'add_cart':
			// add thông tin sp từ form add to cart đến session
			if(isset($_POST['add-cart'])) {
				$ma_hanghoa = $_POST['ma_hanghoa'];
				$ten_hanghoa = $_POST['ten_hanghoa'];
				$don_gia = $_POST['don_gia'];
				$hinh = $_POST['hinh'];
				$size = $_POST['size'];
				$so_luong = $_POST['quantity'];
				$thanh_tien = $don_gia * $so_luong;
				$productAdd = [$ma_hanghoa, $ten_hanghoa, $hinh, $don_gia, $size, $so_luong,$thanh_tien];
				array_push($_SESSION['cart'], $productAdd);
				$_SESSION['cart'];
			}
			include 'view/v_client/cart/viewcart.php';
			break;
		case 'delete_cart' :
			if(isset($_GET['id'])) {
				array_splice($_SESSION['cart'],$_GET['id'],1);
			}else{
				$_SESSION['cart']= [];
			}
			header('Location:.?controller=c_client&&action=viewcart');
			break;
		case 'viewcart' :
			include 'view/v_client/cart/viewcart.php';
			break;
		case 'checkout' :
			header('Location: ./view/v_client/cart/check_out.php');
			break;
		case 'billconfirm' :
			// Tao hoa don
			if(isset($_POST['btn-submit'])) {
				$iduser = $_SESSION['user'][0]['ma_khachhang'];
				$name = $_POST['name'];
				$email = $_POST['email'];
				$tel = $_POST['tel'];
				$address = $_POST['address'];
				$note = $_POST['note'];
				$date = date("Y-m-d");
				$transport = $_POST['transport'];
				$paymentMethod = $_POST['payment'];
				$sumBill = BillDB::sum_bill();
	
				$idbill = BillDB::insert_bill($iduser,$name, $email, $address, $tel, $date, $transport, $paymentMethod, $sumBill, $note);
	
				//Insert into hoa_don_chi_tiet : $_SESSION['cart'] & idbill;
	
				foreach ($_SESSION['cart'] as $cart) {
					BillDB::insert_billDetail($cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $cart[6], $idbill);
					BillDB::subpro_bill($cart[0], $cart[4], $cart[5]);
				}
	
				$_SESSION['cart'] = [];
	
			}
			header('Location: .?controllerc_client&&action=manage_acc');
			break;
		case 'mybill' :
			$billID = filter_input(INPUT_GET, 'id');
			$bill = BillDB::getOne_bill($billID);
			$listproduct = BillDB::getAll_billDetail($billID);
			include 'view/v_client/account/mybill.php'; 
			break;
		case 'cancel_bill' :
			$billID = filter_input(INPUT_GET, 'billID');
			BillDB::cancel_bill($billID);
			$listbill = BillDB::getBillByUID($_SESSION['user'][0]['ma_khachhang']);
			include 'view/v_client/account/manage.php'; 
			break;
		case 'reorder' :
			$billID = filter_input(INPUT_GET, 'billID');
			
			$_SESSION['cart'] = [];
			$productList = BillDB::getAll_billDetail($billID);
			foreach ($productList as $pro) {
				extract($pro);
				$productAdd = [$ma_hanghoa, $ten_hanghoa, $hinh, $gia, $size, $so_luong,$thanh_tien];
				array_push($_SESSION['cart'], $productAdd);
				$_SESSION['cart'];
			}
			// BillDB::delete_bill($billID);
			header('Location: ./view/v_client/cart/check_out.php');
			break;

		default:
			# code...
			break;
	}
	include_once 'view/v_client/footer_site.php';


?>