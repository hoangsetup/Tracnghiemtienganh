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
		<?php
			echo '<a class="label label-info" href="#" data-toggle="modal" data-target="#myModal-'.$row["PK_iUserId"].'">Kết quả thi</a>';
		?>
		<a onclick="return confirm('Bạn có chắc chắn xóa?')" href="?action=delete&u=<?php echo $row["PK_iUserId"] ?>" class="label label-danger">Xóa</a>
	</td>
</tr>
<tr class="collapse out" id="editQuestion-<?php echo $row["PK_iUserId"]; ?>">
	<form action="" method="POST" role="form" enctype="multipart/form-data">		
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
					<label for="sdob">Ngày sinh</label><input type="text" name="sdob" value="<?php echo $row["sNgaysinh"]; ?>" placeholder="Ngày sinh" class="form-control" required>
					<br>
					<label for="smail">Email</label><input type="text" name="smail" value="<?php echo $row["sEmail"]; ?>" placeholder="Email" class="form-control" required>
					<br>
					<label for="sphone">Số điện thoại</label><input type="text" name="sphone" value="<?php echo $row["sSdt"]; ?>" placeholder="Email" class="form-control" required>
					<br>
					<div class="row">
						<div class="col-sm-3 col-xs-12">
							<input type="text" class="sr-only" name="simage_old" value="<?php echo $row["image"]; ?>">
							<img style="max-width: 80px;" src="../images/<?php echo $row["image"]; ?>" class="img-responsive" alt="thumb">
						</div>
						<div class="col-sm-9 col-xs-12">
							<label for="simage">Ảnh đại diênh</label>
							<input type="file" class="form-control" name="simage">
						</div>
					</div>
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
<!-- Modal -->
<div class="modal fade" id="myModal-<?php echo $row["PK_iUserId"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="myModalLabel"><?php echo $row["sName"]; ?></h4>
      	</div>
      	<div class="modal-body">
	       <ul class="result-report">
	       		<li>
	       			<span><strong>THỜI GIAN</strong></span>
	       			<span><strong>KẾT QUẢ</strong></span>
	       			<span><strong>THÀNH TÍCH</strong></span>
	       		</li>
	    		 <?php
		        	$query_result = "SELECT * FROM ketqua WHERE userid=".$row['PK_iUserId'];
		        	$result_result = mysqli_query( $con,$query_result );
		        	while( $row_r=mysqli_fetch_array($result_result) ){
		        ?>
						<li>
			       			<span>
			       				<?php echo $row_r["thoigian"]; ?>
			       			</span>
			       			<span>
			       				<?php
			       					$expression = $row_r["ketqua"];	
			       					echo $expression; 
			       				?>
			       			</span>
			       			<span>
			       				<?php 
			       					$t = explode("/", $expression);
			       					$t = $t[0]/$t[1];
			       					if( $t < 0.5 ):
			       				?>
				  	       				<div class="progress" style="margin-bottom: 0;">
				  					  		<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $t*100; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $t*100; ?>%">
				  					    	<?php echo $t*100; ?>% failed
				  					  	</div>
								<?php else: ?>
					       				<div class="progress" style="margin-bottom: 0;">
									  		<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $t*100; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $t*100; ?>%">
									    	<?php echo $t*100; ?>% pass
									  	</div>
								<?php endif; ?>
							</span>
			       		</li>
		        <?php
		        	} 
		        ?>
			</ul>
      	</div>
      	<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>