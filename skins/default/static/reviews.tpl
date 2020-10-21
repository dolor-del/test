<div style="width: 1170px; text-align: left; margin: 20px auto">

	<form action="" method="post">
		<div>Name: <input type="text" name="name"></div><p><?php echo @$errors['name']; ?></p>
		<div>Email: <input type="email" name="email"></div><p><?php echo @$errors['email']; ?></p>
		<div>Comment: <textarea name="text"></textarea></div><p><?php echo @$errors['text']; ?></p>
		<div><input type="submit" name="submit" value="To send"></div>
	</form>
	<br>

	<div>Comments(<?php echo $count ?>):</div><br>
	<div>
	<?php

	if($count) {
		for($i = 1; $i <= $count; ++$i) {
			$row = mysqli_fetch_assoc($res);
			echo htmlspecialchars($row['name']).' '.htmlspecialchars($row['date']);
			echo '<div>'.nl2br($row['text']).'</div><br>';
		}
	}
	?>
</div>
