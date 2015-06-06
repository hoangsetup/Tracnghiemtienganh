<?php 
	/**
	* Display each row of question record
	* Function editting and deleting
	*/
	global $row; 
?>
<tr>
	<td><?php echo substr($row["noidung"], 0, 100); ?></td>
	<td>
		<a class="label label-primary" data-toggle="collapse" data-target="#editQuestion-<?php echo $row["id"]; ?>" aria-expanded="false" aria-controls="editQuestion-<?php echo $row["id"]; ?>">Sửa</a>
		<a onclick="return confirm('Bạn có chắc chắn xóa?')" href="?action=delete&q=<?php echo $row["id"] ?>" class="label label-danger">Xóa</a>
	</td>
</tr>
<tr class="collapse out" id="editQuestion-<?php echo $row["id"]; ?>">
	<form action="" method="POST" role="form">		
		<td>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<legend>Nội dung câu hỏi</legend>
					<div class="form-group">
						<select name="cate" id="" class="form-control" required>
							<option value="" disabled>Thể loại</option>
							<option value="1" <?php echo $row["loaicauhoi"]=='1'? 'selected' : ''; ?>>Từ vựng</option>
							<option value="2" <?php echo $row["loaicauhoi"]=='2'? 'selected' : ''; ?>>Ngữ pháp</option>
							<option value="3" <?php echo $row["loaicauhoi"]=='3'? 'selected' : ''; ?>>Phát âm</option>
						</select>
					</div>
					<div class="form-group">
						<input class="sr-only" type="text" name="id-question" value="<?php echo $row["id"]; ?>">
						<textarea required="required" class="form-control" name="q_content" id="" cols="30" rows="8"><?php echo $row["noidung"]; ?></textarea>
					</div>
				</div>
				<!-- /Content -->
				<div class="col-xs-12 col-sm-6">
					<legend>Đáp án</legend>
					<small>Đánh dấu tích vào đáp án đúng</small>
					<br>
					<?php
						$query3 = "SELECT * FROM dapan WHERE cauhoiid = '".$row["id"]."'";
						$result3 = mysqli_query( $con,$query3 );
						$n = 'a';
						$d = 1;
						while($row3=mysqli_fetch_array($result3)){
					?>
							<div class="input-group">
						      	<span class="input-group-addon">
						      		<input name="id-<?php echo $n; ?>" class="sr-only" type="text" value="<?php echo $row3["id"]; ?>">
						        	<input name="da" required="required" type="radio" <?php echo $row3["dadung"]==1? 'checked' : ''; ?> value="<?php echo $d; ?>" aria-label="...">
						      	</span>
						      	<input required="required" name="<?php echo $n; ?>" value="<?php echo $row3["noidung"]; ?>" type="text" placeholder="Đáp án A" class="form-control" aria-label="...">
						    </div>
						    <br>
					<?php
							$n++; $d++;
						}
					?>
				</div>
			</div>
		</td>
		<td>
			<div class="row">
				<div class="col-sm-12">
					<button type="submit" name="submit-edit-question" value="<?php echo $row["id"]; ?>" class="btn btn-success">Xong</button>
					<a class="btn btn-default" data-toggle="collapse" data-target="#editQuestion-<?php echo $row["id"]; ?>" aria-expanded="false" aria-controls="editQuestion-<?php echo $row["id"]; ?>">Hủy</a>
				</div>
			</div>
		</td>
	</form>
</tr>
<?php
	/**
	* Deleting a quetion with its answers
	*/
	if( isset($_GET['action']) && $_GET["action"] == 'delete' ){
		$query_delete = "DELETE FROM dapan WHERE cauhoiid = ".$_GET['q'];
		if (mysqli_query($con, $query_delete)) {
			$query_delete2 = "DELETE FROM cauhoi WHERE id = ".$_GET['q'];
			if (mysqli_query($con, $query_delete2)){
				redirect('index.php?page=questions');
			}
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