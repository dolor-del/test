<?php

if (isset($_SESSION['user']) && $_SESSION['user']['active'] != 0) {
	if(isset($_POST['text'])) {
		$errors = array();

		/*if(empty($_POST['name'])) {
			$errors['name'] = 'Empty or invalid username!';
		}

		if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = 'Invalid email value!';
		}*/

		if(empty($_POST['text'])) {
			$errors['text'] = 'Empty comment!';
		}

		if(!count($errors)) {
			q("INSERT INTO `comments` SET
			`name` = '".es($_SESSION['user']['login'])."',
			`text` = '".es($_POST['text'])."',
			`email` = '".es($_SESSION['user']['email'])."',
			`date` = NOW()
			");
		}
	}

	$res = q("SELECT * FROM `comments` ORDER BY `date` DESC");

	$count = mysqli_num_rows($res);
} else {
	$error_comment_noauth = 1;
}

?>