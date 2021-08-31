<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Titre de l'onglet -->
    <title>Download</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  </head>

    <!-- Commande PHP qui inclut le code du fichier header -->
    <?php include("layout/header.html"); ?>

  <body>
    <div id="contact">
      <h1>Download files</h1>
      <p>Here you will find some .stl files to download, they represent different phantoms that we developped.</p><br>
      <a href="phantom/Tete/bas_tete.stl" download="bas_tete.stl">bas_tete.stl</a>
      <!-- Cette commande permet de mettre à disposition des fichiers à télécharger pour l'utilisateur. -->
    </div>

    <!-- Commande PHP qui inclut le code du fichier footer -->
    <?php include("layout/footer.html"); ?>
  </body>
</html>
