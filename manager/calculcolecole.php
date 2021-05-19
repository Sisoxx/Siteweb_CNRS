<?php

$input_choice = (array_key_exists('choice', $_POST)) ? $_POST['choice'] : "";
$a = (array_key_exists('debutfrequence', $_POST)) ? $_POST['debutfrequence'] : "";
$b = (array_key_exists('finfrequence', $_POST)) ? $_POST['finfrequence'] : "";

$py_output = shell_exec("../python/TestPythonWeb/python colecole.py $input_choice $a $b");

echo $py_output;
?>
