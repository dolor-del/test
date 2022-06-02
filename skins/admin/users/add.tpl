<a href="/admin/users"><input type="submit" value="Назад"></a><br><br>
<form action="" method="post">
	Логин: <input type="text" name="login"><?php echo @$errors['login']; ?><br><br>
	Пароль: <input type="text" name="pass"><?php echo @$errors['pass']; ?><br><br>
	Доступ:
	<label><input type="radio" name="access" value="1">Пользователь</label>
	<label><input type="radio" name="access" value="5">Администратор</label><br><br>
	Электронная почта: <input type="email" name="email"><?php echo @$errors['email']; ?><br><br>
	Фамилия: <input type="text" name="surname"><?php echo @$errors['surname']; ?><br><br>
	<input type="submit" value="Создать" name="create"><br><br>
</form>