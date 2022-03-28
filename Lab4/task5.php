<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 5</title>
</head>
<body>
</body>
</html>

<?php

$link = mysqli_connect("localhost", "root", "stas23");
echo "MY_SQL version: ";
echo mysqli_get_server_info($link);
mysqli_close($link);