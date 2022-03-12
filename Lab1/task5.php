<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task 5</title>
</head>
<body>    

    <?php
		$maxLength = 0;
		$word = "";

		foreach($_GET as $arg) { 
			$length = strlen($arg);
			if($maxLength < $length){
				$word = $arg;
				$maxLength = $length;
			}
		}

		echo "Most long word: $word\n";
	?>

</body>
</html>