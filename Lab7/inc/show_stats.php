<?php

$db_host = "localhost";
$db_name = "stats";
$db_user = "root";
$db_password = "stas23";

$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) or
                      die("Невозможно подключиться к указанной базе данных");

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d");

$res = mysqli_query ($db, "SELECT `views`, `hosts` FROM `visits` WHERE `date`='$date'");
$row = mysqli_fetch_assoc ($res);

echo '<p>Уникальных посетителей: ' . $row['hosts'] . '<br />';
echo 'Просмотров: ' . $row['views'] . '</p>';