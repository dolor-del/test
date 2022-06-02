<!-- ОТКРЫВАЕМ БЛОК С КОНТЕНТОМ -->
<div class="content">

<script>
	"use strict";

	window.onload = function () {
		document.getElementById('autho').onclick = function () {
			document.getElementById('modal').style.display = 'block';
		};
	};
</script>

<header>
	<div class="container_logo">
		<a href="/">
			ONLINE<span>TEST</span>
		</a>
	</div>
	<div class="panel_1">
		<ul>
			<?php
			if (isset($_SESSION['user'])) {
				echo '<span style="font-size: 13px">Вы вошли как <span style="color: #008000; font-weight:bold">'.hc($_SESSION['user']['login']).'</span></span>';
			}
			if ($_SERVER ['REMOTE_ADDR'] == '12.0.0.1' || ((isset($_SESSION['user']) && $_SESSION['user']['access'] == 5))) {
				echo '<li><a href="/admin/static">АДМИН</a></li>';
			}
			?>
			<li><a id="autho" style="position:relative" <?php
			if (isset($_SESSION['user'])) { echo 'href="/static/editprofile"';}
			/*else echo '/cab/authorization';*/
			?>>МОЙ АККАУНТ
					<?php if (!isset($_SESSION['user'])) { ?>
					<form action="" method="post" onSubmit="return check();" id="modal" style="display:none; position:absolute; width:200px; height:160px; top: 13px; left:-112px; background-color: white; border: 1px solid black; text-align:center; z-index: 100; line-height: 5px;">
						<p>Логин:</p><br><input type="text" id="login" name="login"><br><span id="errLogin"></span><br>
						<p>Пароль:</p><br><input type="password" id="pass" name="pass"><br><span id="errPass"></span><br><br>
						<input type="submit" value="Войти">
					</form>
					</a>
					<?php } ?>
			</li>
			<?php
			if (isset($_SESSION['user'])) {
				echo '<li><a href="/static/logout">ВЫЙТИ</a></li>';
			}
			?>
		</ul>
	</div>
</header>

<div class="black_stripe_width">
	<div class="flex_black_stripe">
		<div>
			<ul>
				<li><a href="/">Главная</a></li>
				<li><a href="#">О нас</a></li>
				<li><a href="#">Контакты</a></li>
				<li><a href="#">Политика конфиденциальности</a></li>
			</ul>
		</div>
		<div class="container_search">
			<input type="text" placeholder="Search store">
			<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		</div>
	</div>
</div>