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
$opti_output2 = $opti_output;
$opti_output = str_replace("[", "", $opti_output);
$opti_output = str_replace("]", "", $opti_output);
#var_dump($opti_output);


$number_of_comas_opti = substr_count($opti_output,",");
#var_dump($number_of_comas_opti);

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

for ($i = 1; $i <= 4 ; $i++){
  $pos2 = strpos($opti_output2, ",");
  $opti_output2 = substr($opti_output2, $pos2+2, strlen($opti_output2));
}

$opti_output2 = substr($opti_output2, 1 , strlen($opti_output2));
#var_dump($opti_output2);

#-------Liste des epsilon-------------
$end_list_epsi2 = strpos($opti_output2, "[");
$epsi_output2 = substr($opti_output2, 0, $end_list_epsi2);
$epsi_output2 = str_replace("]", "", $epsi_output2);
$epsi_output2 = trim($epsi_output2);
$epsi_output2 = substr($epsi_output2, 0, ($end_list_epsi2-3));
#var_dump($epsi_output2);

$number_of_comas2 = substr_count($epsi_output2, ",");

$epsi_array2 = (array) null;

for ($i = 1; $i <= $number_of_comas2; $i++){
  $pos3 = strpos($epsi_output2, ",");
  $next_epsi2 = substr($epsi_output2, 0 , $pos3);
  array_push($epsi_array2, $next_epsi2);
  $epsi_output2 = substr($epsi_output2, $pos3+2, strlen($epsi_output2));
}

array_push($epsi_array2, $epsi_output2);

foreach ($epsi_array2 as  &$value2){
  $value2 = number_format($value2, 4, ".", " ");
}
#var_dump($epsi_array2);


#-----Liste des sigmas-------

$sig_output2 = substr($opti_output2,$end_list_epsi2, strlen($opti_output2));
$sig_output2 = str_replace("[", "", $sig_output2);
$sig_output2 = str_replace("]", "", $sig_output2);
$sig_output2 = trim($sig_output2);


$sig_array2 = (array) null;


for ($i = 1; $i <= $number_of_comas; $i++)
{
  $pos3 = strpos($sig_output2, ",");
  $next_sig2 = substr($sig_output2, 0, $pos3);
  array_push($sig_array2, $next_sig2);
  $sig_output2 = substr($sig_output2, $pos3+2, strlen($sig_output2));
}

array_push($sig_array2, $sig_output2);


foreach ($sig_array2 as  &$value2) {
  $value2 = number_format($value2, 4, ".", " "); # formatage des valeur à 4 decimales
}

#-------------TABLEAU2------------

$tableau_output2 = array (
   'epsilon2' => $epsi_array2,
   'sigma2' => $sig_array2
 );

$input_sigma2 = $tableau_output2['sigma2'];

for ($i=0; $i < count($input_sigma2) ; $i++) {
   $input_sigma2[$i] = floatval($input_sigma2[$i]);
}

$input_epsi2 = $tableau_output2['epsilon2'];

for ($i=0; $i < count($input_epsi2) ; $i++) {
   $input_epsi2[$i] = floatval($input_epsi2[$i]);
}
?>
