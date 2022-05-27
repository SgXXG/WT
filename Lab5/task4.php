<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 4</title>
</head>
<body>
    <form method="post" >
        <textarea name="text" rows="3" cols="30"></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
if(isset($_POST['text'])) {
    $text = "".$_POST['text']."";
    echo $text."<br>";

    foreach (count_chars($text, 1) as $i => $val) {
        echo '<br>';
        echo "\"" , chr($i) , "\" встречается в строке $val раз(а).\n";
    }

}
else
    echo 'Ничего не введено';

