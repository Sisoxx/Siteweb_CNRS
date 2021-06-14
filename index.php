<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Calculateur en ligne</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
</head>


<body>

<?php include("layout/header.html"); ?>

	<section id="présentation">
		<div id="txtexplication">
			<h2 id="titre1">Présentation</h2>
			<p>
				This topic will serve you to mimic some human being tissues. In our website you will find alot of different tissues, and our programm based on Cole-cole method will give you the information that you need for your experience.
				<br>
				<h3>Experimental protocol</h3>
				<br>
				In this part we will explain, how to prepare the different fluid that you will need for your experiments. <br>
				<h4>Materials</h4>
				<ul>
					<li>Water</li>
					<li>Salt</li>
					<li>TritonX100</li>
					<li>A beaker</li>
					<li>Balance</li>
					<li>Magnetic stirrer with heating and his magnetic bar</li>
				</ul><br>
				<h4>Protocol</h4><br>
				After that you have obtained the different proportions to use, here are the different steps to perform for the fluid.
				<ul>
					<li>Insert in the beaker the amount of water that is needed for your fluid.</li>
					<li>Insert the amount of salt that is needed for your fluid, dissolve it before add TritonX100.</li>
					<li>Insert the amound of TritonX100 that is needed for your fluid, it is better to keep it warm so TritonX100 won't fix on the sides of the beaker.</li>
					<li>Mix your mixture on the magnetic stirrer until that you get a fluid without any gas bubble in the fluid.</li>
				</ul>
			</p>
		</div>
	</section>

	<section id="calculateur">
		<h2 id="titre2">Calculateur</h2>

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
				<option value="Breast Fat">Breast Fat</option>
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
				<option value="Gall Bladder Bile">Gall Bladder Bile</option>
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
			<input class="case" type="text" name="numberPoints"  placeholder="Number of points">
			<input class="case" type="text" name="temperature"  placeholder="Temperature in °C">
			<input class="case" type="text" name="salinity"  placeholder="Salinity">
			<input class="case" type="text" name="volume1"  placeholder=" 0<V1<1">
			<input type="radio" value="bottcher" name="law" checked>
			<label for="bottcher">Bottcher's Law</label>
			<input type="radio" value="kraszweski" name="law" >
			<label for="kraszweski">Kraszweski's law</label>
			<input class ="case" type="text" name="volumebecher" placeholder="Volume of your beaker in mL ONLY">
			<input type="submit" value="Choose" name="boutonColeCole" >
			<br><br>
		</form>


<?php include("manager/calculcolecole.php"); ?>

<?php include("manager/optimInput.php"); ?>


<div id="ColecoleTable" >
	<?php if(isset($_POST["boutonColeCole"])): ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Frequence (Hz)</th>
					<th>Espilon</th>
					<th>Sigma (unit)</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($tableau_output as $tableau): ?>
					<?php foreach($tableau_output as $sigma): ?>
					<?php endforeach ?>
					<?php $i = 0; ?>
					<?php foreach($tableau as $espilon): ?>
					<tr>
							<td><?= $frequence_array[$i]; ?></td>
							<td><?= $espilon; ?></td>
							<td><?= $sigma[$i]; ?></td>
							<?php $i++; ?>
					</tr>
					<?php endforeach ?>
					<?php break; ?>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php endif ?>
</div>


<?php include("layout/footer.html"); ?>


</body>
</html>
