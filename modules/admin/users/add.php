<?php

if(!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	header("Location: /errors/404");
	exit();
}

if(isset($_POST['login'], $_POST['pass'], $_POST['email'])) {
	$errors = [];

	if(empty($_POST['login'])) {
		$errors['login'] = 'Empty or invalid username!';
	} elseif (mb_strlen($_POST['login']) < 2) {
		$errors['login'] = 'Username is too short!';
	} elseif (mb_strlen($_POST['login']) > 16) {
		$errors['login'] = 'Username is too long!';
	} elseif (empty($_POST['surname'])) {
		$errors['surname'] = 'Empty or invalid surname!';
	}

	if(mb_strlen($_POST['pass']) < 4) {
		$errors['pass'] = 'The password must contain at least 4 characters!';
	}

	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Invalid email value!';
	}

	if (!count($errors)) {
		$res = q("SELECT `id`
				FROM `users`
				WHERE `login` = '".es($_POST['login'])."'
				LIMIT 1
				");

		if (mysqli_num_rows($res)) {
			$errors['login'] = 'Такой логин уже существует!';
		}

		$res = q("SELECT `id`
				FROM `users`
				WHERE `email` = '".es($_POST['email'])."'
				LIMIT 1
				");

		if (mysqli_num_rows($res)) {
			$errors['email'] = 'Такой email уже существует!';
		}
	}

	if (!count($errors)) {

		q("INSERT INTO `users` SET
		`login`    = '".es($_POST['login'])."',
		`password` = '".$_POST['pass']."',
		`email`    = '".es($_POST['email'])."',
		`hash`     = '".myHash($_POST['login'].$_POST['email'])."',
		`active`     = 1,
		`access`     = '".es($_POST['access'])."',
		`date_registration` = NOW(),
		`surname` = '".es($_POST['surname'])."'
		");
		$_SESSION['info'] = 'Пользователь был добавлен!';
		$_SESSION['flag'] = true;
		header('Location: /admin/users');
	}
}