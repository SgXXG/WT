<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 3</title>
</head>
<body>

<?php
$arr = array(1, 2, 10, 3, 4, 5,
             array(1, 7, 8, 9),
             array(3, 4, 5, 7),
             12);
$arr2 = array();
foreach($arr as $v)
{
    if(is_array($v))
    {
        foreach($v as $v)
        {
            $arr2[] = $v;
        }
    }
    else
        $arr2[] = $v;
}
$arr2 = array_unique($arr2);
echo '<pre>';
var_dump($arr, $arr2);
echo '</pre>';
?>

</body>
</html>