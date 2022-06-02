<a href="/admin/works/edit"><input type="submit" value="Назад"></a><br><br>
<form action="" method="post">
	Вопрос: <input type="text" name="question"><?php echo @$errors['question']; ?><br><br>
	Ответ 1: <input type="text" name="answer1"><?php echo @$errors['answer1']; ?><br><br>
	Ответ 2: <input type="text" name="answer2"><?php echo @$errors['answer2']; ?><br><br>
	Ответ 3: <input type="text" name="answer3"><?php echo @$errors['answer3']; ?><br><br>
	Ответ 4: <input type="text" name="answer4"><?php echo @$errors['answer4']; ?><br><br>
	Ответ 5: <input type="text" name="answer5"><?php echo @$errors['answer5']; ?><br><br>
	Правильный ответ: <input type="text" name="correct"><?php echo @$errors['correct']; ?><br><br>
	<input type="submit" value="Добавить" name="create"><br><br>
</form>