<?php

	/**
	 * Connect to the database
	 */
	global $con;
	$dbHost = 'localhost';
	$dbUSer = 'root';
	$dbPass = 'root';
	$dbName = 'tracnghiemtienganh';

	//$dbHost = 'mysql.hostinger.vn';
	//$dbPass = '123456';
	//$dbUSer = 'u226375234_phuc';
	//$dbName = 'u226375234_tnta';

	// Create connection
	$con = mysqli_connect( $dbHost, $dbUSer, $dbPass,$dbName );
	mysqli_query($con,"SET NAMES 'utf8'" );

	// Check connection
	 if (mysqli_connect_errno()) {
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 }
	/**
	 * Redirect links and pages
	 */
	function redirect($url) {
	    if(!headers_sent()) {
	        //If headers not sent yet... then do php redirect
	        header('Location: '.$url);
	        exit;
	    } else {
	        //If headers are sent... do javascript redirect... if javascript disabled, do html redirect.
	        echo '<script type="text/javascript">';
	        echo 'window.location.href="'.$url.'";';
	        echo '</script>';
	        echo '<noscript>';
	        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
	        echo '</noscript>';
	        exit;
	    }
	}
	/**
	 * Delete a record from $table in codition of value of $column is equal to specific $value
	 */
	function delRecord( $table = null, $column = null, $value = null ){
		global $con;
		$query = "DELETE FROM $table WHERE $column = '$value'";
		$result = mysqli_query( $con, $query ) or die ("Error while deleting!");
		return $result;
	}
	/**
	 * Select all records from  $table
	 */
	function selectAll( $table = null ){
		global $con;
		$query = "SELECT * FROM $table";
		$result = mysqli_query( $con, $query ) or die ("Error!");
		return $result;
	}
	/**
	 * Select all records from  $table
	 */
	function selectAll2( $table = null, $order = null ){
		global $con;
		$query = "SELECT * FROM $table ORDER BY $order DESC";
		$result = mysqli_query( $con, $query ) or die ("Error!");
		return $result;
	}
	/**
	 * Select the specific record from $table where value of $column equal to specific $value
	 */
	function selectOne( $table = null, $column = null, $value = null ){
		global $con;
		$query = "SELECT * FROM $table WHERE $column = '$value'";
		$result = mysqli_query( $con, $query ) or die ($query);
		$row = mysqli_fetch_array( $result );
		return $row;
	}

	function selectWhere( $table = null, $whereState = null ){
		global $con;
		$query = "SELECT * FROM $table WHERE $whereState";
		$result = mysqli_query( $con, $query ) or die ($query);
		return $result;
	}

	function queryToTable($insertState = null){
		global $con;
		$result = mysqli_query($con, $insertState);
		return $result;
	}

?>