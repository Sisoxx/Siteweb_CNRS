<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Calculateur en ligne</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>
	<header>
		<div id="traitHaut"></div>
		<div>
			<p>
				<a href="#présentation"><img id="logo" src="image/image_geeps.png"  width="249" height="100" alt="logo du geeps"></a>
			</p>
		</div>

		<nav>
			<ul>
				<li><a href="#contact">Contact</a></li>
				<li><a href="#calculateur">Calculateur</a></li>
				<li><a href="#présentation">Présentation</a></li>
			</ul>
		</nav>
	</header>
	<section id="présentation">
		<div id="txtexplication">
			<h2 id="titre1">Présentation</h2>

			<p>
				blabla
			</p>
		</div>
	</section>

	<section id="calculateur">
		<h2 id="titre2">Calculateur</h2>

		<p>SUPPOSONS QUE LE CALCULATEUR SOIT LA. UTILISATION DE PHP.</p>
		<form action="" method="post" id="formulaire2">
			<p>Que voulez-vous imiter ?</p>
			<select id="tissu_selection" name="choice">
				<option value="Choice" disabled selected>Choose one in the list</option>
				<option value="Aorta">Aorta</option>
				<option value="Bladder">Bladder</option>
				<option value="Blood">Blood</option>
				<option value="Bone (Cancellous)">Bone Cancellous</option>
				<option value="Bone (Cortical)">Bone Cortical</option>
				<option value="Bone Marrow (Infiltrated)">Bone Marrow Infiltrated</option>
				<option value="Bone Marrow (Not Infiltrated)">Bone Marrow Not Infiltrated</option>
				<option value="Brain (Grey Matter)">Brain Grey Matter</option>
				<option value="Brain (White Matter)">Brain White Matter</option>
				<option value="Breast fat">Breast Fat</option>
				<option value="Cartilage">Cartilage</option>
				<option value="Cerebellum">Cerebellum</option>
				<option value="Cerebro Spinal Fluid">Cerebro Spinal Fluid</option>
				<option value="Cervix">Cervix</option>
				<option value="Colon">Colon</option>
				<option value="Cornea">Cornea</option>
				<option value="Dura">Dura</option>
				<option value="Eye Tissues (Sclera)">Eye Tissues</option>
				<option value="Fat (Average Infiltrated)">Fat Infiltrated</option>
				<option value="Fat (Not Infiltrated)">Fat Not Infiltrated</option>
				<option value="Gall Bladder">Gall Blader</option>
				<option value="Gall Bladdr Bile">Gall Bladder Bile</option>
				<option value="Heart">Heart</option>
				<option value="Kidney">Kidney</option>
				<option value="Lens Cortex">Lens Cortex</option>
				<option value="Lens Nucleus">Lens Nucleus</option>
				<option value="Liver">Liver</option>
				<option value="Lung (Deflated)">Lung Deflated</option>
				<option value="Lung (Inflated)">Lung Inflated</option>
				<option value="Muscle">Muscle</option>
				<option value="Nerve">Nerve</option>
				<option value="Ovary">Ovary</option>
				<option value="Skin (Dry)">Skin Dry</option>
				<option value="Skin (Wet)">Skin Wet</option>
				<option value="Small Intestine">Small Intestine</option>
				<option value="Spleen">Spleen</option>
				<option value="Stomach">Stomach</option>
				<option value="Tendon">Tendon</option>
				<option value="Testis">Testis</option>
				<option value="Thyroid">Thyroid</option>
				<option value="Tongue">Tongue</option>
				<option value="Trachea">Trachea</option>
				<option value="Uterus">Uterus</option>
				<option value="Vitreous Humor">Vitres Humor</option>
			</select>
			<p>Quelle est votre plage de fréquence ?</p>
			<input class="case" type="text" name="debutfrequence"  placeholder="0 Ghz">
			<input class="case" type="text" name="finfrequence"  placeholder="0 Ghz">
			<input type="submit" value="Choose">
			<br><br>
		</form>

	<?php include("manager/calculcolecole.php"); ?>

	<footer id="contact">
		<h2>Contactez-nous</h2>
		<div id="enbas">

			<form method="POST" action="manager/contact.php" id="formulaire">
				<input name="nom" placeholder="Nom">
				<input name="prenom"placeholder="Prénom">
				<input name="raison_sociale"placeholder="Raison Sociale">
				<input name="email" placeholder="E-mail"> <br>
				<textarea name="message" id="textearea" placeholder="Votre message ici ..."></textarea><br>
				<button>Envoyer</button>
			</form>

			<table style="height: 50px; width: 333px;" border="0" cellspacing="5" align="center">
<tbody>
<tr>
<td align="left" valign="middle">
<p>
<a href="https://www.centralesupelec.fr/fr" target="_blank" rel="noopener"><img style="display: block; margin-left: auto; margin-right: auto;" src="image/centralesupelec.svg" alt="CentraleSupélec nouvelle fenêtre" width="170" height="120"></a>
</p>
<p>
<a href="https://www.cnrs.fr/fr" target="_blank" rel="noopener"><img style="display: block; margin-left: auto; margin-right: auto;" src="image/cnrs.svg" alt="CNRS nouvelle fenêtre" width="125" height="80"></a>
</p>
<p>
<a href="https://www.sorbonne-universite.fr/fr" target="_blank" rel="noopener"><img style="display: block; margin-left: auto; margin-right: auto;" src="image/sorbonne-universite.svg" alt="Sorbonne Université nouvelle fenêtre" width="125" height="80"></a>
</p>
<p>
<a href="https://www.universite-paris-saclay.fr/fr" target="_blank" rel="noopener"><img style="display: block; margin-left: auto; margin-right: auto;" src="image/paris-saclay.svg" alt="Paris-Saclay nouvelle fenêtre" width="125" height="80"></a>
</p>
</td>
</tr>
</tbody>
</table>
			<div id="localisation">
				<h3 id="maptitre">Localisation</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10531.174204445835!2d2.1685345!3d48.7094268!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x663cfcfd7d8efd5e!2sLaboratoire%20de%20g%C3%A9nie%20%C3%A9lectrique%20de%20Paris!5e0!3m2!1sfr!2sfr!4v1620139192389!5m2!1sfr!2sfr" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		</div>

			<div id="trait"></div>

			<div id ="copyrighteticones"></div>
				<div id="copyright">
					<span>© Copyright 2021 - GeepS</span>
				</div>
			<div id="icones">
				<a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
			</div>
	</footer>

</body>
</html>
