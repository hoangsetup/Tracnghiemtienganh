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
		if(isset($_POST['userid'])){
			$userid = $_POST['userid'];
			$query = sprintf("SELECT * FROM ketqua WHERE userid = '%s'", $userid);
			$result = queryToTable($query);
			if(mysqli_num_rows($result) > 0){
				$success = 1;
				$message = "Success!";
				$response['ketqua'] = array();
				while ($row = mysqli_fetch_array($result)) {
					$ketqua = array(
						'thoigian' => $row['thoigian'],
						'ketqua' => $row['ketqua']
					);
					array_push($response['ketqua'], $ketqua);
				}
			}else{
				$success = 0;
				$message = 'Data is null!';
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