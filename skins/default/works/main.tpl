<div style="width: 1170px; margin: 20px auto">

	<?php echo @$error ?>

	<?php if(isset($flag) && $flag == 'пройден') { ?>

		<span>Вы уже проходили данный тест! Ваши результаты: </span><br><br>

		<?php echo 'Кол-во верных ответов: '.$row2['count_true'].'<br><br>Кол-во не верных ответов: '.$row2['count_false'].'<br><br>Ваша оценка :'.$row2['score']; ?>

	<?php } elseif(isset($flag) && $flag == 'завершен') { ?>

		<span>Тест завершен! Ваши результаты: </span><br><br>

		<?php echo 'Кол-во верных ответов: '.$true.'<br><br>Кол-во не верных ответов: '.$false.'<br><br>Ваша оценка :'.$score; ?>

	<?php } elseif(isset($flag) && $flag == 'пуст') { ?>

		<span>Этот тест пуст! Дождитесь, когда здесь появятся вопросы.</span>

	<?php } else { ?>

		<form action="" method="post">

			<?php
				$count = 1;
				while($row3 = mysqli_fetch_assoc($res3)) {
					echo $count.'.'; ?>
					<span style="font-weight:bold"><?php echo es($row3['question']); ?></span><br><br>

					<span style="margin-left:20px">1)</span><label style="margin-left:10px"><input type="radio" name="<?php echo 'ans'.$count ?>" value="1"><?php echo es($row3['answer1']); ?></label><br><br>
					<span style="margin-left:20px">2)</span><label style="margin-left:10px"><input type="radio" name="<?php echo 'ans'.$count ?>" value="2"><?php echo es($row3['answer2']); ?></label><br><br>
					<span style="margin-left:20px">3)</span><label style="margin-left:10px"><input type="radio" name="<?php echo 'ans'.$count ?>" value="3"><?php echo es($row3['answer3']); ?></label><br><br>
					<span style="margin-left:20px">4)</span><label style="margin-left:10px"><input type="radio" name="<?php echo 'ans'.$count ?>" value="4"><?php echo es($row3['answer4']); ?></label><br><br>
					<span style="margin-left:20px">5)</span><label style="margin-left:10px"><input type="radio" name="<?php echo 'ans'.$count ?>" value="5"><?php echo es($row3['answer5']); ?></label><br><br>
					<br><br>
			<?php
					$count++;
				}
			?>

			<br><input type="submit" name="end" value="Закончить" onClick="return areYouSure();">
		</form>

	<?php } ?>
</div>