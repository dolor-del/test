<?php

if (isset($_SESSION['user'])) {
	if ($_SESSION['user']['active'] == 0) {
		$error_active = 1;
	}
} else {
	header("Location: /index.php?module=errors&page=404");
	exit();
}

if (isset($_POST['auto_auth']) && $_POST['auto_auth'] == 'on') {
	setcookie('auto_auth', 'on', time() + 3600*24*30*12, '/');
	setcookie('id', $_SESSION['user']['id'], time() + 3600*24*30*12, '/');
	setcookie('hash', $_SESSION['user']['hash'], time() + 3600*24*30*12, '/');

	header("Location: /index.php?page=editprofile");
	exit();
}

if (isset($_POST['auto_auth']) && $_POST['auto_auth'] == 'off') {
	setcookie('auto_auth', '', time() - 3600*24*30*12, '/');
	unset($_COOKIE['auto_auth']);
	setcookie('id', '' , time() - 3600*24*30*12);
	setcookie('hash', '' , time() - 3600*24*30*12);

	header("Location: /index.php?page=editprofile");
	exit();
}