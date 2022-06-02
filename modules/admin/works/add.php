<?php

if(!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	header("Location: /errors/404");
	exit();
}

if(isset($_POST['create'])) {
	$errors = [];

	if(empty($_POST['question'])) {
		$errors['question'] = 'Запишите вопрос!';
	} elseif (empty($_POST['answer1'])) {
		$errors['answer1'] = 'Запишите ответ1!';
	} elseif (empty($_POST['answer2'])) {
		$errors['answer2'] = 'Запишите ответ1!';
	} elseif (empty($_POST['answer3'])) {
		$errors['answer3'] = 'Запишите ответ1!';
	} elseif (empty($_POST['answer4'])) {
		$errors['answer4'] = 'Запишите ответ1!';
	} elseif (empty($_POST['answer5'])) {
		$errors['answer5'] = 'Запишите ответ1!';
	} elseif (empty($_POST['correct'])) {
		$errors['correct'] = 'Запишите ответ1!';
	}

	if (!count($errors)) {

		q("INSERT INTO `".$_GET['discipline']."` SET
		`question`    = '".es($_POST['question'])."',
		`answer1`    = '".es($_POST['answer1'])."',
		`answer2`    = '".es($_POST['answer2'])."',
		`answer3`    = '".es($_POST['answer3'])."',
		`answer4`    = '".es($_POST['answer4'])."',
		`answer5`    = '".es($_POST['answer5'])."',
		`correct`    = '".es($_POST['correct'])."'
		");
		$_SESSION['info'] = 'Вопрос был добавлен!';
		$_SESSION['flag'] = true;
		header('Location: /admin/works/edit?discipline='.$_GET['discipline']);
	}
}