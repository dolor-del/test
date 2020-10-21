<?php
$_SESSION['access'] = 0;

if(isset($_POST['login'], $_POST['pass'], $_POST['email'])) {
	$errors = array();
	if(empty($_POST['login'])) {
		$errors['login'] = 'Empty or invalid username!';
	}

	if(empty($_POST['pass'])) {
		$errors['pass'] = 'Empty or invalid password!';
	}

	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Invalid email value!';
	}

	if (!count($errors)) {
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['pass'] = $_POST['pass'];
		$_SESSION['email'] = $_POST['email'];
		mysqli_query($link,"INSERT INTO `users` SET 
			`login` = '".mysqli_real_escape_string($link, $_POST['login'])."',
			`password` = '".mysqli_real_escape_string($link, $_POST['pass'])."',
			`email` = '".mysqli_real_escape_string($link, $_POST['email'])."'") or exit(mysqli_error($link));
	}
}

if(isset($_SESSION['login'], $_SESSION['pass'], $_SESSION['email'])) {
	if($_SESSION['login'] == 'dolor' && $_SESSION['pass'] == '123' && $_SESSION['email'] == 'shaboltasivan@mail.ru') {
		$_SESSION['access'] = 1;
	}
	else {
		$_SESSION['access'] = 2;
	}
	header('Location: http://shabo-test.ru/');	exit();
}

?>