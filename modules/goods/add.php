<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	header("Location: /index.php?module=errors&page=404");
	exit();
}

if(isset($_POST['category'], $_POST['name'], $_POST['short_description'], $_POST['description'], $_POST['price'], $_POST['ok'])) {

	$errors = array();

	if (empty($_POST['category'])) {
		$errors['category'] = 'Выберите категорию!';
	}

	if (empty($_POST['name'])) {
		$errors['name'] = 'Заполните наименование!';
	}

	if (empty($_POST['short_description'])) {
		$errors['short_description'] = 'Заполните описание!';
	}

	if (empty($_POST['description'])) {
		$errors['description'] = 'Заполните описание!';
	}

	if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
		$errors['price'] = 'Пустая или неверная цена!';
	}

	if(!count($errors)) {

		q("
		INSERT INTO `goods` SET
		`category` 			= '".es($_POST['category'])."',
		`name` 				= '".es($_POST['name'])."',
		`short_description` = '".es($_POST['short_description'])."',
		`description`	 	= '".es($_POST['description'])."',
		`price` 			= '".(float)$_POST['price']."',
		`date_add` 			= NOW()
		");

		$_SESSION['info'] = 'Товар был добавлен!';
		$_SESSION['flag'] = true;
		header('Location: http://shabo-test.ru/?module=goods');
		exit();
	}

}

?>