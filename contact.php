<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  </head>

  <body>
      <?php include("layout/header.html"); ?>

    <section id="contact">
      <h1>Contact Us</h1>
    <div >
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

    <?php include("layout/footer.html"); ?>

  </body>
</html>
