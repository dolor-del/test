<div style="width: 1170px; margin: 20px auto; text-align: left">

	<?php if (isset($info)) { ?>
	<div style="<?php
		if ($flag) {
			echo 'background-color: #57ff53;';
		} else {
			echo 'background-color: #ff333b;';
		}
		?> height: 30px ">
		<span><?php echo $info; ?></span>
	</div>
	<?php } ?>

	<a href="?module=goods&page=add">Добавить товар</a><br><br>

	<form action="" method="post">
		<?php
		if(!mysqli_num_rows($res)) {
		?>
		<div>Список товаров пуст!</div>
		<?php
		}
		while($row = mysqli_fetch_assoc($res)) { ?>
		<div>
			<div><input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>"> <a href="?module=goods&action=delete&id=<?php echo $row['id']; ?>">УДАЛИТЬ</a> <a href="?module=goods&page=edit&id=<?php echo $row['id']; ?>">ИЗМЕНИТЬ</a> <span><?php echo $row['date_add']; ?> <?php echo $row['date_edit']; ?></span> <?php echo $row['name']; ?></div><br>
		</div>
		<?php } ?>
		<input type="submit" name="del_marks" value="УДАЛИТЬ ОТМЕЧЕННЫЕ">
	</form>

</div>