<?php

if (isset($_SESSION['user']['access']) && $_SESSION['user']['access'] == 11) {
	header("Location: /index.php?module=errors&page=404");
	exit();
}

if (isset($_SESSION['user'])) {
	$res = q("SELECT *
			FROM `users`
			WHERE `id` = '".es($_SESSION['user']['id'])."'
			LIMIT 1
			");

	if (mysqli_num_rows($res)) {
		$_SESSION['user'] = mysqli_fetch_assoc($res);
	}
} elseif (isset($_COOKIE['id'], $_COOKIE['hash'])) {
	$res = q("SELECT *
			FROM `users`
			WHERE `id` = '".es($_COOKIE['id'])."'
			AND `hash` = '".es($_COOKIE['hash'])."'
			LIMIT 1
			");

	if (mysqli_num_rows($res)) {
		$_SESSION['user'] = mysqli_fetch_assoc($res);
	}
}