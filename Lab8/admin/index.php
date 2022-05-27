<?php include '../inc/db.php'; ?>

<h2>Статистика</h2>

<p><a href="?interval=1">За сегодня</a></p>
<p><a href="?interval=7">За последнюю неделю</a></p>

<table style="border: 1px solid gray;">

    <tr>
        <td style="border: 1px solid silver;">Дата</td>
        <td style="border: 1px solid silver;">Уникальных посетителей</td>
        <td style="border: 1px solid silver;">Просмотров</td>
    </tr>

    <?php
    if ($_GET['interval']) {
        $interval = $_GET['interval'];

        if (!is_numeric ($interval)) {
            echo '<p><b>Недопустимый параметр!</b></p>';
        }

        $res = mysqli_query($db, "SELECT * FROM `visits` ORDER BY `date` DESC LIMIT $interval");

        while ($row = mysqli_fetch_assoc($res)) {
            echo '<tr>
			     <td style="border: 1px solid gray;">' . $row['date'] . '</td>
			     <td style="border: 1px solid gray;">' . $row['hosts'] . '</td>
			     <td style="border: 1px solid gray;">' . $row['views'] . '</td>
			 </tr>';
        }
    }
    ?>

</table>
