<?php ob_start(); ?>
<?php
	include_once 'model/database.php';
	include_once 'model/pdo.php';
	include_once 'model/m_categories.php';
	include_once 'model/m_product.php';
	include_once 'model/m_model.php';
	include_once 'model/m_users.php';
	include_once 'model/m_bill.php';
	include_once 'model/m_comment.php';
	include_once 'model/m_statiscial.php';


	$lifetime = 2 * 60 * 60;
	$path = '/';
	session_set_cookie_params($lifetime, $path);
	session_start();

	$login_message = '';
	$controller = filter_input(INPUT_POST, 'controller');
	if (empty($controller)) {
		$controller = filter_input(INPUT_GET, 'controller');
		if (empty($controller)) {
			$controller = 'main';
		}
	}

	switch ($controller) {

		case 'main': //vô trang đầu tiên
			include 'controller/c_client/main_client.php';
			break;
		//vô trang đầu tiên
		case 'signup':
			include 'view/v_signup.php';
			break;
		case 'sign':
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$avatar = $_FILES['avatar']['name'];
			//upload file
			$target_dir = "./uploads/";
			$target_file = $target_dir . basename($avatar);
			move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);

			userDB::add_user($user, $pass, $name, $address, $phone, $email, $avatar);
			$thongbao = "Đăng ký tài khoản thành công !";
			$user = "";
			$pass = "";
			$name = "";
			$email = "";
			$address = "";
			$phone = "";
                
			include 'view/v_signup.php';
            break;
		case 'login': //khi nhấn nút login
			$username = filter_input(INPUT_POST, 'user');
			$pass = filter_input(INPUT_POST, 'pass');
			
			$result = userDB::check_login($username, $pass);

			if (empty($result)) {
				$login_message = 'You must login to view page';
				include 'view/v_login.php';
			} else {
				$_SESSION['user'] = $result;
				if ($result[0]['vai_tro'] == 0) {
					include 'controller/c_0/main_0.php';
				} elseif ($result[0]['vai_tro'] == 1) {
					include 'controller/c_1/main_1.php';
				} elseif ($result[0]['vai_tro'] == 2) {
					include 'controller/c_2/main_2.php';
				}else{
					include 'controller/c_client/main_client.php';
				}
			}
			break;
		case 'logout':
			session_unset();
			header("Location: index.php");
			break;
		case 'level':
			if ($_SESSION['user'][0]['vai_tro'] == 0) {		
				include 'controller/c_0/main_0.php';
			} elseif ($_SESSION['user'][0]['vai_tro'] == 1) {
				include 'controller/c_1/main_1.php';
			} elseif ($_SESSION['user'][0]['vai_tro'] == 2) {
				include 'controller/c_2/main_2.php';
			}
			break;
		case 'c_0':
			include 'controller/c_0/main_0.php';
			break;
		case 'c_1':
			include 'controller/c_1/main_1.php';
			break;
		case 'c_2':
			include 'controller/c_2/main_2.php';
			break;
		case 'c_client':
			include 'controller/c_client/main_client.php';
			break;
		default:
			# code...
			break;
	}
?>
<?php ob_end_flush(); ?>
