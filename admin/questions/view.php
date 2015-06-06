<?php global $row; ?>
<tr>
	<td><?php echo substr($row["noidung"], 0, 100); ?></td>
	<td>
		<a href="" class="label label-primary">Sửa</a>
		<a onclick="return confirm('Bạn có chắc chắn xóa?')" href="?action=delete&?q=<?php echo $row["id"] ?>" class="label label-danger">Xóa</a>
	</td>
</tr>