<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task 4</title>
</head>
<body>

    <?php
		if(!isset($_GET['value'])){
			echo "Error!";
			return;
		}

		$value = $_GET['value'];

		$sum = 0;
		for ($i=0; $i < strlen($value);$i++) { 
			$sum += intval(substr($value, $i, 1));
		}

		echo "Sum: $sum<br>";
	?>

</body>
</html>