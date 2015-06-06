<?php
include('core/connect.php');
if( isset($_SESSION["login"]) ){
	if( isset($_GET["page"]) ){
		switch ($_GET["page"]) {
			case 'questions':
				include('questions/questions.php');
				break;
			default:
				include('questions/questions.php');
				break;
		}
	}else{
		include('questions/questions.php');
	}
}else{
	include("includes/login.php");
}
?>