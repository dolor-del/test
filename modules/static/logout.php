<?php
unset($_SESSION['access']);
unset($_SESSION['login']);
unset($_SESSION['pass']);
unset($_SESSION['email']);

header('Location: http://shabo-test.ru/');
exit();
?>