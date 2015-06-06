<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trac Nghiem Tieng Anh - Admin Panel</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		session_start(); 
		$login = false;
		if( isset( $_SESSION["login"] ) ){
			$login = true;
		}
	?>
	<div class="container">
		<header>
			<nav>
				<?php
					if( $login == true ){
				?>
						<a onclick="return confirm('About to Log out?')" href="includes/logout.php">Log out</a>
				<?php
					} 
				?>
			</nav>
		</header>