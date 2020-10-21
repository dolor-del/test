<?php
$error_input_repeat = 'Incorrect input! Try again...';

if(!isset($_SESSION['hp_client']) || isset($_GET['start_over'])) {
	$_SESSION['hp_client'] = START_HP;
	$_SESSION['hp_bot'] = START_HP;
}

if (isset($_SESSION['lose'])) {
	unset($_SESSION['lose']);
}

if (isset($_SESSION['damage_client']) || isset($_SESSION['damage_bot'])) {
	unset($_SESSION['damage_client']);
	unset($_SESSION['damage_bot']);
}

if(isset($_GET['input_number'])) {
	$input = (int)$_GET['input_number'];
}

if(isset($input) && ($input >= START_INPUT && $input <= END_INPUT)) {

	if($input == rand(START_RANDOM_COUNT, END_RANDOM_COUNT)) {
		$_SESSION['damage_client'] = rand(START_RANDOM_DAMAGE, END_RANDOM_DAMAGE);
		$_SESSION['hp_client'] -= $_SESSION['damage_client'];
		if ($_SESSION['hp_client'] <= GAME_OVER_HP) {
			$_SESSION['hp_client'] = START_HP;
			$_SESSION['hp_bot'] = START_HP;
			$_SESSION['lose'] = 'You lose!';
		}
	} else {
		$_SESSION['damage_bot'] = rand(START_RANDOM_DAMAGE, END_RANDOM_DAMAGE);
		$_SESSION['hp_bot'] -= $_SESSION['damage_bot'];
		if ($_SESSION['hp_bot'] <= GAME_OVER_HP) {
			$_SESSION['hp_client'] = START_HP;
			$_SESSION['hp_bot'] = START_HP;
			$_SESSION['lose'] = 'You win!';
		}
	}
	unset($_SESSION['error_input']);
} elseif (isset($_GET['input_number']) && empty(($_GET['input_number']))) {
	$_SESSION['error_input'] = $error_input_repeat;
} elseif(!isset($_GET['input_number'])) {
	unset($_SESSION['error_input']);
} else $_SESSION['error_input'] = $error_input_repeat;

if(isset($_SESSION['lose'])) {
	if ($_SESSION['lose'] == 'You lose!') {
		$img_client = './img/client_lose.jpg';
	} elseif ($_SESSION['lose'] == 'You win!') {
		$img_client = './img/client_win.jpg';
	}
} else $img_client = './img/client.jpg';

if(isset($_SESSION['lose'])) {
	if ($_SESSION['lose'] == 'You lose!') {
		$img_bot = './img/bot_win.jpg';
	} elseif ($_SESSION['lose'] == 'You win!') {
		$img_bot = './img/bot_lose.jpg';
	}
} else $img_bot = './img/bot.jpg';

?>