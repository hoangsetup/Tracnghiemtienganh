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
		$result = selectAll('loaicauhoi');
		$response['loaicauhoi'] = array();
		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_array($result)) {
				$lch = array(
					'id' => $row['id'],
					'tenloai' => $row['tenloai']
				);
				array_push($response['loaicauhoi'], $lch);
			}
			$success = 1;
			$message = 'Num_rows = '.mysqli_num_rows($result);
		}else{
			$success = 0;
			$message = 'Data is null';
		}
	}
	$response['success'] = $success;
	$response['message'] = $message;
	echo json_encode($response, 256);
?>