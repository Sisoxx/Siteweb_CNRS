<?php

$html_template = '<!DOCTYPE html>
<html>
  <head>
    <meta charset= "UTF-8">
    <meta name= "viewport" content="width=device-width, initial-scal=1.0">
    <title>Page test du choix de tissu</title>
  </head>

  <body onload=""></body>
    <form action="" method="post">
      <select name="choice">
        <option value="Choice" disabled selected>Choose one in the list</option>
        <option value="Liver">Liver</option>
        <option value="Blood">Blood</option>
        <option value="Fat">Fat</option>
        <option value="Brain">Brain</option>
        <option value="Tongue">Tongue</option>
      </select>
      <input class="case" type="text" name="debutfrequence"  placeholder="0 Ghz">
      <input class="case" type="text" name="finfrequence"  placeholder="0 Ghz">
      <input type="submit" value="Choose">
      <br><br>
    </form>
  </body>
<!html>';


echo $html_template;

$input_choice = (array_key_exists('choice', $_POST)) ? $_POST['choice'] : "";
$a = (array_key_exists('debutfrequence', $_POST)) ? $_POST['debutfrequence'] : "";
$b = (array_key_exists('finfrequence', $_POST)) ? $_POST['finfrequence'] : "";

echo $input_choice;
#$html_output = str_replace("{CHOICE_TISSU}", $input_choice, $html_template);

#echo $html_output;

#echo $input_choice;

#exec('unset DYLD_LIBRARY_PATH ;');
#putenv('DYLD_LIBRARY_PATH');
#putenv('DYLD_LIBRARY_PATH=/usr/bin');
#shell_exec("cd github/Siteweb_CNRS2/python/TestPythonWeb");
$py_output = shell_exec("python colecole.py $input_choice $a $b");
#var_dump($py_output);

echo $py_output;

#if ( $input_choice != "")
  #echo $py_output;

 ?>
