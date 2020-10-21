<?php

$res = mysqli_query($link, "SELECT * FROM `goods` ORDER BY `date_add` DESC") or exit(mysqli_error($link));



if(isset($_SESSION['add_ok']) && $_SESSION['add_ok']) {
	$add_ok = $_SESSION['add_ok'];
	unset($_SESSION['add_ok']);
}


