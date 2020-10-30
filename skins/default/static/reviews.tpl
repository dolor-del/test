<div style="width: 1170px; text-align: left; margin: 20px auto">

	<?php if (!isset($error_comment_noauth)) { ?>
	<form action="" method="post">
		<!--<div>Name: <input type="text" name="name"></div><p><?php echo @$errors['name']; ?></p>
		<div>Email: <input type="email" name="email"></div><p><?php echo @$errors['email']; ?></p>-->
		<div>
		<span style="vertical-align:top">Comment: </span><textarea class="auth_text" style="height: 80px" name="text"></textarea></div>
		<span style="color: #ff0000"><?php echo @$errors['text']; ?></span>
		<div><input class="auth_button" type="submit" name="submit" value="To send"></div>
	</form>
	<br>

	<div>Comments(<?php echo $count ?>):</div><br>
	<div>
	<?php

	if($count) {
		for($i = 1; $i <= $count; ++$i) {
			$row = mysqli_fetch_assoc($res);
			echo hc($row['name']).' '.hc($row['date']);
			echo '<div>'.nl2br($row['text']).'</div><br>';
		}
	}
	?>
	<?php } else { ?>
	Комментарии доступны только пользователям, прошедшим <a href="?module=cab&page=authorization">авторизацию</a> и подтверждение адреса эл.почты!
	<?php } ?>

</div>
