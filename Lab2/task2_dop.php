<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task 2_dop</title>
</head>
<body>
	<table style="width: 100px">
		<?php 
			if(isset($_GET['count']))
				$count = intval($_GET['count']);
			else return;

			$step = 256 / $count;
			$color = 255;
			for ($i=0; $i < $count; $i++) { 
				$color_string = intToGrayColor($color);
				echo '<tr bgcolor=', $color_string, '><td>', $i, '</td></tr>';
				$color -= $step;
			}

			function intToGrayColor($value){
				return sprintf("\"%02X%02X%02X\"", $value, $value, $value);
			}
		?>
	</table>
</body>
</html>
