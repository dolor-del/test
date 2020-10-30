<div style="width: 1170px; margin: 20px auto; text-align: center">
	<?php if (!isset($error_active)) { ?>

	<form method="post">
		Исользовать авто-авторизацию на сайте?<br><br>
		<label><input type="radio" <?php if (isset($_COOKIE['auto_auth']) && $_COOKIE['auto_auth'] == 'on') { echo 'checked'; } else { echo ''; } ?> name="auto_auth" value="on"> Да</label>
		<label><input type="radio" <?php if (!isset($_COOKIE['auto_auth'])) { echo 'checked'; } else { echo ''; } ?> name="auto_auth" value="off"> Нет</label><br><br>
		<input class="auth_button" type="submit" value="Save the changes">
	</form>

	<?php } else { ?>
	<p style="margin: 0">
		Редактировать профиль могут только пользователи, подтвердившие свой email!
	</p>
	<?php } ?>
</div>