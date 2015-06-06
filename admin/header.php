<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trac Nghiem Tieng Anh - Admin Panel</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<?php
	session_start(); 
	$login = false;
	if( isset( $_SESSION["login"] ) ){
		$login = true;
	}
?>
<body class="<?php echo $login == false? 'login-form' : ''; ?>">
	<div class="container">
		
	<?php
		if( $login == true ){
	?>
	<header class="well">
		<nav>
			<p class="head-user-meta">
				Xin chào, <?php echo $_SESSION["user_name"]; ?>
				<a class="label label-danger" onclick="return confirm('Đăng xuất?')" href="includes/logout.php">Thoát</a>
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