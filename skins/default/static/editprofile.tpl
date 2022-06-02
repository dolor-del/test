<div style="width: 1170px; margin: 20px auto; text-align: center">
	<?php if (!isset($error_active)) { ?>

	<form action="" method="post" enctype="multipart/form-data">
		Фото: <br><br><img src="<?php echo @$_SESSION['user']['photo']; ?>" alt="photo"><br><br>
		<input type="file" name="file" accept="image/*"><br><br>
		Возраст: <input type="text" name="age" value="<?php echo $_SESSION['user']['age']; ?>"><br><br>
		<input  name="submit" class="auth_button" type="submit" value="Save the changes">
	</form>

	<?php } else { ?>
	<p style="margin: 0">
		Редактировать профиль могут только пользователи, подтвердившие свой email!
	</p>
	<?php } ?>
</div>