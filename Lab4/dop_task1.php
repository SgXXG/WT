<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dop Task 1</title>

    <style>
        table, th, td {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
<?php

class TableBuilder {
    private string $text;
    private int $columnCount;

    public function __construct(array $headerNames) {
        $this->columnCount = count($headerNames);

        if($this->columnCount < 1){
            throw new InvalidArgumentException("Invalid header names count!");
        }

        $this->text = '<table><tr>';
        foreach ($headerNames as $headerName){
            $this->text .= "<th>$headerName</th>";
        }
        $this->text .= '</tr>';
    }

    public function addRow(array $rowElements) {
        $count = min(count($rowElements), $this->columnCount);
        $this->text .= '<tr>';
        for ($i = 0; $i < $count; $i++)
            $this->text .= "<td>$rowElements[$i]</td>";
        for ($i = $count; $i < $this->columnCount; $i++)
            $this->text .= '<td></td>';
        $this->text .= '</tr>';
    }

    public function getTable(): string {
        return $this->text . '</table>';
    }
}

$builder = new TableBuilder(['First', 'Second', 'Third']);
$builder->addRow(['Hello', 'World']);
$builder->addRow([]);
$builder->addRow(['1', '2', '3']);
$builder->addRow(['1', '2', '3', '4']);
echo $builder->getTable();

?>
</body>
</html>