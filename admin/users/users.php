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
		$query_update = sprintf("UPDATE users SET iPermission='%s', sUser='%s', sName='%s', sPassword='%s' WHERE PK_iUserId='%s'",$srole, $suser, $sname, $spass,$_POST["submit-edit-question"]);
		if (mysqli_query($con, $query_update)) {
		    echo '<span class="label label-success"><a href="index.php"><i class="fa fa-spinner fa-pulse"></i> Đã sửa 1 thành viên.</a></span>';
		    unset($_POST["submit-edit-question"]);
		} else {
		    echo '<span class="label label-danger">Lỗi, không sửa được thành viên.</span>';
		}
	}
?>