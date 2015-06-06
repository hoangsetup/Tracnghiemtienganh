<?php
	$query = "SELECT * FROM cauhoi WHERE userid =".$_SESSION["user_id"];
	$result = mysqli_query( $con,$query ); 
?>
<div class="panel panel-primary">
	  <div class="panel-heading">
			<h3 class="panel-title">Danh sách câu hỏi</h3>
	  </div>
	  <div class="panel-body">
		  	<?php include('questions/add.php'); ?>
		  	<!-- /Add question Module -->
		  	<table class="table table-hover">
		  		<thead>
		  			<tr>
		  				<th>Nội dung</th>
		  				<th>Hành động</th>
		  			</tr>
		  		</thead>
		  		<tbody>
		  		<?php 
		  			while( $row=mysqli_fetch_array($result) ){
		  				include('questions/view.php');
		  			} 
		  		?>
		  		</tbody>
		  	</table>
	  </div>
</div>