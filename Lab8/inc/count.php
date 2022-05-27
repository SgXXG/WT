<?php include 'db.php';

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