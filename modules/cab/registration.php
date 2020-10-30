<?php

if (isset($_SESSION['user'])) {
	header("Location: /index.php?module=errors&page=404");
	exit();
}

if(isset($_POST['login'], $_POST['pass'], $_POST['email'])) {
	$errors = array();

	if(empty($_POST['login'])) {
		$errors['login'] = 'Empty or invalid username!';
	} elseif (mb_strlen($_POST['login']) < 2) {
		$errors['login'] = 'Username is too short!';
	} elseif (mb_strlen($_POST['login']) > 16) {
		$errors['login'] = 'Username is too long!';
	}

	if(mb_strlen($_POST['pass']) < 5) {
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
		`password` = '".myHash($_POST['pass'])."',
		`email`    = '".es($_POST['email'])."',
		`hash`     = '".myHash($_POST['login'].$_POST['email'])."'
		");

		$id = mysqli_insert_id($link);

		Mail::$to = $_POST['email'];
		Mail::$subject = 'Пожалуйста, подтвердите регистрацию на сайте shabo-test.ru';
		Mail::$text = 'Спасибо, что вы с нами! Чтобы иметь доступ ко всем возможностям нашего сайта, пожалуйста, завершите регистрацию, пройдя по ссылке: http://shabo-test.ru/?module=cab&page=activate&id='.$id.'&hash='.myHash($_POST['login'].$_POST['email']);
		Mail::send();

		$res = q("SELECT *
				FROM `users`
				WHERE `login` = '".es($_POST['login'])."'
				AND `password` = '".myHash($_POST['pass'])."'
				OR `email` = '".es($_POST['login'])."'
				AND `password` = '".myHash($_POST['pass'])."'
				LIMIT 1
				");

		if (mysqli_num_rows($res)) {
			$_SESSION['user'] = mysqli_fetch_assoc($res);

			header('Location: http://shabo-test.ru/');
			exit();
		} else {
			header("Location: /index.php?module=errors&page=404");
			exit();
		}
	}
}



