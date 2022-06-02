<?php

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	q("DELETE FROM `".$_GET['discipline']."`
	WHERE `id` = ".(int)$_GET['id']."
	");

	$_SESSION['info'] = 'Вопрос был удален!';
	$_SESSION['flag'] = true;

	header("Location: /admin/works/edit?discipline=".$_GET['discipline']);
	exit;
}

$res = q("SELECT * FROM `".$_GET['discipline']."`
					ORDER BY `id`");

if(!mysqli_num_rows($res)) {
	$no_questions = 'Список вопросов пуст';
}

if(isset($_POST['del_marks']) && isset($_POST['ids'])) {

	foreach($_POST['ids'] as $k => $v) {
		$k = (int)$v;
	}

	$ids = implode(',', $_POST['ids']);

	q("
	DELETE FROM `".$_GET['discipline']."`
	WHERE `id` IN (".$ids.")
	");

	$_SESSION['info'] = 'Выбранные вопросы были удалены!';
	$_SESSION['flag'] = true;
	header('Location: /admin/works/edit?discipline='.$_GET['discipline']);
	exit();
} elseif (isset($_POST['del_marks']) && !isset($_POST['ids'])) {
	$_SESSION['info'] = 'Вы не выбрали ни одного вопроса!';
	$_SESSION['flag'] = false;
}

if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	$flag = $_SESSION['flag'];
	unset($_SESSION['info']);
	unset($_SESSION['flag']);
}