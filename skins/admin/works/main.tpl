<a href="/admin"><input type="submit" value="Назад"></a><br><br>

<?php if (isset($info)) { ?>
<div style="<?php
	if (isset($flag)) {
		if ($flag) {
			echo 'background-color: #57ff53;';
		} else {
			echo 'background-color: #ff333b;';
		}
	} ?> height: 30px; padding-top: 5px; text-align: center ">
	<span><?php echo $info; ?></span>
</div><br>
<?php } ?>

<?php
if (isset($no_disciplines)) {
echo '<br>'.$no_disciplines;
} else { ?>

<form action="" method="post">
	<table>
		<tr>
			<td><input type="checkbox" name="select_all"></td>
			<td>id</td>
			<td>Название</td>
			<td>Действие</td>
		</tr>
	<?php while($row = mysqli_fetch_assoc($res)) { ?>
		<tr>
			<td><input type="checkbox" name="ids[]" value="<?php echo (int)$row['id']; ?>"></td>
			<td><?php echo $row['id']; ?></td>
			<td><a href="/admin/works/edit?discipline=<?php echo $row['table_name']; ?>"><?php echo $row['name']; ?></a><br><br></td>
			<td><a href="/admin/works?action=delete&id=<?php echo (int)$row['id']; ?>&discipline=<?php echo $row['table_name']; ?>" onClick="return areYouSure();">УДАЛИТЬ</a></td>
		</tr>

<?php } ?>
	</table>
	<br><input type="submit" name="del_marks" value="УДАЛИТЬ ОТМЕЧЕННЫЕ" onClick="return areYouSure();">
</form>

<?php } ?>

<br><a href="/admin/works/add_discipline"><input type="submit" name="add_user" value="ДОБАВИТЬ КОНТРОЛЬНУЮ"></a>