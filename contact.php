<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="style/style.css">
  </head>

  <body>
    <?php include("layout/header.html"); ?>

    <section>
      <h1>Contact Us</h1>
    <div id="contact">
      <form method="POST" action="manager/contact.php" id="formulaire">
        <input name="nom" placeholder="Nom">
        <input name="prenom"placeholder="Prénom">
        <input name="raison_sociale"placeholder="Raison Sociale">
        <input name="email" placeholder="E-mail"> <br>
        <textarea name="message" id="textearea" placeholder="Votre message ici ..."></textarea><br>
        <button>Envoyer</button>
      </form>
    </div>
    </section>

  </body>
</html>
