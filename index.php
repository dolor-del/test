<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();

// Конфиг сайта
include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

$link = mysqli_connect(DB_LOCAL, DB_LOGIN, DB_PASS, DB_NAME);
mysqli_set_charset($link, 'utf8');

/*$res = mysqli_query($link, "SELECT *
FROM `users`
ORDER BY `id`") or exit(mysqli_error($link));

if (mysqli_num_rows($res)) {
	echo '<div>Всего '.mysqli_num_rows($res).' записей</div><br>';
	while ($row = mysqli_fetch_assoc($res)) {
		echo '<div>Пользователь: '.htmlspecialchars($row['login']).'</div>';
	}
} else {
	echo 'Нет записей';
}*/

// Роутер
include './modules/'.$_GET['module'].'/'.$_GET['page'].'.php';
include './skins/'.SKIN.'/index.tpl';