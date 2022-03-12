<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task 4_1</title>
</head>
<body>    

    <?php

        if(isset($_GET['str']))
            $string = $_GET['str'];
        else 
            throw new Exception('Empty string');;

        $explode_string = explode(" ",$string);
        $count_array = count($explode_string);
        $out_string = "";
        for($i=0;$i=$count_array;$i++) {
            $count_array--;
            $out_string .= $explode_string[$count_array]." ";
        }
        echo "<br>".$out_string;
    ?>
</body>
</html>