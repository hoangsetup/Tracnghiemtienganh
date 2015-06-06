<?php
include('../api/connect.php');
if( isset($_SESSION["login"]) ){
	if( isset($_SESSION["user_role"]) ){
		switch ($_SESSION["user_role"]) {
			case '0':
				include('users/users.php');
				break;
			case '1':
				include('questions/questions.php');
				break;
			default:
				echo "Bạn không có đủ quyển";
				break;
		}
	}else{
		echo "Không có user_role: Bạn không có đủ quyển.";
	}
}else{
	include("includes/login.php");
}
?>