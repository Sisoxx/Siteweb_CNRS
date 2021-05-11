<?php
$contact = new contact($_POST["nom"], $_POST["prenom"],$_POST["email"], $_POST["raison_sociale"], $_POST['message']); // enregsitrement des données //
$co = new Manager(); // nouvelles classe //
$co->contact($contact); // Permet l'insertion dans la base de données //
$co->Mail($contact); //Permt l'envoie des mails //
?>
