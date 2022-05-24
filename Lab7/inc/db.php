<?php
$db_host = "localhost";
$db_name = "stats";
$db_user = "root";
$db_password = "stas23";

$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) or
                      die("Невозможно подключиться к указанной базе данных");