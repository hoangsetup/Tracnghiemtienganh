<?php
	require_once __DIR__ . '/connect.php';
	$response = array();
	$success = 0;
	$message = 'Access denied';
	$checkApi = false;
	// if(function_exists('apache_request_headers')){
	// 	if(isset(apache_request_headers()['Authorization']) && apache_request_headers()['Authorization'] == '2d30ff242f8650954bfe8c993f084f4f')
	// 		$checkApi = true;
	// }

	if(isset($_SERVER["Authorization"]) && $_SERVER["Authorization"] == '2d30ff242f8650954bfe8c993f084f4f'  || $checkApi){
		if(isset($_POST['thoigian']) && isset($_POST['ketqua']) && isset($_POST['userid'])){
			$thoigian = $_POST['thoigian'];
			$ketqua = $_POST['ketqua'];
			$userid = $_POST['userid'];
			$query = sprintf("INSERT INTO ketqua(thoigian, ketqua, userid) VALUES('%s', '%s', '%s')", $thoigian, $ketqua, $userid);
			$result = queryToTable($query);
			if($result){
				$success = 1;
				$message = "Success!";
			}

		}else{
			$success = 0;
			$message = 'Request invalid!';
		}
	}
	$response['success'] = $success;
	$response['message'] = $message;
	echo json_encode($response, 256);
?>