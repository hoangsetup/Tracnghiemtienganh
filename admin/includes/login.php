<div class="row">
	<div class="col-sm-offset-3 col-sm-6">
		<div class="well well-lg" style="margin-top: 50px;">
			<form action="" method="POST" role="form">
				<legend>Thông tin đăng nhập</legend>
				<div class="form-group">
					<input type="text" name="name" value="<?php echo isset($_SESSION["name"])? $_SESSION["name"] : ''; ?>" class="form-control" id="" placeholder="Tên đăng nhập">
				</div>
				<div class="form-group">
					<input type="password" value="<?php echo isset($_SESSION["pass"])? $_SESSION["pass"] : ''; ?>" name="pass" class="form-control" id="" placeholder="Mật khẩu">
				</div>
				<button type="submit" name="login-submit" class="btn btn-primary">Đăng nhập</button>
			</form>
		</div>
	</div>
</div>
<?php
	if( isset($_POST["login-submit"]) ){
		$username = mysqli_real_escape_string( $con, $_POST['name'] );
		$password = mysqli_real_escape_string( $con, $_POST['pass'] );

		$query= "SELECT * FROM users WHERE sUser = '".$username."' AND sPassword = '".$password."'";

		$result = mysqli_query($con,$query);
		if( mysqli_num_rows($result) == 0 ){ ?>
			<script>
				alert("User name or Password Invalid!");
			</script>
		<?php }else{ 
			session_start();
			$_SESSION['login'] = "true";
			$row = mysqli_fetch_array($result);
			$_SESSION["user_id"] = $row["PK_iUserId"];
			$_SESSION["user_name"] = $row["sName"];
			$_SESSION["user_role"] = $row["iPermission"];
			redirect('index.php?login=true&page=questions');
		}
	}else{
		//redirect('index.php?login=false');
	}
?>