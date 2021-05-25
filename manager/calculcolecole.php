<?php

$input_choice = (array_key_exists('choice', $_POST)) ? $_POST['choice'] : "";
$a = (array_key_exists('debutfrequence', $_POST)) ? $_POST['debutfrequence'] : "";
$b = (array_key_exists('finfrequence', $_POST)) ? $_POST['finfrequence'] : "";

#shell_exec("cd ../python/TestPythonWeb ");
$py_output = shell_exec("python colecole.py $input_choice $a $b");
var_dump($py_output);

$py_output = str_replace("(", "", $py_output);
$py_output = str_replace(")", "", $py_output);
#var_dump($py_output);

echo nl2br("\n");
echo nl2br("\n");
$py_output = substr($py_output, 1, strlen($py_output));

$end_list_epsi = strpos($py_output, "[");

$epsi_output = substr($py_output, 0, $end_list_epsi);
$epsi_output = str_replace("]", "", $epsi_output);
$epsi_output = trim($epsi_output);
$epsi_output = substr($epsi_output, 0, ($end_list_epsi-3));

# $espi_array = ();
$number_of_comas = count_chars($epsi_output, ",");
var_dump($number_of_comas);

echo nl2br("\n");
echo nl2br("\n");


$sig_output = substr($py_output,$end_list_epsi, strlen($py_output));
$sig_output = str_replace("[", "", $sig_output);
$sig_output = str_replace("]", "", $sig_output);
$sig_output = trim($sig_output);


#settype($py_output, "array");

var_dump($epsi_output);
echo nl2br("\n");
echo nl2br("\n");

var_dump($sig_output);
#var_dump($py_output);

# echo $py_output;
?>
