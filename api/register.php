<?php 
	require_once __DIR__ . '/connect.php';
	$response = array();
	$success = 0;
	$message = 'Access denied';
	$checkApi = false;
	$headers = apache_request_headers();
	foreach ($headers as $header => $value) {
		if($header == 'Authorization' && $value == '2d30ff242f8650954bfe8c993f084f4f'){
			$checkApi = true;
			break;
		}
	}
	if($checkApi){
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['ngaysinh']) && isset($_POST['sdt'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$ngaysinh = $_POST['ngaysinh'];
			$sdt = $_POST['sdt'];
			$query = sprintf("INSERT INTO users (sName, sUser, sPassword, sEmail, sNgaysinh, sSdt) VALUES('%s', '%s', '%s', '%s', '%s', '%s')", $name, $username, $password, $email, $ngaysinh, $sdt);
			$result = insertToTable($query);
			if($result){
				$success = 1;
				$message = 'Register successfully!';
			}else{
				$success = 0;
				$message = 'Something wrong!';
			}
		}else{
			$success = 0;
			$message = 'Request register invalid!';
		}
	}
	$response['success'] = $success;
	$response['message'] = $message;
	echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>