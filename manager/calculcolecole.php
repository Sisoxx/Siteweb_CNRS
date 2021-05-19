<?php

$choix=$_POST['choix']
$a=$_POST['debutfrequence'];
$b=$_POST['finfrequence'];


$code = exec("../python/TestPythonWeb/colecole.py $choix,$a,$b");

echo $code;

header('../index.html');
?>
