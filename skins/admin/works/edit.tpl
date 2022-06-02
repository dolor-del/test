<a href="/admin/works"><input type="submit" value="Назад"></a><br><br>

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
if (isset($no_questions)) {
echo '<br>'.$no_questions;
} else { ?>

	<form action="" method="post">
		<table>
			<tr>
				<td><input type="checkbox" name="select_all"></td>
				<td>id</td>
				<td>Вопрос</td>
				<td>Ответ 1</td>
				<td>Ответ 2</td>
				<td>Ответ 3</td>
				<td>Ответ 4</td>
				<td>Ответ 5</td>
				<td>Правильный ответ</td>
			</tr>
			<?php while($row = mysqli_fetch_assoc($res)) { ?>
			<tr>
				<td><input type="checkbox" name="ids[]" value="<?php echo (int)$row['id']; ?>"></td>
				<td><?php echo (int)$row['id']; ?></td>
				<td style="font-weight:bold"><?php echo es($row['question']); ?></td>
				<td><?php echo es($row['answer1']); ?></td>
				<td><?php echo es($row['answer2']); ?></td>
				<td><?php echo es($row['answer3']); ?></td>
				<td><?php echo es($row['answer4']); ?></td>
				<td><?php echo es($row['answer5']); ?></td>
				<td><?php echo es($row['correct']); ?></td>
				<td><a href="/admin/works/edit?action=delete&id=<?php echo (int)$row['id']; ?>&discipline=<?php echo $_GET['discipline']; ?>" onClick="return areYouSure();">УДАЛИТЬ</a></td>

			</tr>
			<?php } ?>
		</table>
		<br><input type="submit" name="del_marks" value="УДАЛИТЬ ОТМЕЧЕННЫЕ" onClick="return areYouSure();">
	</form>

<?php } ?>

<br><a href="/admin/works/add?discipline=<?php echo $_GET['discipline']; ?>"><input type="submit" name="add_question" value="ДОБАВИТЬ ВОПРОС"></a>