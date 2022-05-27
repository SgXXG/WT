<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 5</title>
</head>
<body>
<?php

interface ICryptoAlgo {
    public function encrypt(string $text, mixed $key): string;
    public function decrypt(string $text, mixed $key): string;
}

class CryptoManager {
    private ICryptoAlgo $cryptoAlgo;
    private mixed $key;

    public function __construct(ICryptoAlgo $cryptoAlgo, mixed $key) {
        $this->cryptoAlgo = $cryptoAlgo;
        $this->key = $key;
    }

    public function encrypt(string $text): string {
        return $this->cryptoAlgo->encrypt($text, $this->key);
    }

    public function decrypt(string $text): string {
        return $this->cryptoAlgo->decrypt($text, $this->key);
    }
}

class CesarCryptoAlgo implements ICryptoAlgo {

    public function encrypt(string $text, mixed $key): string {
        return $this->mainAlgo($text, $key);
    }

    public function decrypt(string $text, mixed $key): string {
        return $this->mainAlgo($text, -$key);
    }

    private function mainAlgo(string $text, mixed $key): string {
        if(gettype($key) != 'integer'){
            throw new InvalidArgumentException('Key must be integer value');
        }

        $newText = '';
        for ($i = 0; $i < strlen($text); $i++) {
            $symbol = (ord($text[$i]) + $key + 256) % 256;

            $newText[$i] = chr($symbol);
        }

        return $newText;
    }
}

$text = 'Hello world!';
$key = 12;

$manager = new CryptoManager(new CesarCryptoAlgo(), $key);

$encryptedText = $manager->encrypt($text);
$decryptedText = $manager->decrypt($encryptedText);

echo "Source text: $text<br>Encrypted text: $encryptedText<br>Decrypted text: $decryptedText<br>";


?>
</body>
</html>
