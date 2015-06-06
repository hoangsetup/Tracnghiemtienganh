<?php 
	/**
	* Display each row of question record
	* Function editting and deleting
	*/
	global $row; 
?>
<tr>
	<td><?php echo substr($row["sUser"], 0, 250); ?></td>
	<td><?php echo substr($row["sName"], 0, 250); ?></td>
	<td>
	<?php
		switch ($row["iPermission"]) {
		 	case '0':
		 		echo '<span class="label label-danger">Quản trị viên</span>';
		 		break;
		 	case '1':
		 		echo '<span class="label label-warning">Giáo viên</span>';
		 		break;
		 	case '2':
		 		echo '<span class="label label-success">Người học</span>';
		 		break;
		 } 
	?>
	</td>
	<td class="col-action">
		<a class="label label-primary" data-toggle="collapse" data-target="#editQuestion-<?php echo $row["PK_iUserId"]; ?>" aria-expanded="false" aria-controls="editQuestion-<?php echo $row["PK_iUserId"]; ?>">Xem chi tiết/Sửa</a>
		<a onclick="return confirm('Bạn có chắc chắn xóa?')" href="?action=delete&u=<?php echo $row["PK_iUserId"] ?>" class="label label-danger">Xóa</a>
	</td>
</tr>
<tr class="collapse out" id="editQuestion-<?php echo $row["PK_iUserId"]; ?>">
	<form action="" method="POST" role="form">		
		<td colspan="4">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<label for="srole">Quyền</label>
					<select name="srole" id="" class="form-control" required>
						<option value="0" <?php echo $row["iPermission"] == 0 ? 'selected' : ''; ?>>Quản trị viên</option>
						<option value="1" <?php echo $row["iPermission"] == 1 ? 'selected' : ''; ?>>Giáo viên</option>
						<option value="2" <?php echo $row["iPermission"] == 2 ? 'selected' : ''; ?>>Người học</option>
					</select>
					<br>
					<label for="suser">Tên đăng nhập</label><input type="text" name="suser" value="<?php echo $row["sUser"]; ?>" placeholder="Tên đăng nhập" class="form-control" required>
					<br>
					<label for="sname">Tên hiển thị</label><input type="text" name="sname" value="<?php echo $row["sName"]; ?>" placeholder="Tên hiển thị" class="form-control" required>
					<br>
					<label for="spass">Mật khẩu</label><input type="text" name="spass" value="<?php echo $row["sPassword"]; ?>" placeholder="Mật khẩu" class="form-control" required>
					<br>
				</div>
				<div class="col-sm-6 col-xs-12">
					<label for="sdob">Ngày sinh</label><input type="text" name="sdob" value="<?php echo $row["sNgaysinh"]; ?>" placeholder="Ngày sinh" class="form-control">
					<br>
					<label for="smail">Email</label><input type="text" name="sdob" value="<?php echo $row["sEmail"]; ?>" placeholder="Email" class="form-control">
					<br>
					<label for="sphone">Số điện thoại</label><input type="text" name="sphone" value="<?php echo $row["sSdt"]; ?>" placeholder="Email" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<button type="submit" name="submit-edit-question" value="<?php echo $row["PK_iUserId"]; ?>" class="btn btn-success">Xong</button>
					<a class="btn btn-default" data-toggle="collapse" data-target="#editQuestion-<?php echo $row["PK_iUserId"]; ?>" aria-expanded="false" aria-controls="editQuestion-<?php echo $row["PK_iUserId"]; ?>">Hủy</a>
				</div>
			</div>
		</td>
	</form>
</tr>
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
		$query_update = sprintf("UPDATE users SET iPermission='%s', sUser='%s', sName='%s', sPassword='%s' WHERE PK_iUserId='%s'",$srole, $suser, $sname, $spass,$_POST["submit-edit-question"]);
		if (mysqli_query($con, $query_update)) {
		    echo '<span class="label label-success"><a href="index.php"><i class="fa fa-spinner fa-pulse"></i> Đã sửa 1 thành viên.</a></span>';
		    unset($_POST["submit-edit-question"]);
		} else {
		    echo '<span class="label label-danger">Lỗi, không sửa được thành viên.</span>';
		}
	}
?>