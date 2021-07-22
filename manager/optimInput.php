<?php

// $input_temperature = floatval((array_key_exists('temperature', $_POST)) ? $_POST['temperature'] : "");
$input_temperature = floatval(25);
// $input_salinity = floatval((array_key_exists('salinity', $_POST)) ? $_POST['salinity'] : "");
$input_salinity = floatval(0);
// $input_V1 = floatval((array_key_exists('volume1', $_POST)) ? $_POST['volume1'] : "");
$input_V1 = floatval(0.5);
#var_dump($input_temperature,$input_salinity,$input_V1);
//On fixe des valeurs d'initialisation pour le programme d'optimisation.

if ($_POST['law'] == 'bottcher') {
  $input_law = 1;
}
else {
  $input_law = 2;
}


$opti_output = exec("cd python; python appel_opti.py  $input_temperature $input_salinity $input_V1 $input_law $input_choice $debut_frequence $fin_frequence $step");

#var_dump($opti_output);

$opti_output = str_replace("(", "", $opti_output);
$opti_output = str_replace(")", "", $opti_output);
$opti_output2 = $opti_output;
$opti_output = str_replace("[", "", $opti_output);
$opti_output = str_replace("]", "", $opti_output);

$number_of_comas_opti = substr_count($opti_output,",");


$opti_array = (array) null;
//Ces commandes permettent de récupérer le résultat python dans une variable et puis de les transformer afin de séparer les valeurs.

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

  if ($i==4) {
    $F01 = substr($opti_output2, 0, $pos2);
  }

  $opti_output2 = substr($opti_output2, $pos2+2, strlen($opti_output2));
}


$opti_output2 = substr($opti_output2, 1 , strlen($opti_output2));

$F01 = floatval($F01) * 100;
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
  $value2 = number_format($value2, 2, ".", " ");
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
//Ces commandes nous permettent de séparer les différents résultats sortie par le python.

foreach ($sig_array2 as  &$value2) {
  $value2 = number_format($value2, 2, ".", " "); # formatage des valeur à 2 decimales
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
}//L'objectif de ces commandes est de transformer les chaines de caractères en valeur réels.
require_once("jpgraph/jpgraph.php");
require_once("jpgraph/jpgraph_line.php"); // import de module nécessaire à la création des graphes.

$x_axis = $frequence_array; //L'abscisse prend les valeurs présent dans la liste $frequence_array, c'est important que ca soit des listes.
$y_axis1 = $epsi_array; //L'ordonnée prend les valeurs présent dans la liste $epsi_array. Utiliser pour 1 courbe.
$y_axis2 = $epsi_array2; //L'ordonne prend valeurs pour la deuxième courbe.
$graph = new Graph(500, 500); //Dimension du graphique.
$graph->SetScale("intlin",0,80,0,0); //On fixe les valeurs pour les axes (ymin,ymax,xmin,xmax) quand c'est (0,0) ca scale tout seul.
$theme_class=new UniversalTheme; // C'est un thème par défaut qui sert a styliser un peu le graphique.
$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->SetBox(false);
$graph->SetMargin(60,60,60,60);
$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->img->SetAntiAliasing("white"); //Ces commandes permettents de styliser le graph.
// $graph->xgrid->Show();
// $graph->xgrid->SetLineStyle("solid");
// $graph->title->Set("Permittivity depending on frequencies - Cole-Cole and Optim Model"); //Cette ligne permettait de donner un titre au graph.
$graph->yaxis->SetTitle("Dielectric Constant","center"); //Le nom de l'axe des Y et sa position relative.
$graph->yaxis->SetTitleMargin(40);// l'écart entre le titre et le graph.
$graph->xaxis->SetTitle("Frequency (GHz)","center");//Pareil que l'axe Y mais la pour l'axe X.
$graph->xaxis->SetTitleMargin(20);
$graph->xaxis->SetTickLabels($x_axis);//On dit au graph de prendre les valeurs dans la variable $x_axis pour l'abscisse.
$courbe1 = new LinePlot($y_axis1);//On trace la courbe avec les valeurs de $y_axis1.
$courbe1->SetLegend('Cole-Cole');//On rajoute une légende pour la courbe 1.
$courbe2 = new LinePlot($y_axis2);//On réitére pour les valeurs de $y_axis2.
$courbe2->SetLegend('Mixtures');
$graph->Add($courbe1);
$graph->Add($courbe2);//On rajoute les courbes sur le graphique.
$courbe1->SetColor('red');
$courbe2->SetColor('green'); //On fixe des couleurs pour chaque courbe.
//$courbe2->value->Show(); // Cet ligne permet d'afficher les valeurs prit par Y sur la courbe.
// $courbe2->value->SetColor("darkgreen"); //Dans le cas où on afficherait les valeurs, on peut mettre de la couleur.
$graph->legend->SetFrameWeight(1); // Permet de rajouter le petit carré de légende.
$graph->legend->SetPos(0.5,0.08,'center','bottom');//Permet de positioner la légende.
$graph->SetShadow();
$graph->Stroke("image/temp/graph1.png");//Chemin d'accès où l'image est stocké. Puis cet image est affiché par la page "simulation.php"

$x_axis = $frequence_array;
$y_axis1 = $sig_array;
$y_axis2 = $sig_array2;
$graph = new Graph(500, 500);
$graph->SetScale("intlin",0,8,0,0);
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->SetBox(false);
$graph->SetMargin(60,60,60,60);
$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->img->SetAntiAliasing("white");
$graph->SetBackgroundImage("image/fond_blanc.png",BGIMG_FILLFRAME);
// $graph->xgrid->Show();
// $graph->xgrid->SetLineStyle("solid");
// $graph->title->Set("Conductivity depending on frequencies - Cole-Cole and Optim Model");
$graph->yaxis->SetTitle("Conductivity (S/m)","center");
$graph->yaxis->SetTitleMargin(40);
$graph->xaxis->SetTitle("Frequency (GHz)","center");
$graph->xaxis->SetTitleMargin(20);
$graph->xaxis->SetTickLabels($x_axis);
$courbe1 = new LinePlot($y_axis1);
$courbe1->SetLegend('Cole-Cole');
$courbe2 = new LinePlot($y_axis2);
$courbe2->SetLegend("Mixtures");
$graph->Add($courbe1);
$graph->Add($courbe2);
$courbe1->SetColor('red');
$courbe2->SetColor('green');
//$courbe2->value->Show();
$courbe2->value->SetColor("darkgreen");
$graph->legend->SetFrameWeight(1);
$graph->legend->SetPos(0.5,0.08,'center','bottom');
$graph->SetShadow();
$graph->Stroke("image/temp/graph2.png");
?>
