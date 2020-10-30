<!-- ОТКРЫВАЕМ БЛОК С КОНТЕНТОМ -->
<div class="content">

<header>
	<div class="container_logo">
		<a href="/">
			SPARE<span>PARTS</span>
		</a>
	</div>
	<div class="panel_1">
		<ul>
			<?php
			if (isset($_SESSION['user'])) {
				echo '<span style="font-size: 13px">You are logged in as <span style="color: #008000; font-weight:bold">'.hc($_SESSION['user']['login']).'</span></span>';
			}
			if ($_SERVER ['REMOTE_ADDR'] == '12.0.0.1' || (isset($_SESSION['user']) && $_SESSION['user']['access'] == 5)) {
				echo '<li><a href="?page=admin_panel">ADMIN</a></li>';
			}
			?>
			<li><a href="<?php
			if (isset($_SESSION['user'])) echo '?page=editprofile';
			else echo '?module=cab&page=authorization';
			?>">MY ACCOUNT</a></li>
			<?php
			if (isset($_SESSION['user'])) {
				echo '<li><a href="?page=logout">LOG OUT</a></li>';
			}
			?>
			<li><a href="#">WISHLIST</a></li>
			<li><a href="#">USD</a></li>
			<li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</header>

<div class="black_stripe_width">
	<div class="flex_black_stripe">
		<div>
			<ul>
				<li><a href="#">Specials</a></li>
				<li><a href="#">Categories</a></li>
				<li><a href="#">Quick Links</a></li>
				<li><a href="?page=reviews">Reviews</a></li>
				<li><a href="?page=file_system">File system</a></li>
				<li><a href="?page=game">Game</a></li>
			</ul>
		</div>
		<div class="container_search">
			<input type="text" placeholder="Search store">
			<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		</div>
	</div>
</div>