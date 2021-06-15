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

#var_dump($round_step);
$opti_output = exec("python appel_opti.py  $input_temperature $input_salinity $input_V1 $input_law $input_choice $debut_frequence $fin_frequence $round_step");
#$opti_output = shell_exec("python appel_opti.py 25 0 0.5 True Blood 1 5 0.6666");
#$opti_output = shell_exec("python appel_colecole.py $input_choice $debut_frequence $fin_frequence $round_step");
#$opti_output = shell_exec("python epsieau.py");

var_dump($opti_output);
#var_dump($opti_output);

?>
