<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dop Task 2</title>

    <style>
        table {
            border: 0;
            border-spacing: 0;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
<?php

$mysqli = new mysqli('localhost', 'root', 'stas23', 'information_schema');

if($mysqli->connect_error) {
    die('Ошибка при подключении к БД: ' . $mysqli->connect_error);
}

$result = $mysqli->query('SELECT * FROM COLLATIONS;');

if($result->num_rows == 0) {
    echo 'Table is empty!';
}
else {
    echo '<table>';

    echo '<tr>';
    $columns = $mysqli->query('SHOW columns FROM COLLATIONS;');
    $columnNames = [];
    foreach ($columns as $column) {
        $columnName = $column['Field'];
        $columnNames[] = $columnName;
        echo "<th>$columnName</th>";
    }
    echo '</tr>';

    foreach ($result as $row) {
        echo '<tr>';

        foreach ($columnNames as $columnName) {
            echo "<td>$row[$columnName]</td>";
        }

        echo '</tr>';
    }

    echo '</table>';
}

?>
</body>
</html>