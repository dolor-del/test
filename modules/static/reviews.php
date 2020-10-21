<?php

if(isset($_POST['name'], $_POST['email'], $_POST['text'])) {
	$errors = array();

	if(empty($_POST['name'])) {
		$errors['name'] = 'Empty or invalid username!';
	}

	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Invalid email value!';
	}

	if(empty($_POST['text'])) {
		$errors['text'] = 'Empty or invalid comment!';
	}

	if(!count($errors)) {
		mysqli_query($link, "INSERT INTO `comments` SET
			`name` = '".mysqli_real_escape_string($link, $_POST['name'])."',
			`text` = '".mysqli_real_escape_string($link, $_POST['text'])."',
			`email` = '".mysqli_real_escape_string($link, $_POST['email'])."',
			`date` = NOW()
			") or exit(mysqli_error($link));
	}
}

$res = mysqli_query($link, "SELECT * FROM `comments` ORDER BY `date` DESC") or exit(mysqli_error($link));

$count = mysqli_num_rows($res);

?>