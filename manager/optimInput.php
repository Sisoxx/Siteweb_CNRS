<?php

$input_temperature = floatval((array_key_exists('temperature', $_POST)) ? $_POST['temperature'] : "");
$input_salinity = floatval((array_key_exists('salinity', $_POST)) ? $_POST['salinity'] : "");
$input_V1 = floatval((array_key_exists('volume1', $_POST)) ? $_POST['volume1'] : "");
#var_dump($input_temperature,$input_salinity,$input_V1);


if ($_POST['law'] == 'bottcher') {
  $input_law = 1;
}
else {
  $input_law = 2;
}


$opti_output = exec("cd python; python appel_opti.py  $input_temperature $input_salinity $input_V1 $input_law $input_choice $debut_frequence $fin_frequence $step");


$opti_output = str_replace("(", "", $opti_output);
$opti_output = str_replace(")", "", $opti_output);
$opti_output = str_replace("[", "", $opti_output);
$opti_output = str_replace("]", "", $opti_output);
var_dump($opti_output);


$number_of_comas_opti = substr_count($opti_output,",");
var_dump($number_of_comas_opti);

$opti_array = (array) null;


for ($i = 1; $i <= $number_of_comas_opti ; $i++)
{
  $pos = strpos($opti_output, ",");
  $next_opti_element = substr($opti_output, 0, $pos);
  array_push($opti_array, $next_opti_element);
  $opti_output = substr($opti_output, $pos+2, strlen($opti_output));
}

array_push($opti_array, $opti_output);

foreach ($opti_array as  &$value) {
  $value = number_format($value, 4, ".", " "); # formatage des valeur à 4 decimales
}

#-------------TABLEAU2------------
// $tableau_output2 = array (
//   'epsilon2' => $epsi_array2,
//   'sigma2' => $sig_array2
// );
//
// $input_sigma2 = $tableau_output2['sigma2'];
//
// for ($i=0; $i < count($input_sigma2) ; $i++) {
//   $input_sigma2[$i] = floatval($input_sigma2[$i]);
// }
//
// $input_epsi2 = $tableau_output2['epsilon2'];
//
// for ($i=0; $i < count($input_epsi2) ; $i++) {
//   $input_epsi2[$i] = floatval($input_epsi2[$i]);
// }
?>
