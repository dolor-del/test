<?php

if (isset($_GET['hash'], $_GET['id'])) {
	$res = q("
	SELECT * 
	FROM `users`
	WHERE `id` = ".$_GET['id']."
	AND `hash` = '".es($_GET['hash'])."'
	LIMIT 1
	");
	if (mysqli_num_rows($res)) {
		$row = mysqli_fetch_assoc($res);
		q("
		UPDATE `users` SET
		`active` = 1,
		`hash` = '".myHash($row['id'].$row['login'].$row['email'])."'
		WHERE `hash` = '".es($_GET['hash'])."'
		LIMIT 1
		");
		$info = 'Поздравляем, '.$row['login'].'! Ваша почта была успешно подтверждена. Добро пожаловать на наш сайт!';
	} else {
		header("Location: /index.php?module=errors&page=404");
		exit();
	}
} else {
	header("Location: /index.php?module=errors&page=404");
	exit();
}