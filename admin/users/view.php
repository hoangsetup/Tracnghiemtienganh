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
	<td><?php echo substr($row["iPermission"], 0, 250); ?></td>
	<td class="col-action">
		<a class="label label-primary" data-toggle="collapse" data-target="#editQuestion-<?php echo $row["PK_iUserId"]; ?>" aria-expanded="false" aria-controls="editQuestion-<?php echo $row["PK_iUserId"]; ?>">Sửa</a>
		<a onclick="return confirm('Bạn có chắc chắn xóa?')" href="?action=delete&u=<?php echo $row["PK_iUserId"] ?>" class="label label-danger">Xóa</a>
	</td>
</tr>
<tr class="collapse out" id="editQuestion-<?php $row["PK_iUserId"]; ?>">
	<form action="" method="POST" role="form">		
		<td>
			<div class="row">
				
			</div>
		</td>
		<td class="col-action">
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
			redirect('index.php');
		}else{
			echo '<span class="label label-danger">Lỗi khi xóa</span>';
		}
	} 
	/**
	*Updating
	*/
	if( isset($_POST["submit-edit-question"]) ){
		$content = mysqli_real_escape_string($con, $_POST["q_content"]);
		$A_1 = mysqli_real_escape_string($con, '0');
		$A_2 = mysqli_real_escape_string($con, $_POST["a"]);
		$B_1 = mysqli_real_escape_string($con, '0');
		$B_2 = mysqli_real_escape_string($con, $_POST["b"]);
		$C_1 = mysqli_real_escape_string($con, '0');
		$C_2 = mysqli_real_escape_string($con, $_POST["c"]);
		$D_1 = mysqli_real_escape_string($con, '0');
		$D_2 = mysqli_real_escape_string($con, $_POST["d"]);
		switch ($_POST["da"]) {
			case '1':
				$A_1 = '1';
				break;
			case '2':
				$B_1 = '1'; 
				break;
			case '3':
				$C_1 = '1';
				break;
			case '4':
				$D_1 = '1';
				break;
			default:
				break;
		}
		$query_update = sprintf("UPDATE cauhoi SET noidung='%s', loaicauhoi='%s' WHERE id='%s'",$content, $_POST["cate"],$_POST["id-question"]);
		if (mysqli_query($con, $query_update)) {
		    // $query_a = sprintf("INSERT INTO dapan (cauhoiid, dadung, noidung) VALUES ('%s', '%s', '%s')",$last_id, $A_1, $A_2);
		    $query_a = sprintf("UPDATE dapan SET dadung='%s', noidung='%s' WHERE id='%s'",$A_1, $A_2, $_POST["id-a"]);
		    $query_b = sprintf("UPDATE dapan SET dadung='%s', noidung='%s' WHERE id='%s'",$B_1, $B_2, $_POST["id-b"]);
		    $query_c = sprintf("UPDATE dapan SET dadung='%s', noidung='%s' WHERE id='%s'",$C_1, $C_2, $_POST["id-c"]);
		    $query_d = sprintf("UPDATE dapan SET dadung='%s', noidung='%s' WHERE id='%s'",$D_1, $D_2, $_POST["id-d"]);
		    mysqli_query($con, $query_a);
		    mysqli_query($con, $query_b);
		    mysqli_query($con, $query_c);
		    mysqli_query($con, $query_d);
		    echo '<span class="label label-success"><a href="index.php?page=questions">Đã sửa 1 câu hỏi.</a></span>';
		    unset($_POST["submit-edit-question"]);
		} else {
		    echo '<span class="label label-danger">Lỗi, không sửa được câu hỏi.</span>';
		}
	}
?>