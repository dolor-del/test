<a href="/admin"><input type="submit" value="Назад"></a><br><br>

<form action="" method="post" style="display:inline-block">
	<input type="text" name="search" value="<?php echo @$_POST['search']; ?>">
	<input type="submit" value="Поиск">
</form>

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
if (isset($_POST['search']) && $_POST['search'] != '') {
	echo '<a href="/admin/results"><input type="submit" value="Назад"></a>';
}
?>

<?php if (isset($no_results_all)) {
echo '<br>'.$no_results_all;
} else { ?>
<h1>Все студенты</h1>
<form action="" method="post">
	<table>
		<tr>
			<td><input type="checkbox" name="select_all"></td>
			<td>id</td>
			<td>Логин</td>
			<td>ФИО</td>
			<td>Дисциплина</td>
			<td>Правильные</td>
			<td>Не правильные</td>
			<td>Итогова оценка</td>
			<td>Действие</td>
		</tr>
		<?php while($row = mysqli_fetch_assoc($res)) { ?>
		<tr>
			<td><input type="checkbox" name="ids[]" value="<?php echo (int)$row['id']; ?>"></td>
			<td><?php echo (int)$row['id']; ?></td>
			<td>
				<a href="/admin/users/edit?id=<?php echo (int)$row['user_id']; ?>&previous=results"><?php echo es($row['login']); ?></a>
			</td>
			<td style="font-weight:bold"><?php echo es($row['surname']); ?></td>
			<td><?php echo es($row['discipline']); ?></td>
			<td><?php echo es($row['count_true']); ?></td>
			<td><?php echo es($row['count_false']); ?></td>
			<td><?php echo es($row['score']); ?></td>
			<td><a href="/admin/results?action=delete&id=<?php echo (int)$row['id']; ?>" onClick="return areYouSure();">УДАЛИТЬ</a></td>

		</tr>
		<?php } ?>
	</table>
	<br><input type="submit" name="del_marks" value="УДАЛИТЬ ОТМЕЧЕННЫЕ" onClick="return areYouSure();">
</form>
<?php } ?>

<?php if (isset($no_results_two)) {
echo '<br>'.$no_results_two;
} else { ?>
<h1>Двоичники</h1>
<form action="" method="post">
	<table>
		<tr>
			<td><input type="checkbox" name="select_all"></td>
			<td>id</td>
			<td>Логин</td>
			<td>ФИО</td>
			<td>Дисциплина</td>
			<td>Правильные</td>
			<td>Не правильные</td>
			<td>Итогова оценка</td>
		</tr>
		<?php while($row2 = mysqli_fetch_assoc($res2)) { ?>
		<tr>
			<td><input type="checkbox" name="ids[]" value="<?php echo (int)$row2['id']; ?>"></td>
			<td><?php echo (int)$row2['id']; ?></td>
			<td>
				<a href="/admin/users/edit?id=<?php echo (int)$row2['user_id']; ?>&previous=results"><?php echo es($row2['login']); ?></a>
			</td>
			<td style="font-weight:bold"><?php echo es($row2['surname']); ?></td>
			<td><?php echo es($row2['discipline']); ?></td>
			<td><?php echo es($row2['count_true']); ?></td>
			<td><?php echo es($row2['count_false']); ?></td>
			<td><?php echo es($row2['score']); ?></td>

		</tr>
		<?php } ?>
	</table>
</form>
<?php } ?>