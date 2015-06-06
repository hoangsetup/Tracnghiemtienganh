<?php
/**
* Display form of adding new question record
* Function adding
*/
?>
<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#addnewQuestion" aria-expanded="false" aria-controls="addnewQuestion">Thêm</button>
<br><br>
<div class="collapse" id="addnewQuestion">
	<div class="well">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<div class="row">
				<div class="row">
					<div class="col-sm-12">
						<legend>Nhập thông tin thành viên</legend>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<label for="srole">Quyền</label>
						<select name="srole" id="" class="form-control" required>
							<option value="" disabled selected>Quyền</option>
							<option value="0">Quản trị viên</option>
							<option value="1">Giáo viên</option>
							<option value="2">Người học</option>
						</select>
					</div>
					<div class="form-group">
						<label for="suser">Tên đăng nhập</label>
						<input type="text"class="form-control" name="suser" required>
						<br>
						<label for="sname">Tên hiển thị</label>
						<input type="text"class="form-control" name="sname" required>
						<br>
						<label for="spass">Mật khẩu</label>
						<input type="text"class="form-control" name="spass" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<label for="sdob">Ngày sinh</label>
					<input type="text" class="form-control" name="sdob" required>
					<br>
					<label for="smail">Email</label>
					<input type="text" class="form-control" name="smail" required>
					<br>
					<label for="sphone">Số điện thoại</label>
					<input type="text" class="form-control" name="sphone" required>
					<br>
					<label for="simage">Ảnh đại diện</label>
					<input type="file" class="form-control" name="simage">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<button type="submit" name="submit-add-question" class="btn btn-success">Thêm</button>
					<button class="btn btn-default" type="button" data-toggle="collapse" data-target="#addnewQuestion" aria-expanded="false" aria-controls="addnewQuestion">Hủy</button>
				</div>
			</div>
			<!-- /Submit -->
		</form>
	</div>
</div>
<!-- /Add new Question -->
<?php 
	if( isset($_POST["submit-add-question"]) ){
		global $con;
		$srole = mysqli_real_escape_string($con, $_POST["srole"]);
		$suser = mysqli_real_escape_string($con, $_POST["suser"]);
		$sname = mysqli_real_escape_string($con, $_POST["sname"]);
		$spass = mysqli_real_escape_string($con, $_POST["spass"]);
		$sdob = mysqli_real_escape_string($con, $_POST["sdob"]);
		$smail = mysqli_real_escape_string($con, $_POST["smail"]);
		$sphone = mysqli_real_escape_string($con, $_POST["sphone"]);
		$target_dir = "../images/";
		$target_file = $target_dir . basename($_FILES["simage"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
	    $check = getimagesize($_FILES["simage"]["tmp_name"]);
	    if($check !== false) {
	        //echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
		// Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["simage"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["simage"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["simage"]["name"]). " has been uploaded.";
		        $simage = basename( $_FILES["simage"]["name"]);
		    } else {
		    	$simage = '';
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		$query = sprintf("INSERT INTO users (iPermission, sUser, sName, sPassword, sNgaysinh, sEmail, sSdt, image) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",$srole, $suser, $sname, $spass, $sdob, $smail, $sphone, $simage);
		if (mysqli_query($con, $query)) {
		    echo '<a class="label label-success" href="index.php?page=questions"><i class="fa fa-spinner fa-pulse"></i> Đã thêm 1 thành viên.</a>';
		    unset($_POST["submit-add-question"]);
		} else {
			echo $query;
		    echo '<span class="label label-danger">Lỗi, không thêm được thành viên.</span>';
		}
	}
?>