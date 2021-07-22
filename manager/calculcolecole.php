<?php
#------ Functions ------

function saut2lignes(){
  echo nl2br("\n");
  echo nl2br("\n");
}

#_______________________


#On récupère la liste (epsi[],sigma[]) du programme colecole.py, la liste est un string
$input_choice = (array_key_exists('choice', $_POST)) ? $_POST['choice'] : "";
$debut_frequence = (array_key_exists('debutfrequence', $_POST)) ? $_POST['debutfrequence'] : "";
$debut_frequence = floatval($debut_frequence);
$fin_frequence = (array_key_exists('finfrequence', $_POST)) ? $_POST['finfrequence'] : "";
$fin_frequence = floatval($fin_frequence);
$number_points = (array_key_exists('numberPoints', $_POST)) ? $_POST['numberPoints'] : "";
$number_points = intval($number_points);
$number_points = floatval($number_points);
//Ces commandes permettent de récupérer les "inputs" des utilisateurs.

$step = ($fin_frequence - $debut_frequence)/($number_points-1);

$frequence_array = range($debut_frequence,$fin_frequence, $step); //La variable prend une liste qui commence à $début_fréquence, qui fini à $fin_frequence, avec le pas $step. Les valeurs sont générés grâce à la fonction range.
#var_dump($frequence_array);
$py_output = exec("cd python; python appel_colecole.py $input_choice $debut_frequence $fin_frequence $step");
#var_dump($py_output);


$py_output = str_replace("(", "", $py_output);
$py_output = str_replace(")", "", $py_output);
#var_dump($py_output);



$py_output = substr($py_output, 1, strlen($py_output));



#------Liste des epsilon------

$end_list_epsi = strpos($py_output, "[");
$epsi_output = substr($py_output, 0, $end_list_epsi);
$epsi_output = str_replace("]", "", $epsi_output);
$epsi_output = trim($epsi_output);
$epsi_output = substr($epsi_output, 0, ($end_list_epsi-3));

$number_of_comas = substr_count($epsi_output,",");
#var_dump($number_of_comas);


$epsi_array = (array) null;

for ($i = 1; $i <= $number_of_comas; $i++)
{
  $pos = strpos($epsi_output, ",");
  $next_epsi = substr($epsi_output, 0, $pos);
  #var_dump($next_epsi);
  array_push($epsi_array, $next_epsi);
  #var_dump($epsi_array);
  $epsi_output = substr($epsi_output, $pos+2, strlen($epsi_output));
}

array_push($epsi_array, $epsi_output);

#var_dump($epsi_array);

foreach ($epsi_array as  &$value) {
  $value = number_format($value, 2, ".", " "); # formatage des valeur à 2 decimales
}


foreach ($frequence_array as &$value) {
  $value = number_format($value,2,".", " ");
}



#------Liste des sigma------

$sig_output = substr($py_output,$end_list_epsi, strlen($py_output));
$sig_output = str_replace("[", "", $sig_output);
$sig_output = str_replace("]", "", $sig_output);
$sig_output = trim($sig_output);

$sig_array = (array) null;


for ($i = 1; $i <= $number_of_comas; $i++)
{
  $pos = strpos($sig_output, ",");
  $next_sig = substr($sig_output, 0, $pos);
  #var_dump($next_epsi);
  array_push($sig_array, $next_sig);
  #var_dump($epsi_array);
  $sig_output = substr($sig_output, $pos+2, strlen($sig_output));
}

array_push($sig_array, $sig_output);
#var_dump($sig_array);

foreach ($sig_array as  &$value) {
  $value = number_format($value, 2, ".", " "); # formatage des valeur à 2 decimales
}

#var_dump($sig_array);

#------ Tableau ------

$tableau_output = array (
  'epsilon' => $epsi_array,
  'sigma' => $sig_array
);

$input_sigma = $tableau_output['sigma'];

for ($i=0; $i < count($input_sigma) ; $i++) {
  $input_sigma[$i] = floatval($input_sigma[$i]);
	#var_dump($input_sigma);
}

$input_epsi = $tableau_output['epsilon'];
#var_dump($input_epsi);

for ($i=0; $i < count($input_epsi) ; $i++) {
  $input_epsi[$i] = floatval($input_epsi[$i]);

}

?>
