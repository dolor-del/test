<?php

setcookie('id', '' , time() - 3600*24*30*12);
setcookie('hash', '' , time() - 3600*24*30*12);
session_unset();
unset($_SESSION['user']);
session_destroy();

header('Location: http://shabo-test.ru/');
exit();
?>