
<a href="<?php if(isset($_GET['previous'])) { echo '/admin/'.$_GET['previous']; } else { echo '/admin/users'; } ?>"><input type="submit" value="Назад"></a><br><br>

<form action="" method="post">
	Логин: <input type="text" name="login" value="<?php echo hc($row['login']); ?>"><?php echo @$errors['login']; ?><br><br>
	Пароль: <?php echo hc($row['password']); ?><br><br>
	Новый пароль: <input type="password" name="password"><?php echo @$errors['password']; ?><br><br>
	Доступ:
	<label><input type="radio" name="rights" <?php if ($row['access'] == 1) {echo 'checked';} else { echo ''; }?> value="open">Пользователь</label>
	<label><input type="radio" name="rights" <?php if ($row['access'] == 5) {echo 'checked';} else { echo ''; }?> value="adm">Администратор</label>
	<label><input type="radio" name="rights" <?php if ($row['access'] == 11) {echo 'checked';} else { echo ''; }?> value="ban">Бан</label><br><br>
	Электронная почта: <input type="email" name="email" value="<?php echo hc($row['email']); ?>"><br><br>
	Дата регистрации: <?php echo $row['date_registration']; ?><br><br>
	Дата последней активности: <?php echo $row['date_last_act']; ?><br><br>
	<input type="submit" value="Сохранить" name="edit"><br><br>
	<input type="submit" value="Удалить" name="delete">
</form>