<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task 1_dop</title>
</head>
<body>
	<?php
		foreach ($_GET as $arg) {
			echo "$arg: ";
			if(filter_var($arg, FILTER_VALIDATE_INT))
				echo 'int';
			else if(filter_var($arg, FILTER_VALIDATE_FLOAT))
				echo 'float';
			else if($arg == 'true' || $arg == 'false') 
				echo 'bool';
			else echo 'string';
			echo '<br>';
		}
	?>
</body>
</html>