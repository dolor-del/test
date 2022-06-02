<?php

if(!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	header("Location: /errors/404");
	exit();
}

if(isset($_POST['create'])) {
	$errors = [];

	if(empty($_POST['discipline'])) {
		$errors['discipline'] = 'Запишите название!';
	} elseif(empty($_POST['table_name'])) {
		$errors['table_name'] = 'Запишите название таблицы!';
	}

	if (!count($errors)) {

		q("INSERT INTO `disciplines` SET
		`name`    		= '".es($_POST['discipline'])."',
		`table_name`    = 'questions_".es($_POST['table_name'])."'
		");

		q("
		CREATE TABLE `main`.`questions_".$_POST['table_name']."` ( `id` INT NOT NULL AUTO_INCREMENT , `question` TEXT NOT NULL , `answer1` VARCHAR(255) NOT NULL , `answer2` VARCHAR(255) NOT NULL , `answer3` VARCHAR(255) NOT NULL , `answer4` VARCHAR(255) NOT NULL , `answer5` VARCHAR(255) NOT NULL , `correct` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
		");

		$_SESSION['info'] = 'Предмет был добавлен!';
		$_SESSION['flag'] = true;
		header('Location: /admin/works');
	}
}