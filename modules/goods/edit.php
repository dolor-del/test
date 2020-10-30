<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	header("Location: /index.php?module=errors&page=404");
	exit();
}

$res = q("
SELECT *
FROM `goods`
WHERE `id` = ".(int)$_GET['id']."
LIMIT 1
");

if(!mysqli_num_rows($res)) {
	$_SESSION['info'] = 'Товара не существует!';
	$_SESSION['flag'] = false;
	header('Location: http://shabo-test.ru/?module=goods');
	exit();
}

$row = mysqli_fetch_assoc($res);

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
		UPDATE `goods` SET
		`category` 			= '".es($_POST['category'])."',
		`name` 				= '".es($_POST['name'])."',
		`short_description` = '".es($_POST['short_description'])."',
		`description`	 	= '".es($_POST['description'])."',
		`price` 			= '".(float)$_POST['price']."',
		`date_edit` 		= NOW()
		WHERE `id` = ".(int)$_GET['id']."
		");

		$_SESSION['info'] = 'Данные о товаре были изменены!';
		$_SESSION['flag'] = true;
		header('Location: http://shabo-test.ru/?module=goods');
		exit();
	}

}

if(isset($_POST['category'])) {
	$row['category'] = $_POST['category'];
}

if(isset($_POST['name'])) {
	$row['name'] = $_POST['name'];
}

if(isset($_POST['short_description'])) {
	$row['short_description'] = $_POST['short_description'];
}

if(isset($_POST['description'])) {
	$row['description'] = $_POST['description'];
}

if(isset($_POST['price'])) {
	$row['price'] = $_POST['price'];
}

?>