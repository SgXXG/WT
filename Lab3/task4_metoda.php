<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 4 Metoda</title>
    <style>
        .green{
            color: greenyellow;
        }
        .blue {
            color: dodgerblue;
        }
        .red {
            color: orangered;
        }
        p {
            display: inline;
        }
    </style>
</head>
<body>
<form method="post" >
    <textarea name="comment" rows="5" cols="40"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
<?php
if(isset($_POST['comment'])){
    $text = " ".$_POST['comment']." ";
    echo $text."<br>";

    //$text = preg_replace('/([A-ZА-ЯЁ][a-zа-яёA-ZА-ЯЁ]*)/u', "<p class=\"green\">$0</p>", $text);
    //$text = preg_replace('/([0-9]+[.,][0-9]{1})\d*/u', "<p class=\"red\">$1</p>", $text);
    //$text = preg_replace('/(^-?\d*)/u', "<p class=\"blue\">$0</p>", $text);

    $text = preg_replace('/([^>]?[A-ZА-ЯЁ][a-zа-яё]*)/u', " <p class=\"green\">$0</p> ", $text);
    $text = preg_replace('/([0-9]+[.,][0-9]{1})\d*/u', " <p class=\"red\">$1</p> ", $text);
    $text = preg_replace('/([^A-ZА-ЯЁa-zа-яё.][0-9]+[ ])/u', " <p class=\"blue\">$0</p> ", $text);

    echo $text;
}
?>