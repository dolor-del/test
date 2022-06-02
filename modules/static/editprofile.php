<?php

if (isset($_SESSION['user'])) {

	if (isset($_POST['submit'])) {

		$photo = upload(1, 100, 100);

		if ($photo) {
			q("
				UPDATE `users` SET
				`age` 		= '".$_POST['age']."',
				`photo` 	= '".$photo."'
				WHERE `id` = ".(int)$_SESSION['user']['id']."
			");
			$_SESSION['user']['photo'] = $photo;
			$_SESSION['user']['age'] = $_POST['age'];
		} else {
			q("
				UPDATE `users` SET
				`age` 		= '".$_POST['age']."'
				WHERE `id` = ".(int)$_SESSION['user']['id']."
			");
			$_SESSION['user']['age'] = $_POST['age'];
		}
	}

} else {
	header("Location: /errors/404");
	exit();
}