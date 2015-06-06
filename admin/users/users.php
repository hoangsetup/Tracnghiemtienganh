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