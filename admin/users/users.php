<?php
	/**
	*Display Table of user records
	*/
	$query = "SELECT * FROM users";
	$result = mysqli_query( $con,$query ); 
?>
<div class="panel panel-primary">
	  <div class="panel-heading">
			<h3 class="panel-title">Danh sách thành viên</h3>
	  </div>
	  <div class="panel-body">
		  	<?php 
		  		/**
		  		* Display form of adding new user record
		  		* Function adding
		  		*/
		  		include('users/add.php'); 
		  	?>
		  	<table class="table table-hover users">
		  		<thead>
		  			<tr>
		  				<th class="head-content">Tên đăng nhập</th>
		  				<th class="head-content">Tên hiển thị</th>
		  				<th class="head-privillage">Quyền</th>
		  				<th class="head-action">Hành động</th>
		  			</tr>
		  		</thead>
		  		<tbody>
		  		<?php 
		  			while( $row=mysqli_fetch_array($result) ){
		  				/**
		  				* Display each row of user record
		  				* Function editting and deleting
		  				*/
		  				include('users/view.php');
		  			} 
		  		?>
		  		</tbody>
		  	</table>
	  </div>
</div>

<?php
	/**
	* Deleting a user with its answers
	*/
	if( isset($_GET['action']) && $_GET["action"] == 'delete' ){
		$query_delete = "DELETE FROM users WHERE PK_iUserId = ".$_GET['u'];
		if (mysqli_query($con, $query_delete)) {
			$query_delete = "DELETE FROM ketqua WHERE userid=".$_GET['u'];
			if (mysqli_query($con, $query_delete)) {
				redirect('index.php');
			}
		}else{
			echo '<span class="label label-danger">Lỗi khi xóa</span>';
		}
	} 
	/**
	*Updating
	*/
	if( isset($_POST["submit-edit-question"]) ){
		$srole = mysqli_real_escape_string($con, $_POST["srole"]);
		$suser = mysqli_real_escape_string($con, $_POST["suser"]);
		$sname = mysqli_real_escape_string($con, $_POST["sname"]);
		$spass = mysqli_real_escape_string($con, $_POST["spass"]);
		$sdob = mysqli_real_escape_string($con, $_POST["sdob"]);
		$smail = mysqli_real_escape_string($con, $_POST["smail"]);
		$sphone = mysqli_real_escape_string($con, $_POST["sphone"]);
		$simage = $_POST["simage_old"];
		$target_dir = "../images/";
		$target_file = $target_dir . basename($_FILES["simage"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if( $target_file != "../images/" ){//only check when file chosen
		    $check = getimagesize($_FILES["simage"]["tmp_name"]);
		    if($check !== false) {
		        //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if( $uploadOk == 1 ){
			if ($_FILES["simage"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["simage"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["simage"]["name"]). " has been uploaded.";
		        $simage = basename( $_FILES["simage"]["name"]);
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		$query_update = sprintf("UPDATE users SET iPermission='%s', sUser='%s', sName='%s', sPassword='%s', sNgaysinh='%s', sEmail='%s', sSdt='%s', image='%s' WHERE PK_iUserId='%s'",$srole, $suser, $sname, $spass, $sdob, $smail, $sphone, $simage, $_POST["submit-edit-question"]);
		if (mysqli_query($con, $query_update)) {
		    echo '<span class="label label-success"><a href="index.php"><i class="fa fa-spinner fa-pulse"></i> Đã sửa 1 thành viên.</a></span>';
		    unset($_POST["submit-edit-question"]);
		} else {
		    echo '<span class="label label-danger">Lỗi, không sửa được thành viên.</span>';
		}
	}
?>