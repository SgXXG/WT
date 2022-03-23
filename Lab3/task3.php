<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 3</title>
</head>
<body>
<?php

abstract class Logger {
    public abstract function log(string $text);
}

class EchoLogger extends Logger {
    private bool $showDate;

    public function __construct(bool $showDate) {
        $this->showDate = $showDate;
    }

    public function log(string $text) {
        if($this->showDate) {
            echo date('Y-m-d H:i:s') . "\t";
        }

        echo $text;
    }
}

class FileLogger extends Logger {
    private bool $showDate;
    private string $filename;

    public function __construct(string $filename, bool $showDate) {
        $this->showDate = $showDate;
        $this->filename = $filename;
    }

    public function log(string $text) {
        file_put_contents($this->filename, $text, FILE_APPEND);
    }
}

?>
</body>
</html>