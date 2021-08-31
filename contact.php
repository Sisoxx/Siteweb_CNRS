<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  </head>

  <!-- Commande PHP qui inclut le code du fichier header -->
    <?php include("layout/header.html"); ?>

  <body>
    <section id="contact">
      <h1>Contact Us</h1>
    <div id="formulaire2">
      <form method="POST" action="manager/contact.php">
        <input name="nom" placeholder="Name" required>
        <input name="email" placeholder="E-mail" required>
        <textarea name="message" id="textearea" placeholder="Your message here ..." required></textarea><br>
        <button>Send</button>
      </form>
    </div>
    </section>

    <!-- Commande PHP qui inclut le code du fichier footer -->
    <?php include("layout/footer.html"); ?>
    
  </body>
</html>
