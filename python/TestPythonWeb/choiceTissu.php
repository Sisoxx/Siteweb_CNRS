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
      <select>
        <option value="Choice" disabled selected>Choose one in the list</option>
        <option value="Liver">Liver</option>
        <option value="Blood">Blood</option>
        <option value="Fat">Fat</option>
        <option value="Brain">Brain</option>
        <option value="Tongue">Tongue</option>
      </select>
      <input type="submit" value="Choose">
    </form>
  </body>
<!html>';


echo $html_template;

#$input_choice = (array_key_exists('choice', $_POST)) ? $_POST['choice'] : "";

#$html_output = str_replace("{CHOICE_TISSU}", $input_choice, $html_template);

#echo $html_output;



#shell_exec ( colecole.py $choice )


 ?>
