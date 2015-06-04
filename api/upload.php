<?php
    $response = array();
    $success = 0;
    $message = 'Access denied';
    $checkApi = false;

    if(function_exists('apache_request_headers')){
        if(apache_request_headers()['Authorization'] == '2d30ff242f8650954bfe8c993f084f4f')
            $checkApi = true;
    }

    //$checkApi = true;

    if(isset($_SERVER["Authorization"]) && $_SERVER["Authorization"] == '2d30ff242f8650954bfe8c993f084f4f'  || $checkApi){
        if(isset($_FILES['file'])){
            if($_FILES['file']['name'] != NULL){ // Đã chọn file
                // Tiến hành code upload file
                $finfo = mime_content_type($_FILES['file']['tmp_name']);
                if ($finfo == "image/jpeg" || $finfo == "image/png" || $finfo == "image/gif"){
                // là file ảnh
                // Tiến hành code upload    
                    if($_FILES['file']['size'] > 1048576){
                        $success = 0;
                        $message = 'File size <= 1MB!';
                    }else{
                        // file hợp lệ, tiến hành upload
                        $path = "../images/"; // file sẽ lưu vào thư mục data
                        $tmp_name = $_FILES['file']['tmp_name'];
                        $name = $_FILES['file']['name'];
                        $type = $_FILES['file']['type']; 
                        $size = $_FILES['file']['size'];
                        // Upload file
                        move_uploaded_file($tmp_name,$path.$name);
                        $success = 1;
                        $message = 'Upload image is successfuly!';
                   }
                }else{
                   // không phải file ảnh
                    $success = 0;
                    $message = 'File invalid 1!';
                }
           }else{
                $success = 0;
                $message = 'File invalid 2!';
           }
        }else{
            $success = 0;
            $message = 'Request invalid 3!';
        }
    }
    $response['success'] = $success;
    $response['message'] = $message;
    echo json_encode($response, 256);
?>