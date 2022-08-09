<?php 
	$action = filter_input(INPUT_POST, 'action');
	if (empty($action)) {
		$action = filter_input(INPUT_GET, 'action');
		if (empty($action)) {
			$action = 'default';
		}
	}
	include_once('view/v_1/head_1.php');

	switch ($action) {
		case 'default':
			include('view/v_1/default.php');
			break;
		case 'show_user':
			$users = userDB::getuser();
			include_once 'view/v_1/show_user.php';
			break;
		case 'show_cate':
			$categories = CategoryDB::get_categories();
			include_once 'view/v_1/show_cate.php';
			break;
		case 'add_cate':
			if(isset($_POST['add_cate'])){
				$ten_danhmuc = $_POST['tenloai'];
				CategoryDB::add_cate($ten_danhmuc);
				$thongbao = "Thêm danh mục thành công !";
			}
			include_once 'view/v_1/add_cate.php';
			break;
		case 'edit_cate':
			$cateID = filter_input(INPUT_GET, 'cateID');
			$cateInfo = CategoryDB::getCategoryById($cateID);
			include_once 'view/v_1/edit_cate.php';
			break;
		case 'edited_cate':
			$cate = array(
				'id' => filter_input(INPUT_POST,'maloai'),
				'name' => filter_input(INPUT_POST,'tenloai')
			);
			if (CategoryDB::edit_category($cate) > 0) {
				$thongbao = "Đã sửa thành công";
			} else {
				$thongbao = "Lỗi";
			}
			$categories = CategoryDB::get_categories();
			include_once 'view/v_1/show_cate.php';
			break;
		case 'delete_cate':
			$cateID = filter_input(INPUT_GET, 'cateID');
			$count_result = CategoryDB::deleteCategoryById($cateID);
			if ($count_result == 1) {
				$thongbao = "Đã xóa danh mục";
			} else {
				$thongbao = "Lỗi";
			}
			$categories = CategoryDB::get_categories();
			include_once 'view/v_1/show_cate.php';
			break;
		// ---------------------PRODUCT------------------------
		case 'show_product':
			$products = productDB::get_products();
			include_once 'view/v_1/show_product.php';
			break;
		case 'add_pro':
			$categories = CategoryDB::get_categories();
			if(isset($_POST['add_pro']) ){
				$tensp = $_POST['tensp'];
				$dongia = $_POST['dongia'];
				$giamgia = $_POST['giamgia'];
				$hinhpath = $_FILES['anhsp']['name'];
				//upload file
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($hinhpath);
				move_uploaded_file($_FILES['anhsp']['tmp_name'], $target_file);
				$danhmuc = $_POST['danhmuc'];
				$mota = $_POST['mota'];
				$ngaynhap = date("Y-m-d");
				productDB::add_pro($tensp, $dongia, $giamgia, $hinhpath, $danhmuc, $ngaynhap, $mota);
				$thongbao ="Thêm sản phẩm thành công !";
			}
			include_once 'view/v_1/add_pro.php';
			break;
		case 'edit_pro':
			$proID = filter_input(INPUT_GET, 'proID');
			$product = productDB::getProById($proID);
			$categories = CategoryDB::get_categories();
			include_once 'view/v_1/edit_pro.php';
			break;
		case 'edited_pro':
			if(isset($_POST['edited_pro'])){
				$ma_hanghoa = $_POST['ma_hanghoa'];
				$tensp = $_POST['tensp'];
				$dongia = $_POST['dongia'];
				$giamgia = $_POST['giamgia'];
				$hinhpath = $_FILES['anhsp']['name'];
				//upload file
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($hinhpath);
				move_uploaded_file($_FILES['anhsp']['tmp_name'], $target_file);
				$danhmuc = $_POST['danhmuc'];
				$mota = $_POST['mota'];
				productDB::edit_pro($tensp, $dongia, $giamgia, $hinhpath, $danhmuc, $mota, $ma_hanghoa);
				$thongbao ="Cập nhật sản phẩm thành công !";
			}
			$products = productDB::get_products();
			include_once 'view/v_1/show_product.php';
			break;
		case 'delete_pro':
			$proID = filter_input(INPUT_GET, 'proID');
			productDB::delete_pro($proID);
			$thongbao = "Đã xóa sản phẩm";
			$products = productDB::get_products();
			include_once 'view/v_1/show_product.php';
			break;
		// -------------MODEL------------------
		case 'show_model':
			$models = modelDB::getModels();
			include_once 'view/v_1/show_model.php';
			break;
		case 'add_model':
			$proID = filter_input(INPUT_GET, 'proID');
			$product = productDB::getProById($proID);
			include_once 'view/v_1/add_model.php';
			break;
		case 'added_model': 
			if(isset($_POST['add-model'])){
				$masp = $_POST['ma_hanghoa'];
				$size = $_POST['size'];
				$so_luong = $_POST['so_luong'];
				modelDB::add_model($masp, $size, $so_luong);
				$thongbao = "Thêm số lượng thành công !";
			}
			$models = modelDB::getModels();
			include_once 'view/v_1/show_model.php';
			break;
		case 'details_model': 
			$proID = filter_input(INPUT_GET, 'proID');
			$listmodel = modelDB::getModelById($proID);
			$ten_hanghoa = productDB::getNameProbyId($proID);
			include_once 'view/v_1/details_model.php';
			break;
		case 'edit_model':
			$mdID = filter_input(INPUT_GET, 'mdID');
			$model = modelDB::getOneModelById($mdID);
			include_once 'view/v_1/edit_model.php';
			break;
		case 'edited_model':
			if(isset($_POST['edit_model'])){
				$ma_model = $_POST['ma_model'];
				$size = $_POST['size'];
				$so_luong = $_POST['so_luong'];
				modelDB::edit_model($ma_model, $size, $so_luong);
				$thongbao = "Sản phẩm đã được cập nhật !";
			}
			$models = modelDB::getModels();
			include_once 'view/v_1/show_model.php';
			break;
		case 'delete_model':
			$mdID = filter_input(INPUT_GET, 'mdID');
			modelDB::delete_model($mdID);
			$thongbao = "Mặt hàng đã được xóa !";
			$models = modelDB::getModels();
			include_once 'view/v_1/show_model.php';
			break;
		// -----------COMMENT-------------
		
		// ---------BILL------------------
		
		// -----------STAT-------------
	
		
	
		default:
		# code...
		break;
	}
	include_once('view/v_1/footer_1.php');


?>