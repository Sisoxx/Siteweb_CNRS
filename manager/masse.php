<?php
$input_volumebecher = floatval((array_key_exists('volumebecher', $_POST)) ? $_POST['volumebecher'] : "");
$recipe_output = exec("cd python; python appel_masse.py  $input_temperature $input_salinity $input_V1 $input_law $input_choice $debut_frequence $fin_frequence $step $input_volumebecher");
#var_dump($recipe_output);


$recipe_output = str_replace("(", "", $recipe_output);
$recipe_output = str_replace(")", "", $recipe_output);
#var_dump($recipe_output);

$number_of_comas_recipe = substr_count($recipe_output,",");
#var_dump($number_of_comas_recipe);

$recipe_array = (array) null;


for ($i = 1; $i <= $number_of_comas_recipe ; $i++)
{
  $pos = strpos($recipe_output, ",");
  $next_recipe_element = substr($recipe_output, 0, $pos);
  #var_dump($next_epsi);
  array_push($recipe_array, $next_recipe_element);
  #var_dump($epsi_array);
  $recipe_output = substr($recipe_output, $pos+2, strlen($recipe_output));
}

array_push($recipe_array, $recipe_output);

foreach ($recipe_array as  &$value) {
  $value = number_format($value, 4, ".", " "); # formatage des valeur à 4 decimales
}

#var_dump($recipe_array[1]);

 ?>
