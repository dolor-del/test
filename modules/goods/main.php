<?php

if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	header("Location: /index.php?module=errors&page=404");
	exit();
}

$res = q("SELECT * FROM `goods` ORDER BY `date_add` DESC");

if (isset($_POST['del_marks']) && isset($_POST['ids'])) {

	foreach($_POST['ids'] as $k => $v) {
		$k = (int)$v;
	}

	$ids = implode(',', $_POST['ids']);

	q("
	DELETE FROM `goods`
	WHERE `id` IN (".$ids.")
	");

	$_SESSION['info'] = 'Выбранные товары были удалены!';
	$_SESSION['flag'] = true;
	header('Location: http://shabo-test.ru/?module=goods');
	exit();

} elseif (isset($_POST['del_marks']) && !isset($_POST['ids'])) {
	$_SESSION['info'] = 'Вы не выбрали ни одного товара!';
	$_SESSION['flag'] = false;
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	q("
	DELETE FROM `goods`
	WHERE `id` = ".(int)$_GET['id']."
	");

	$_SESSION['info'] = 'Товар был удален!';
	$_SESSION['flag'] = true;
	header('Location: http://shabo-test.ru/?module=goods');
	exit();
}

if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	$flag = $_SESSION['flag'];
	unset($_SESSION['info']);
	unset($_SESSION['flag']);
}

?>