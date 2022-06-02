<div class="center-image">
</div>
<?php if(isset($_SESSION['user'])) { ?>
<div class="navigation-flex">



	<div class="flex-in-flex-1-center">

		<div>
			<?php while($row = mysqli_fetch_assoc($res)) { ?>
			<a href="/works?discipline=<?php echo $row['table_name']; ?>">
				<div  style="text-align:center">
					<span class="text_top"><?php echo $row['name']; ?></span><br>
				</div>
			</a>
			<?php } ?>
		</div>

	</div>

</div>

<?php } else { ?>
<div class="navigation-flex" style="font-size: 25px;"> Тесты видны только зарегистрированным пользователям. Пожалуйста, авторизуйтесь на сайте.</div>
<?php } ?>