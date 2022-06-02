<a href="/admin/works"><input type="submit" value="Назад"></a><br><br>
<form action="" method="post">
	Название дисциплины: <input type="text" name="discipline"><?php echo @$errors['discipline']; ?><br><br>
	Название в таблице(на английском): <input type="text" name="table_name"><?php echo @$errors['table_name']; ?><br><br>
	<input type="submit" value="Добавить" name="create"><br><br>
</form>