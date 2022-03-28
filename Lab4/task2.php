<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
</head>          
<body>
	<form method="post">
	<h3>Введите путь к каталогу</h3>
	Ваш путь: <input type="text" name="your_path" required><br>
	<br><input type="submit">
	</form>

</body>
</html>

 <?php

	if(isset($_POST['your_path'])){
		$my_path = $_POST['your_path'];		

		echo "<br> Размер директории $my_path: ". getDirSize($my_path) . " байт.<br><br>";
		$array = getDirContents($my_path);

		echo "<table>";
		echo "<tr><td>Пути файлов</td><td>|</td><td>Размеры</td></tr>";

		if (is_array($array)){
			foreach($array as $el){
			echo "<tr><td>$el</td><td>|</td><td>".filesize($el)."</td></tr>";
			}
			
			echo "</table>";
		} else echo "Такого пути не существует";

    } else {
        echo '<br>Вы ещё ничего не ввели!';
    }    


function getDirContents($path) {
	if($path!==false && $path!='' && file_exists($path)){
	    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

	    $files = array(); 
	    foreach ($rii as $file)
	        if (!$file->isDir()){       	
	            $files[] = $file->getPathname();
	        }
	} else return 0;
    return $files;
}


function getDirSize($path){
    $bytestotal = 0;
    $path = realpath($path);
    if($path!==false && $path!='' && file_exists($path)){
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal;
}