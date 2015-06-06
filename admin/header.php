<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trac Nghiem Tieng Anh - Admin Panel</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
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
		
	<?php
		if( $login == true ){
	?>
	<header class="well">
		<nav>
			<p class="head-user-meta">
				Xin chào, <?php echo $_SESSION["user_name"]; ?>
				<a class="label label-danger" onclick="return confirm('About to Log out?')" href="includes/logout.php">Thoát</a>
			</p>
	<?php
			// if( $_SESSION["user_role"] == '1' ){
			// 	echo '<a class="label label-info" href="index.php?page=questions">Quản lý câu hỏi</a>';
			// }
			// if( $_SESSION["user_role"] == '0' ){
			// 	echo '<a class="label label-warning" href="index.php?page=questions">Quản trị thành viên</a>';
			// }
	?>
		</nav>
	</header>
	<?php
		}
	?>