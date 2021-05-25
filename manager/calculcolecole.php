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

$number_of_comas = substr_count($epsi_output,",");
var_dump($number_of_comas);
echo nl2br("\n");

$epsi_array = (array) null;


for ($i = 0; $i <= $number_of_comas; $i++)
{
  $pos = strpos($epsi_output, ",");
  $next_epsi = substr($epsi_output, 0, $pos);
  #var_dump($next_epsi);
  array_push($epsi_array, $next_epsi);
  #var_dump($epsi_array);
  $epsi_output = substr($epsi_output, $pos+2, strlen($epsi_output));
}

var_dump($epsi_array);

echo nl2br("\n");
echo nl2br("\n");


$sig_output = substr($py_output,$end_list_epsi, strlen($py_output));
$sig_output = str_replace("[", "", $sig_output);
$sig_output = str_replace("]", "", $sig_output);
$sig_output = trim($sig_output);

$sig_array = (array) null;


for ($i = 0; $i <= $number_of_comas; $i++)
{
  $pos = strpos($sig_output, ",");
  $next_sig = substr($sig_output, 0, $pos);
  #var_dump($next_epsi);
  array_push($sig_array, $next_sig);
  #var_dump($epsi_array);
  $sig_output = substr($sig_output, $pos+2, strlen($sig_output));
}
var_dump($sig_array);


#settype($py_output, "array");

var_dump($epsi_output);
echo nl2br("\n");
echo nl2br("\n");

var_dump($sig_output);
#var_dump($py_output);

# echo $py_output;
?>
