<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task 3</title>

    <style>
		table {
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
			font-size: 14px;
			border-radius: 10px;
			border-spacing: 0;
			text-align: center;
		}
		th {
			background: #BCEBDD;
			color: white;
			text-shadow: 0 1px 1px #2D2020;
			padding: 10px 20px;
		}
		th, td {
			border-style: solid;
			border-width: 0 1px 1px 0;
			border-color: white;
		}
		th:first-child, td:first-child {
			text-align: left;
		}
		th:first-child {
			border-top-left-radius: 10px;
		}
		th:last-child {
			border-top-right-radius: 10px;
			border-right: none;
		}
		td {
			padding: 10px 20px;
		}
		tr:last-child td:first-child {
			border-radius: 0 0 0 10px;
		}
		tr:last-child td:last-child {
			border-radius: 0 0 10px 0;
		}
		tr td:last-child {
			border-right: none;
		}
	</style>
</head>
<body>

    <table>
		<?php 
			$colors = ['#FF0000', '#0000FF', '#00FF00',
					   '#FF00FF', '#FFFF00'];
			$array = [[1,2,3,4,5],
					  [2,3,3,4,5],
					  [1,1,1,1,1],
					  [1,2,3,4,5],
					  [3,3,3,3,3],
					  [5,5,5,5,5],
					  [6,6,6,6,6]];
			$j = 0;
			$colorsCount = count($colors);
			foreach($array as $line){
				if($j >= $colorsCount)
					$j = $colorsCount - 1;
				echo '<tr bgcolor="', $colors[$j++], '">';
				foreach($line as $el){
					echo "<td>$el</td>";
				}
				echo '</tr>';
			}
		?>
	</table>

</body>
</html>