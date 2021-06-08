<?php

$input_temperature = floatval((array_key_exists('temperature', $_POST)) ? $_POST['temperature'] : "");
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
  $input_law = True;
}
else {
  $input_law = False;
}

$opti_output = shell_exec("python appel_opti.py  $input_temperature $input_salinity $input_V1 $input_law $input_choice $debut_frequence $fin_frequence $round_step");
#$opti_output = shell_exec("python appel_opti.py 25 0 0.5 True Blood 1 5 0.6666");
#$opti_output = shell_exec("python appel_colecole.py $input_choice $debut_frequence $fin_frequence $round_step");
#$opti_output = shell_exec("python epsieau.py");

var_dump($opti_output);
#var_dump($opti_output);


?>
