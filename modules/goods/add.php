<?php


if(isset($_POST['category'], $_POST['name'], $_POST['short_description'], $_POST['description'], $_POST['price'], $_POST['ok'])) {

	mysqli_query($link, "
	INSERT INTO `goods` SET
	`category` 			= '".mysqli_real_escape_string($link, $_POST['category'])."',
	`name` 				= '".mysqli_real_escape_string($link, $_POST['name'])."',
	`short_description` = '".mysqli_real_escape_string($link, $_POST['short_description'])."',
	`description`	 	= '".mysqli_real_escape_string($link, $_POST['description'])."',
	`price` 			= '".(float)$_POST['price']."',
	`date_add` 			= NOW()
	") or exit(mysqli_error($link));

	$_SESSION['add_ok'] = true;
	header('Location: http://shabo-test.ru/?module=goods');
	exit();
} else $_SESSION['add_ok'] = false;

