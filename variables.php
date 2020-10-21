<?php

$allowed = array('cab', 'errors', 'news', 'static', 'voting', 'goods');
if(!isset($_GET['module'])) {
	$_GET['module'] = 'static';
} elseif(!in_array($_GET['module'],$allowed)) {
	header("Location: /index.php?module=errors&page=404");
	exit();
}

if(!isset($_GET['page'])) {
	$_GET['page'] = 'main';
}

// КОСТЫЛЬ!!!
if(isset($_GET['start_over']) || isset($_GET['input_number'])) {
	$_GET['page'] = 'game';
}

if(isset($_GET['link'])) {
	$_GET['page'] = 'file_system';
}

?>