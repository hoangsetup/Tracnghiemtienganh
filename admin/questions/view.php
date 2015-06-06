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
		<a href="" class="label label-primary">Sửa</a>
		<a onclick="return confirm('Bạn có chắc chắn xóa?')" href="?action=delete&q=<?php echo $row["id"] ?>" class="label label-danger">Xóa</a>
	</td>
</tr>
<?php
	/**
	* Deleting a quetion with its answers
	*/
	if( isset($_GET['action']) && $_GET["action"] == 'delete' ){
		$query = "DELETE FROM dapan WHERE cauhoiid = ".$_GET['q'];
		if (mysqli_query($con, $query)) {
			$query2 = "DELETE FROM cauhoi WHERE id = ".$_GET['q'];
			if (mysqli_query($con, $query2)){
				redirect('index.php?page=questions');
			}
		}else{
			echo '<span class="label label-danger">Lỗi khi xóa</span>';
		}
	} 
?>