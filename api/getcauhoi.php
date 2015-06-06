<?php
	require_once __DIR__ . '/connect.php';
	$response = array();
	$success = 0;
	$message = 'Access denied';
	$checkApi = false;
	// if(function_exists('apache_request_headers')){
	// 	if(apache_request_headers()['Authorization'] == '2d30ff242f8650954bfe8c993f084f4f')
	// 		$checkApi = true;
	// }
	if(isset($_SERVER["Authorization"]) && $_SERVER["Authorization"] == '2d30ff242f8650954bfe8c993f084f4f'  || $checkApi){
		if(isset($_POST['loaicauhoi']) && isset($_POST['count'])){
			$query = sprintf("SELECT * FROM cauhoi WHERE loaicauhoi = '%s' ORDER BY RAND()LIMIT %s", $_POST['loaicauhoi'], $_POST['count']);
			$result = queryToTable($query);
			$response['cauhoi'] = array();
			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_array($result)) {

				//dap an
				$res = queryToTable(sprintf("SELECT * FROM dapan WHERE cauhoiid = '%s'", $row['id']));
				$dapan = array();
				while ($r = mysqli_fetch_array($res)) {
					$da['noidung'] = $r['noidung'];
					$da['dadung'] = $r['dadung'];
					array_push($dapan, $da);
				}

				$cauhoi = array(
					'id' => $row['id'],
					'noidung' => $row['noidung'],
					'dapan' => $dapan
				);

				
				array_push($response['cauhoi'], $cauhoi);
			}
			$success = 1;
			$message = 'Num_rows = '.mysqli_num_rows($result);
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