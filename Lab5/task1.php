<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 1</title>
</head>
<body>
<form method="post" >
    <textarea name="date" rows="1" cols="10"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

<?php
    if(isset($_POST['date'])) {

        $test_data = preg_replace('/[^0-9\.]/u', '', trim($_POST['date']));
        $test_data_ar = explode('.', $test_data);
        if(@checkdate($test_data_ar[1], $test_data_ar[0], $test_data_ar[2])) {
            echo '<br>Дата введена корректно '.$test_data;

            $timeZone = new DateTimeZone ( 'Europe/Minsk' );

            $datetime1 = new DateTime ( $test_data, $timeZone );
            $datetime2 = new DateTime ();

            $interval = $datetime1->diff ( $datetime2 );
            echo '<br>Ваш возраст: ';
            echo $interval->format ( '%y лет %m месяцев %d дней' );
        }
        else echo '<br>Дата введена некорректно!';
    }
    else
        echo 'Ничего не введено';