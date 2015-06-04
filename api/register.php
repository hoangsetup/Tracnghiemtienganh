<?php 
	require_once __DIR__ . '/connect.php';
	$response = array();
	$success = 0;
	$message = 'Access denied';
	$checkApi = false;
	if(function_exists('apache_request_headers')){
		if(apache_request_headers()['Authorization'] == '2d30ff242f8650954bfe8c993f084f4f')
			$checkApi = true;
	}
	if(isset($_SERVER["Authorization"]) && $_SERVER["Authorization"] == '2d30ff242f8650954bfe8c993f084f4f' || $checkApi){
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['ngaysinh']) && isset($_POST['sdt']) && isset($_POST['image'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$ngaysinh = $_POST['ngaysinh'];
			$sdt = $_POST['sdt'];
			$image = $_POST['image'];

			// Update
			if(isset($_POST['id'])){
				$id = $_POST['id'];
				$checkExist = selectWhere('users', "sUser = '".$username."' AND sPassword = '".$password."' AND PK_iUserId != '".$id."'");
				if(mysqli_num_rows($checkExist) > 0){
					$success = 0;
					$message = 'Account already exists!';
				}else{
					$query = sprintf("UPDATE users SET sName='%s', sUser='%s', sPassword='%s', sEmail='%s',sNgaysinh='%s',sSdt='%s',image='%s' WHERE PK_iUserId = '%s'", $name, $username, $password, $email, $ngaysinh, $sdt, $image, $id);
					$result = queryToTable($query);
					if($result){
						$success = 1;
						$message = 'Update successfully relogin to change!';
					}else{
						$success = 0;
						$message = 'Something wrong!';
					}
				}
			}else{ // Add new
				$checkExist = selectWhere('users', "sUser = '".$username."' AND sPassword = '".$password."'");
				if(mysqli_num_rows($checkExist) > 0){
					$success = 0;
					$message = 'Account already exists!';
				}else{
					$query = sprintf("INSERT INTO users (sName, sUser, sPassword, sEmail, sNgaysinh, sSdt, image) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $name, $username, $password, $email, $ngaysinh, $sdt, $image);
					$result = queryToTable($query);
					if($result){
						$success = 1;
						$message = 'Register successfully!';
					}else{
						$success = 0;
						$message = 'Something wrong!';
					}				
				}
			}
		}else{
			$success = 0;
			$message = 'Request register invalid!';
		}
	}
	$response['success'] = $success;
	$response['message'] = $message;
	echo json_encode($response, 256);
?>