<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task 2</title>
</head>
<body>
	<table border="1" style="width: 100px">
		<?php 
			if(isset($_GET['count']))
				$count = intval($_GET['count']);
			else $count = 0;
			for ($i=0; $i < $count; $i++) { 
                echo "<tr><td>$i</td></tr>\n";
			}
		?>
	</table>
</body>
</html>
