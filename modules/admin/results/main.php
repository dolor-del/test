<?php

if (isset($_POST['search']) && $_POST['search'] != '') {
	$res = q("SELECT * FROM `results`
	WHERE `login` LIKE '%".es($_POST['search'])."%'
	OR `surname` LIKE '%".es($_POST['search'])."%'
	ORDER BY `login`");
	$res2 = q("SELECT * FROM `results`
	WHERE (`login` LIKE '%".es($_POST['search'])."%'
	AND `score` = 2)
	OR (`surname` LIKE '%".es($_POST['search'])."%'
	AND `score` = 2)
	ORDER BY `login`");
} else {
	$res = q("SELECT * FROM `results`
			ORDER BY `surname`");

	$res2 = q("SELECT * FROM `results`
			WHERE `score` = 2
			ORDER BY `surname`");
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	q("DELETE FROM `results`
	WHERE `id` = ".(int)$_GET['id']."
	");

	$_SESSION['info'] = 'Результат был удален!';
	$_SESSION['flag'] = true;

	header("Location: /admin/results");
	exit;
}

if(!mysqli_num_rows($res)) {
	$no_results_all = 'Список результатов пуст!';
}

if(!mysqli_num_rows($res2)) {
	$no_results_two = 'Список двоичников пуст!';
}

if(isset($_POST['del_marks']) && isset($_POST['ids'])) {

	foreach($_POST['ids'] as $k => $v) {
		$k = (int)$v;
	}

	$ids = implode(',', $_POST['ids']);

	q("
	DELETE FROM `results`
	WHERE `id` IN (".$ids.")
	");

	$_SESSION['info'] = 'Выбранные результаты были удалены!';
	$_SESSION['flag'] = true;
	header('Location: /admin/results');
	exit();
} elseif (isset($_POST['del_marks']) && !isset($_POST['ids'])) {
	$_SESSION['info'] = 'Вы не выбрали ни одного результата!';
	$_SESSION['flag'] = false;
}

if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	$flag = $_SESSION['flag'];
	unset($_SESSION['info']);
	unset($_SESSION['flag']);
}