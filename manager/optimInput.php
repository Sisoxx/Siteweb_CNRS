<?php

$input_temperature = floatval((array_key_exists('temperature', $_POST)) ? $_POST['temprature'] : "");
$input_salinity = floatval((array_key_exists('salinity', $_POST)) ? $_POST['salinity'] : "");
$input_V1 = floatval((array_key_exists('volume1', $_POST)) ? $_POST['volume1'] : "");
#var_dump($input_temperature,$input_salinity,$input_V1);
$input_sigma = $tableau_output['sigma'];

for ($i=0; $i < count($input_sigma) ; $i++) {
  $input_sigma[$i] = floatval($input_sigma[$i]);
}

$input_epsi = $tableau_output['epsilon'];

for ($i=0; $i < count($input_epsi) ; $i++) {
  $input_epsi[$i] = floatval($input_epsi[$i]);
}

#var_dump($input_sigma,$input_epsi);

if ($_POST['law'] == 'bottcher') {
  $inpute_law = True;
}
else {
  $inpute_law = False;
}

$opti_output = shell_exec("python opti.py $input_temperature $input_salinity $input_V1 $inpute_law $input_choice $debut_frequence $fin_frequence $round_step");
var_dump($opti_output);



?>
