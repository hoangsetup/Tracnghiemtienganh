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
		<form action="" method="POST" role="form">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<legend>Nhập thông tin thành viên</legend>
					<div class="form-group">
						<select name="srole" id="" class="form-control" required>
							<option value="" disabled selected>Quyền</option>
							<option value="0">Quản trị viên</option>
							<option value="1">Giáo viên</option>
							<option value="2">Người học</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text"class="form-control" name="suser" placeholder="Tên đăng nhập" required>
						<br>
						<input type="text"class="form-control" name="sname" placeholder="Tên hiển thị" required>
						<br>
						<input type="text"class="form-control" name="spass" placeholder="Mật khẩu" required>
					</div>
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
		$query = sprintf("INSERT INTO users (iPermission, sUser, sName, sPassword) VALUES ('%s', '%s', '%s', '%s')",$srole, $suser, $sname, $spass);
		if (mysqli_query($con, $query)) {
		    echo '<a class="label label-success" href="index.php?page=questions"><i class="fa fa-spinner fa-pulse"></i> Đã thêm 1 thành viên.</a>';
		    unset($_POST["submit-add-question"]);
		} else {
		    echo '<span class="label label-danger">Lỗi, không thêm được thành viên.</span>';
		}
	}
?>