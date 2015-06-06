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
					<legend>Nội dung câu hỏi</legend>
					<div class="form-group">
						<select name="cate" id="" class="form-control" required>
							<option value="" disabled selected>Thể loại</option>
							<option value="1">Từ vựng</option>
							<option value="2">Ngữ pháp</option>
							<option value="3">Phát âm</option>
						</select>
					</div>
					<div class="form-group">
						<textarea required="required" class="form-control" name="q_content" id="" cols="30" rows="8"></textarea>
					</div>
				</div>
				<!-- /Content -->
				<div class="col-xs-12 col-sm-6">
					<legend>Đáp án</legend>
					<small>Đánh dấu tích vào đáp án đúng</small>
					<br>
					<div class="input-group">
				      	<span class="input-group-addon">
				        	<input name="da" type="radio" required value="1" aria-label="...">
				      	</span>
				      	<input required="required" name="a" type="text" placeholder="Đáp án A" class="form-control" aria-label="...">
				    </div><!-- /A -->
				    <br>
			    	<div class="input-group">
			          	<span class="input-group-addon">
			            	<input name="da" type="radio" value="2" aria-label="...">
			          	</span>
			          	<input required="required" name="b" type="text" placeholder="Đáp án B" class="form-control" aria-label="...">
			        </div><!-- /B -->
			        <br>
		        	<div class="input-group">
		              	<span class="input-group-addon">
		                	<input name="da" type="radio" value="3" aria-label="...">
		              	</span>
		              	<input required="required" name="c" type="text" placeholder="Đáp án C" class="form-control" aria-label="...">
		            </div><!-- /C -->
		            <br>
		        	<div class="input-group">
		              	<span class="input-group-addon">
		                	<input name="da" type="radio" value="4" aria-label="...">
		              	</span>
		              	<input required="required" name="d" type="text" placeholder="Đáp án D" class="form-control" aria-label="...">
		            </div><!-- /D -->
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
		$query = sprintf("INSERT INTO cauhoi (noidung, userid, loaicauhoi) VALUES ('%s', '%s', '%s')",$content, $_SESSION["user_id"], $_POST["cate"]);
		if (mysqli_query($con, $query)) {
		    $last_id = mysqli_insert_id($con);
		    $query_a = sprintf("INSERT INTO dapan (cauhoiid, dadung, noidung) VALUES ('%s', '%s', '%s')",$last_id, $A_1, $A_2);
		    $query_b = sprintf("INSERT INTO dapan (cauhoiid, dadung, noidung) VALUES ('%s', '%s', '%s')",$last_id, $B_1, $B_2);
		    $query_c = sprintf("INSERT INTO dapan (cauhoiid, dadung, noidung) VALUES ('%s', '%s', '%s')",$last_id, $C_1, $C_2);
		    $query_d = sprintf("INSERT INTO dapan (cauhoiid, dadung, noidung) VALUES ('%s', '%s', '%s')",$last_id, $D_1, $D_2);
		    mysqli_query($con, $query_a);
		    mysqli_query($con, $query_b);
		    mysqli_query($con, $query_c);
		    mysqli_query($con, $query_d);
		    echo '<a class="label label-success" href="index.php?page=questions">Đã thêm 1 câu hỏi.</a>';
		    unset($_POST["submit-add-question"]);
		} else {
		    echo '<span class="label label-danger">Lỗi, không thêm được câu hỏi.</span>';
		}
	}
?>