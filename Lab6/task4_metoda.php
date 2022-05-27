<?php

if(isset($_GET['name'])){
    setcookie($_GET['name'], null, -1);
    header("Location: task4_metoda.php");
}

?>
<!DOCTYPE html>
<html>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Task 4 Metoda</title>
	<body>
		<form method="POST">
			Название cookie:<br>
				<input type="text" name="name" required /><br>
			Значение cookie:<br>
				<input type="text" name="value" required /><br>
			Время действия cookie:<br>
			Количество дней:<br>
				<input type="text" name="days"/><br>
			Количество часов:<br>
				<input type="text" name="hours"/><br>
			Количество минут:<br>
				<input type="text" name="minutes"/><br>
			Количество секунд:<br>
				<input type="text" name="seconds"/><br>
				<input name="submit" type="submit" name="button_add" value="Добавить cookie"/>		
		</form>
	</body>
</html>
<?php

if(isset($_POST['submit'])){
    include('setcookie_task4_metoda.php');
    echo "<script>location.reload();</script>";
}

if (count($_COOKIE) == 0) {
	echo "<br>Список cookie в настоящее время пуст!" . "<br><br>";
} else {

	echo "<br><b>Название</b> -> <b>Значение</b>" . "<br>";
	foreach ($_COOKIE as $key => $value) {			
		echo '<a href="task4_metoda.php?name='.$key.'">Удалить</a>  '.$key." -> ".$value."<br>";
	}
}