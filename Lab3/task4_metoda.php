<!DOCTYPE html>
<html>
<head>
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

    $text = preg_replace('/([A-ZА-ЯЁ][a-zа-яёA-ZА-ЯЁ]*)/u', "<p class=\"green\">$0</p>", $text);
    $text = preg_replace('/([0-9]+[.,][0-9]{1})\d*/u', "<p class=\"red\">$1</p>", $text);
    $text = preg_replace('/(^-?\d*(\.,\d+)?$)/u', "<p class=\"blue\">$0</p>", $text);

    echo $text;
}
?>