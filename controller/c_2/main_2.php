<?php 
	$action = filter_input(INPUT_POST, 'action');
	if (empty($action)) {
		$action = filter_input(INPUT_GET, 'action');
		if (empty($action)) {
			$action = 'default';
		}
	}
	include_once('view/v_2/head_2.php');

	switch ($action) {
		case 'default':
			include('view/v_2/default.php');
			break;
		case 'show_user':
			$users = userDB::getuser();
			include_once 'view/v_2/show_user.php';
			break;
		// ---------------------PRODUCT------------------------
		
		// -------------MODEL------------------
		
		// -----------COMMENT-------------
		case 'show_comment' :
			$listcomment = commentDB::thongke_binhluan();
			include_once 'view/v_2/show_comment.php';
			break;
		case 'details-cmt':
			$proID = filter_input(INPUT_GET, 'proID');
			$ten_hanghoa = productDB::getNameProbyId($proID);
			$listcomment = commentDB::getCommentByIdP($proID);
			include_once 'view/v_2/details_comment.php';
			break;
		case 'delete-cmt':
			$cmtID = filter_input(INPUT_GET, 'cmtID');
			commentDB::delete_binhluan($cmtID);
			$thongbao = "Bình luận đã được xóa !";
			$listcomment = commentDB::thongke_binhluan();
			include_once 'view/v_2/show_comment.php';
			break;
		// ---------BILL------------------
		case 'show_bill':
			$listhoadon = billDB::getBill();
			include "view/v_2/show_bill.php";
			break;
		case 'edit_bill' :
			if(isset($_POST['btn-update'])) {
				$ma_hoadon = $_POST['ma_hoadon'];
				$trang_thai = $_POST['trang_thai'];
				billDB::edit_bill($ma_hoadon, $trang_thai);
			}
			$listhoadon = billDB::getBill();
			include "view/v_2/show_bill.php";
			break;
		case 'details_bill' :
			$billID = filter_input(INPUT_GET, 'billID');
			$bill = billDB::getOne_bill($billID);
			$listhanghoa = billDB::getAll_billDetail($billID);
			include "view/v_2/details_bill.php";
			break;
		// -----------STAT-------------
		case 'stat_pro':
			$liststat = StatDB::getPro_stat();
			$stat_modelPro = StatDB::getProM_stat();
			include "view/v_2/show_statpro.php";
			break;
		case 'stat_bill':
			if(isset($_POST['btn-filter'])) {
				$value = $_POST['filterbill'];
				$liststat = StatDB::getBill_stat($value);
			}else{
				$liststat = StatDB::getBill_stat(0);
			}
			include "view/v_2/show_statbill.php";
			break;
		case 'show_chartpro':
			$liststat = StatDB::getPro_stat();
			include "view/v_2/chart_pro.php";
			break;
		case 'show_chartprom':
			$liststat = StatDB::getProM_stat();
			include "view/v_2/chart_prom.php";
			break;
		
	
		default:
		# code...
		break;
	}
	include_once('view/v_2/footer_2.php');


?>