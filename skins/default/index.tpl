<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo @TITLE; ?></title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link href="/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="/css/style.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="/img/favicon.png" rel="shortcut icon">
</head>
<body>

<?php
include './modules/static/header.php';
include './skins/'.SKIN.'/static/header.tpl';

include $_GET['module'].'/'.$_GET['page'].'.tpl';

include './modules/static/footer.php';
include './skins/'.SKIN.'/static/footer.tpl';
?>

</body>
</html>