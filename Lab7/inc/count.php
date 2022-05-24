<?php include 'db.php';

$db_host = "localhost";
$db_name = "stats";
$db_user = "root";
$db_password = "stas23";

$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) or
                   die("Невозможно подключиться к указанной базе данных");

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d");

$res = mysqli_query ($db, "SELECT `visit_id` FROM `visits` WHERE `date`='$date'") or
                    die ("Проблема при подключении к БД");

if (mysqli_num_rows($res) == 0) {
    mysqli_query ($db, "DELETE FROM `ip`");

    mysqli_query ($db, "INSERT INTO `ip` SET `ip_address`='$visitor_ip'");

    $res_count = mysqli_query ($db, "INSERT INTO `visits` SET `date`='$date', `hosts`=1,`views`=1");
}

else {
    $current_ip = mysqli_query ($db, "SELECT `ip_id` FROM `ip` WHERE `ip_address`='$visitor_ip'");

    if (mysqli_num_rows ($current_ip) == 1) {
        mysqli_query ($db, "UPDATE `visits` SET `views`=`views`+1 WHERE `date`='$date'");
    }

    else {
        mysqli_query ($db, "INSERT INTO `ip` SET `ip_address`='$visitor_ip'");

        mysqli_query ($db, "UPDATE `visits` SET `hosts`=`hosts`+1,`views`=`views`+1 WHERE `date`='$date'");
    }
}