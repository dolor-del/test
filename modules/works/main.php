<?php

$res1 = q("
		SELECT `name`
		FROM `disciplines`
		WHERE `table_name` = '".$_GET['discipline']."'
		LIMIT 1
		");

$row1 = mysqli_fetch_assoc($res1);

$res2 = q("
	SELECT *
	FROM `results`
	WHERE `login` = '".$_SESSION['user']['login']."'
	AND `discipline` = '".$row1['name']."'
	LIMIT 1
	");

if ($row2 = mysqli_fetch_assoc($res2)) {
	$flag = 'пройден';
} else {
	$res3 = q("
	SELECT *
	FROM `".$_GET['discipline']."`
	ORDER BY `id`
	");

	if (!mysqli_num_rows($res3)) {
		$flag = 'пуст';
	}

	if(isset($_POST['end'])) {

		for ($i = 1; $i <= mysqli_num_rows($res3); $i++) {
			if(!isset($_POST['ans'.$i])) {
				$error = '<span style="color:#8b0202">Вы ответили не на все вопросы!</span><br><br>';
			}
		}

		if(!isset($error)) {

			$count = 1;
			$true = 0;
			$false = 0;

			while($row3 = mysqli_fetch_assoc($res3)) {
				if($_POST['ans'.$count] == $row3['correct']) {
					$true++;
				} else {
					$false++;
				}
				$count++;
			}

			$summ = $true + $false;
			$portion = ($false * 100)/$summ;

			if ($portion >= 0 && $portion <= 10) {
				$score = 5;
			} elseif($portion >= 11 && $portion <= 20) {
				$score = 4;
			} elseif($portion >= 21 && $portion <= 30) {
				$score = 3;
			} else {
				$score = 2;
			}

			$res4 = q("
				INSERT INTO `results` SET
				`user_id`    = '".es($_SESSION['user']['id'])."',
				`login`    = '".es($_SESSION['user']['login'])."',
				`surname`    = '".es($_SESSION['user']['surname'])."',
				`discipline`    = '".$row1['name']."',
				`count_true`    = ".(int)$true.",
				`count_false`    = ".(int)$false.",
				`score`    = ".(int)$score."
				");

			$flag = 'завершен';
		}
	}
}