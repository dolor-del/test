<?php
error_reporting(-1);
ini_set('display_errors',1);
header('Content-Type: text/html; charset=utf-8');
session_start();

// Конфиг сайта
include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

$link = mysqli_connect(Core::$DB_LOCAL, Core::$DB_LOGIN, Core::$DB_PASS, Core::$DB_NAME);
mysqli_set_charset($link, 'utf8');
include_once './modules/allpages.php';

// Роутер
include './modules/'.$_GET['module'].'/'.$_GET['page'].'.php';
include './skins/'.Core::$SKIN.'/index.tpl';