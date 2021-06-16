<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Simulator</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="style/style3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
</head>

<body>

<?php include("layout/header.html"); ?>

	<section id="calculateur">
		<h2 id="titre2">Calculateur</h2>

		<form action="" method="post" id="formulaire2">
			<p>Que voulez-vous imiter ?</p>
			<select id="tissu_selection" name="choice">
				<option value="Choice" disabled selected>Choose one in the list</option>
				<option value="Aorta">Aorta</option>
				<option value="Bladder">Bladder</option>
				<option value="Blood">Blood</option>
				<option value="Bone_Cancellous">Bone Cancellous</option>
				<option value="Bone_Cortical">Bone Cortical</option>
				<option value="Bone_Marrow_Infiltrated">Bone Marrow Infiltrated</option>
				<option value="Bone_Marrow_Not_Infiltrated">Bone Marrow Not Infiltrated</option>
				<option value="Brain_Grey_Matter">Brain Grey Matter</option>
				<option value="Brain_White_Matter">Brain White Matter</option>
				<option value="Breast_Fat">Breast Fat</option>
				<option value="Cartilage">Cartilage</option>
				<option value="Cerebellum">Cerebellum</option>
				<option value="Cerebro_Spinal_Fluid">Cerebro Spinal Fluid</option>
				<option value="Cervix">Cervix</option>
				<option value="Colon">Colon</option>
				<option value="Cornea">Cornea</option>
				<option value="Dura">Dura</option>
				<option value="Eye_Tissues_Sclera">Eye Tissues</option>
				<option value="Fat_Average_Infiltrated">Fat Infiltrated</option>
				<option value="Fat_Not_Infiltrated">Fat Not Infiltrated</option>
				<option value="Gall_Bladder">Gall Blader</option>
				<option value="Gall_Bladder_Bile">Gall Bladder Bile</option>
				<option value="Heart">Heart</option>
				<option value="Kidney">Kidney</option>
				<option value="Lens_Cortex">Lens Cortex</option>
				<option value="Lens_Nucleus">Lens Nucleus</option>
				<option value="Liver">Liver</option>
				<option value="Lung_Deflated">Lung Deflated</option>
				<option value="Lung_Inflated">Lung Inflated</option>
				<option value="Muscle">Muscle</option>
				<option value="Nerve">Nerve</option>
				<option value="Ovary">Ovary</option>
				<option value="Skin_Dry">Skin Dry</option>
				<option value="Skin_Wet">Skin Wet</option>
				<option value="Small_Intestine">Small Intestine</option>
				<option value="Spleen">Spleen</option>
				<option value="Stomach">Stomach</option>
				<option value="Tendon">Tendon</option>
				<option value="Testis">Testis</option>
				<option value="Thyroid">Thyroid</option>
				<option value="Tongue">Tongue</option>
				<option value="Trachea">Trachea</option>
				<option value="Uterus">Uterus</option>
				<option value="Vitreous_Humor">Vitres Humor</option>
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

<?php if(isset($_POST["boutonColeCole"])): ?>
	<?php include("manager/calculcolecole.php"); ?>

<div id="ColecoleTable" >
		<table class="table">
			<thead>
				<tr>
					<th>Frequence (GHz)</th>
					<th>&#949;'</th>
					<th>&#963; (S/m)</th>
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
							<?php if ($i == count($frequence_array)) {break;}?>
					</tr>
					<?php endforeach ?>
					<?php break; ?>
				<?php endforeach ?>
			</tbody>
		</table>

</div>


<?php include("manager/optimInput.php"); ?>

<?php include("manager/masse.php"); ?>

<div class="phrase_mixture">
		<p>For a mixture of <strong> <?= $input_volumebecher; ?>  mL</strong>, please use:
			<br><br>NaCl mass: <strong><?= $recipe_array[0]; ?> g</strong><br>
			TritonX100 mass: <strong><?= $recipe_array[1]; ?> g</strong><br>
			Water volume: <strong><?= $recipe_array[2]; ?> ml</strong><br>
		</p>
	<?php endif ?>
</div>

<?php include("layout/footer.html"); ?>

</body>
</html>
