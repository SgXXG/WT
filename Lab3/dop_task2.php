<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>dop task 2</title>
</head>          
<body>
	<form method="post">
	<h3>Введите путь к файлу</h3>
	Ваш путь: <input type="text" name="your_path" required><br>
	<br><input type="submit">
	</form>

</body>
</html>

 <?php
    if(isset($_POST['your_path'])){
		$my_path = $_POST['your_path'];		

		$array = file($my_path);
        sort($array);
        $result = "";

        for ( $i = 0; $i < count($array); $i++ ) {
            $result .= trim($array[$i])."\n";
        }   

        file_put_contents($my_path,$result);

        echo '<br>Файл отсортирован!';
    } else {
        echo '<br>Вы ещё ничего не ввели!';	
    }        