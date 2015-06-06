<?php
	/**
	*Display Table of question records
	*/
	$query = "SELECT * FROM cauhoi WHERE userid ='".$_SESSION["user_id"]."' ORDER BY id DESC";
	$result = mysqli_query( $con,$query ); 
?>
<div class="panel panel-primary">
	  <div class="panel-heading">
			<h3 class="panel-title">Danh sách câu hỏi</h3>
	  </div>
	  <div class="panel-body">
		  	<?php 
		  		/**
		  		* Display form of adding new question record
		  		* Function adding
		  		*/
		  		include('questions/add.php'); 
		  	?>
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
		  				/**
		  				* Display each row of question record
		  				* Function editting and deleting
		  				*/
		  				include('questions/view.php');
		  			} 
		  		?>
		  		</tbody>
		  	</table>
	  </div>
</div>