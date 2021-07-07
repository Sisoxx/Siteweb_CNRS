<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  </head>

  <header>
    <?php include("layout/header.html"); ?>
  </header>

  <body>
    <section id="contact">
      <h1>Contact Us</h1>
    <div>
      <form method="POST" action="manager/contact.php" id="formulaire">
        <input name="nom" placeholder="Name" required>
        <input name="email" placeholder="E-mail" required> <br>
        <textarea name="message" id="textearea" placeholder="Your message here ..." required></textarea><br>
        <button>Send</button>
      </form>
    </div>
    </section>
  <footer>
    <?php include("layout/footer.html"); ?>
  </footer>
  </body>
</html>
