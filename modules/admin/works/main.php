<?php

$res = q("
		SELECT *
		FROM `disciplines`
		ORDER BY `id`
		");

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	q("DELETE FROM `disciplines`
	WHERE `id` = ".(int)$_GET['id']."
	");
	q("DROP TABLE `".$_GET['discipline']."`");
	$_SESSION['info'] = 'Предмет был удален!';
	$_SESSION['flag'] = true;
	header("Location: /admin/works");
	exit;
}

$res = q("SELECT * FROM `disciplines`
					ORDER BY `id`");

if(!mysqli_num_rows($res)) {
	$no_disciplines = 'Список предметов пуст';
}

if(isset($_POST['del_marks']) && isset($_POST['ids'])) {

	foreach($_POST['ids'] as $k => $v) {
		$k = (int)$v;
	}

	$ids = implode(',', $_POST['ids']);

	q("
	DELETE FROM `disciplines`
	WHERE `id` IN (".$ids.")
	");

	$_SESSION['info'] = 'Выбранные предметы были удалены!';
	$_SESSION['flag'] = true;
	header('Location: /admin/works');
	exit();
} elseif (isset($_POST['del_marks']) && !isset($_POST['ids'])) {
	$_SESSION['info'] = 'Вы не выбрали ни одного предмета!';
	$_SESSION['flag'] = false;
}

if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	$flag = $_SESSION['flag'];
	unset($_SESSION['info']);
	unset($_SESSION['flag']);
}