<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 4</title>
</head>
<body>
<?php

class SmartDate{
    private DateTime $date;

    public function __construct(DateTime $date) {
        $this->date = $date;
    }

    public function isWeekend(): bool {
        return intval($this->date->format('N')) >= 6;
    }

    public function daysToNow(): int {
        return $this->date->diff(new DateTime(), true)->format("%a");
    }

    public function isLeapYear(): bool {
        return $this->date->format('L') == '1';
    }
}

function check(string $format = 'now') {
    $smartDate = new SmartDate(new DateTime($format));
    echo 'Format: ' . $format . '<br>';
    echo 'Is weekend: ';
    echo ($smartDate->isWeekend() ? 'true' : 'false') . '<br>';
    echo 'Days to Now: ';
    echo $smartDate->daysToNow() . ' days' . '<br>';
    echo 'Is Leap year: ';
    echo ($smartDate->isLeapYear() ? 'true' : 'false') . '<br>';

    echo '<br>';
}

check();
check('2022-03-20');
check('2021-03-20');
check('2024-03-20');

?>
</body>
</html>
