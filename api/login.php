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
	if(isset($_SERVER["Authorization"]) && $_SERVER["Authorization"] == '2d30ff242f8650954bfe8c993f084f4f'  || $checkApi){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$result = selectWhere('users', "sUser = '".$username."' AND sPassword = '".$password."'");
			if(mysqli_num_rows($result) > 0){
				$success = 1;
				$message = 'Login successfully!';
				$response['user'] = array();
				$row = mysqli_fetch_array($result);
				$user = array();
				$user['PK_iUserId'] = $row["PK_iUserId"];
				$user['iPermission'] = $row['iPermission'];
				$user['sName'] = $row['sName'];
				$user['sUser'] = $row['sUser'];
				$user['sEmail'] = $row['sEmail'];
				$user['sNgaysinh'] = $row['sNgaysinh'];
				$user['sSdt'] = $row['sSdt'];
				$user['image'] = $row['image'];
				array_push($response['user'], $user);
			}else{
				$success = 0;
				$message = 'User name or Password invalid!';				
			}
		}else{
			$success = 0;
			$message = 'Request login invalid!';
		}
	}
	$response['success'] = $success;
	$response['message'] = $message;
	//echo json_encode($response, JSON_UNESCAPED_UNICODE);
	echo json_encode($response, 256);
?>