<?php
$input_volumebecher = floatval((array_key_exists('volumebecher', $_POST)) ? $_POST['volumebecher'] : "");
$recipe_output = shell_exec("python appel_masse.py  $input_temperature $input_salinity $input_V1 $input_law $input_choice $debut_frequence $fin_frequence $round_step $input_volumebecher");
var_dump($recipe_output);
 ?>
