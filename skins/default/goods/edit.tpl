<div style="width: 1170px; margin: 20px auto; text-align: left">

	<form action="" method="post">

		Категория:
		<select name="category" required>
			<option <?php if ($row['category'] == 'Шины') {
				echo 'selected';
			}?>>Шины</option>
			<option <?php if ($row['category'] == 'Подвеска') {
				echo 'selected';
			}?>>Подвеска</option>
			<option <?php if ($row['category'] == 'Электрика') {
				echo 'selected';
			}?>>Электрика</option>
			<option <?php if ($row['category'] == 'Двигатель') {
				echo 'selected';
			}?>>Двигатель</option>
			<option <?php if ($row['category'] == 'Масла') {
				echo 'selected';
			}?>>Масла</option>
		</select><?php echo @$errors['category']; ?>
		<br><br>

		Наименование: <textarea name="name"><?php echo hc($row['name']); ?></textarea><?php echo @$errors['name']; ?><br><br>
		Короткое описание: <textarea name="short_description"><?php echo hc($row['short_description']); ?></textarea><?php echo @$errors['short_description']; ?><br><br>
		Полное описание: <textarea name="description"><?php echo hc($row['description']); ?></textarea><?php echo @$errors['description']; ?><br><br>
		Цена: <input name="price" type="text" value="<?php echo hc($row['price']); ?>"><?php echo @$errors['price']; ?><br><br>
		<input type="submit" name="ok" value="Сохранить">
	</form>

</div>