<div class="well well-lg">
	<form action="" method="POST" role="form">
		<legend>Login</legend>
		<div class="form-group">
			<input type="text" name="name" value="<?php echo isset($_SESSION["name"])? $_SESSION["name"] : ''; ?>" class="form-control" id="" placeholder="User name">
		</div>
		<div class="form-group">
			<input type="password" value="<?php echo isset($_SESSION["pass"])? $_SESSION["pass"] : ''; ?>" name="pass" class="form-control" id="" placeholder="Password">
		</div>
		<button type="submit" name="login-submit" class="btn btn-primary">Submit</button>
	</form>
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
			$_SESSION["user_name"] = $row["sUser"];
			$_SESSION["user_role"] = $row["iPermission"];
			redirect('index.php?login=true&page=questions');
		}
	}else{
		//redirect('index.php?login=false');
	}
?>