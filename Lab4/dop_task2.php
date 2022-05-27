<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dop Task 2</title>
</head>
<body>

<table>
    <tr>
        <th>Filename</th>
        <th>Filesize (MB)</th>
    </tr>
    <?php

    class FileSystemObject {
        private const PRECISION = 2;

        private string $filename;
        private string $filetype;
        private int $filesize;

        public function __construct(string $filename) {
            $this->filename = realpath($filename);

            if ($this->filename == false) {
                throw new InvalidArgumentException("Invalid filename!");
            }

            $filetype = filetype($filename);
            if ($filetype == false) {
                throw new InvalidArgumentException("Invalid filename!");
            }
            $this->filetype = $filetype;

            $this->filesize = filesize($filename);

            if ($this->filesize == false) {
                throw new InvalidArgumentException("Error when trying to get filesize!");
            }
        }

        public function getName(): string {
            return $this->filename;
        }

        public function getBytes(): int {
            return $this->filesize;
        }

        public function getKilobytes(): float {
            return round($this->filesize / 1000, self::PRECISION);
        }

        public function getMegabytes(): float {
            return round($this->filesize / 1e6, self::PRECISION);
        }

        public function getGigabytes(): float {
            return round($this->filesize / 1e9, self::PRECISION);
        }

        public function getPetabytes(): float {
            return round($this->filesize / 1e12, self::PRECISION);
        }
    }

    $filedir = __DIR__ . '/../';
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($filedir, FilesystemIterator::SKIP_DOTS));

    foreach ($iterator as $info) {
        try {
            $fileobj = new FileSystemObject($info->getPathname());


            echo '<tr><td>' . $fileobj->getName() . '</td><td>' . $fileobj->getMegabytes() . '</td></tr>';
        } catch (Exception) {

        }

    }


    ?>
</table>

</body>
</html>