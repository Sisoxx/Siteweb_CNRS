<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!-- Titre de l'onglet -->
	<title>Simulation</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="style/style3.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
</head>

<body>

	<!-- Commande PHP qui inclut le code du fichier header -->
	<?php include("layout/header.html"); ?>

		<div id="calculateur">
			<div class="page_title">
				<h1>Simulation</h1>
			</div>

			<div class="simulator_form">
				<form action="" method="post" id="formulaire2">

				<div class="red_star_note">
					<note>All fields marked with * are mandatory.</note>
				</div>

					<!-- Séléction du tissu -->
					<div class="simulation_cases_label">
							<label for="choice">Tissue to mimic <redStar>*</redStar></label>
					</div>

					<div class="simulation_cases">
							<select id="tissu_selection" name="choice" required>
						<option value="Choice" disabled selected>Choose one in the list</option>
						<option value="Adenocarninoma" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Adenocarninoma') ? 'selected' : ''; ?>>Adenocarninoma [3]</option>
						<option value="Adenoma_HGD" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Adenoma_HGD') ? 'selected' : ''; ?>>Adenoma HGD [3]</option>
						<option value="Adenoma_LGD" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Adenoma_LGD') ? 'selected' : ''; ?>>Adenoma LGD [3]</option>
						<option value="Aorta" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Aorta') ? 'selected' : ''; ?>>Aorta</option>
						<option value="Bladder" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Bladder') ? 'selected' : ''; ?>>Bladder</option>
						<option value="Blood" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Blood') ? 'selected' : ''; ?>>Blood</option>
						<option value="Bone_Cancellous" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Bone_Cancellous') ? 'selected' : ''; ?>>Bone Cancellous</option>
						<option value="Bone_Cortical" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Bone_Cortical') ? 'selected' : ''; ?>>Bone Cortical</option>
						<option value="Bone_Marrow_Infiltrated" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'option1') ? 'selected' : ''; ?>>Bone Marrow Infiltrated</option>
						<option value="Bone_Marrow_Not_Infiltrated" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Bone_Marrow_Not_Infiltrated') ? 'selected' : ''; ?>>Bone Marrow Not Infiltrated</option>
						<option value="Brain_Grey_Matter" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Brain_Grey_Matter') ? 'selected' : ''; ?>>Brain Grey Matter</option>
						<option value="Brain_White_Matter" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Brain_White_Matter') ? 'selected' : ''; ?>>Brain White Matter</option>
						<option value="Breast_Fat" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Breast_Fat') ? 'selected' : ''; ?>>Breast Fat</option>
						<option value="Cartilage" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Cartilage') ? 'selected' : ''; ?>>Cartilage</option>
						<option value="Cerebellum" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Cerebellum') ? 'selected' : ''; ?>>Cerebellum</option>
						<option value="Cerebro_Spinal_Fluid" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Cerebro_Spinal_Fluid') ? 'selected' : ''; ?>>Cerebro Spinal Fluid</option>
						<option value="Cervix" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Cervix') ? 'selected' : ''; ?>>Cervix</option>
						<option value="Colon" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Colon') ? 'selected' : ''; ?>>Colon</option>
						<option value="Cornea" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Cornea') ? 'selected' : ''; ?>>Cornea</option>
						<option value="Cortex" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Cortex') ? 'selected' : ''; ?>>Cortex</option>
						<option value="Dura" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Dura') ? 'selected' : ''; ?>>Dura</option>
						<option value="Eye_Tissues_Sclera" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Eye_Tissues_Sclera') ? 'selected' : ''; ?>>Eye Tissues</option>
						<option value="Fat_Average_Infiltrated" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Fat_Average_Infiltrated') ? 'selected' : ''; ?>> Fat Infiltrated</option>
						<option value="Fat_Breast" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Fat_Breast') ? 'selected' : ''; ?>>Fat Breast [3]</option>
						<option value="Fat_Not_Infiltrated" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Fat_Not_Infiltrated') ? 'selected' : ''; ?>>Fat Not Infiltrated</option>
						<option value="Gall_Bladder" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Gall_Bladder') ? 'selected' : ''; ?>>Gall Blader</option>
						<option value="Gall_Bladder_Bile" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Gall_Bladder_Bile') ? 'selected' : ''; ?>>Gall Bladder Bile</option>
						<option value="Glandular_Breast" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Glandular_Breast') ? 'selected' : ''; ?>>Glandular Breast</option>
						<option value="Healthy_mucosa" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Healthy_mucosa') ? 'selected' : ''; ?>>Healthy mucosa [3]</option>
						<option value="Heart" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Heart') ? 'selected' : ''; ?>>Heart</option>
						<option value="Artial_Appendage_Int" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Artial_Appendage_Int') ? 'selected' : ''; ?>>Heart - Artial Appendage (Interior)</option>
						<option value="Artial_Appendage_Ext" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Artial_Appendage_Ext') ? 'selected' : ''; ?>>Heart - Artial Appendage (Exterior)</option>
						<option value="Endocardiom" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Endocardiom') ? 'selected' : ''; ?>>Heart - Endocardiom</option>
						<option value="Epicardium" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Epicardium') ? 'selected' : ''; ?>>Heart - Epicardium</option>
						<option value="Myocardium" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Myocardium') ? 'selected' : ''; ?>>Heart - Myocardium</option>
						<option value="Great_Vessel" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Great_Vessel') ? 'selected' : ''; ?>>Heart - Great Vessel (Luminal Vessel)</option>
						<option value="Heterogeneous_Breast" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Heterogeneous_Breast') ? 'selected' : ''; ?>>Heterogeneous Breast</option>
						<option value="Hyperplasic" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Hyperplasic') ? 'selected' : ''; ?>>Hyperplasic [3]</option>
						<option value="Kidney" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Kidney') ? 'selected' : ''; ?>>Kidney</option>
						<option value="Lens_Cortex" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Lens_Cortex') ? 'selected' : ''; ?>>Lens Cortex</option>
						<option value="Lens_Nucleus" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Lens_Nucleus') ? 'selected' : ''; ?>>Lens Nucleus</option>
						<option value="Liver" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Liver') ? 'selected' : ''; ?>>Liver</option>
						<option value="Lung_Deflated" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Lung_Deflated') ? 'selected' : ''; ?>>Lung Deflated</option>
						<option value="Lung_Inflated" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Lung_Inflated') ? 'selected' : ''; ?>>Lung Inflated</option>
						<option value="Medulla" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Medulla') ? 'selected' : ''; ?>>Medulla</option>
						<option value="Muscle" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Muscle') ? 'selected' : ''; ?>>Muscle</option>
						<option value="Nerve" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Nerve') ? 'selected' : ''; ?>>Nerve</option>
						<option value="Ovary" <?php echo (isset($_POST['choice']) && $_POST['selchoiceect'] === 'Ovary') ? 'selected' : ''; ?>>Ovary</option>
						<option value="Skin_Dry" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Skin_Dry') ? 'selected' : ''; ?>>Skin Dry</option>
						<option value="Skin_Wet" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Skin_Wet') ? 'selected' : ''; ?>>Skin Wet</option>
						<option value="Small_Intestine" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Small_Intestine') ? 'selected' : ''; ?>>Small Intestine</option>
						<option value="Spleen" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Spleen') ? 'selected' : ''; ?>>Spleen</option>
						<option value="Stomach" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Stomach') ? 'selected' : ''; ?>>Stomach</option>
						<option value="Tendon" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Tendon') ? 'selected' : ''; ?>>Tendon</option>
						<option value="Testis" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Testis') ? 'selected' : ''; ?>>Testis</option>
						<option value="Thyroid" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Thyroid') ? 'selected' : ''; ?>>Thyroid</option>
						<option value="Tongue" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Tongue') ? 'selected' : ''; ?>>Tongue</option>
						<option value="Trachea" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Trachea') ? 'selected' : ''; ?>>Trachea</option>
						<option value="Tumor_Breast" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Tumor_Breast') ? 'selected' : ''; ?>>Tumor Breast</option>
						<option value="Uterus" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Uterus') ? 'selected' : ''; ?>>Uterus</option>
						<option value="Vitreous_Humor" <?php echo (isset($_POST['choice']) && $_POST['choice'] === 'Vitreous_Humor') ? 'selected' : ''; ?>>Vitres Humor</option>
					</select><br>
					</div>

					<!-- Number of points -->
					<div class="simulation_cases_label">
							<label for="numberPoints">Number of frequency points <redStar>*</redStar></label><br>
					</div>
					<div class="simulation_cases">
							<input class="case" type="number" min="0" max="200" name="numberPoints"  placeholder="<?php echo isset($_POST['numberPoints']) ? htmlspecialchars($_POST['numberPoints'], ENT_QUOTES) : htmlspecialchars("ex: 10 ..."); ?>"
							value="<?php echo isset($_POST['numberPoints']) ? $_POST['numberPoints'] : ''; ?>" required><br>
					</div>

					<!-- Frequency range -->
					<div class="simulation_cases_label">
					<label for="debutfrequence">Low range frequency (in GHz) <redStar>*</redStar></label><br>
					</div>
					<div class="simulation_cases">
					<input class="case" type="number" min="0" step="0.001" max="6" name="debutfrequence"  placeholder="<?php echo isset($_POST['debutfrequence']) ? htmlspecialchars($_POST['debutfrequence'], ENT_QUOTES) : htmlspecialchars("ex: 1 GHz..."); ?>"
					value="<?php echo isset($_POST['debutfrequence']) ? $_POST['debutfrequence'] : ''; ?>" required><br>
					</div>
					<div class="simulation_cases_label">
					<label for="finfrequence">High range frequency (in GHz) <redStar>*</redStar></label><br>
					</div>
					<div class="simulation_cases">
					<input class="case" type="number" min="0" step="0.001" max="50" name="finfrequence"  placeholder="<?php echo isset($_POST['finfrequence']) ? htmlspecialchars($_POST['finfrequence'], ENT_QUOTES) : htmlspecialchars("ex: 5 GHz..."); ?>"
					value="<?php echo isset($_POST['finfrequence']) ? $_POST['finfrequence'] : ''; ?>" required><br>
					</div>

					<!-- Law -->
					<div class="simulation_cases_label">
					<label>Law to use</label><br>
					</div>

					<div class="simulation_cases">
						<div class="radio">
							<div>
								<input type="radio" value="kraszweski" name="law" <?php echo (isset($_POST['law']) && $_POST['law'] === 'bottcher') ? '' : 'checked'; ?>>
							</div>
							<div class="radioLabel">
								<label for="kraszweski">Kraszweski's Law</label>
							</div>
							<div>
								<input type="radio" value="bottcher" name="law" <?php echo (isset($_POST['law']) && $_POST['law'] === 'bottcher') ? 'checked' : ''; ?>>
							</div>
							<div class="radioLabel">
								<label for="bottcher">Bottcher's Law</label>
							</div>

						</div>
					</div>

					<!-- Temperature -->
					<!-- <div class="simulation_cases_label">
					<label for="temperature">Temperature (in °C)</label><br>
					</div>
					<div class="simulation_cases">
					<input class="case" type="number" min="0" step="0.01" max="50" name="temperature"  placeholder="<?php# echo isset($_POST['temperature']) ? htmlspecialchars($_POST['temperature'], ENT_QUOTES) : htmlspecialchars("ex: 25 °C..."); ?>"
					value="<?php# echo isset($_POST['temperature']) ? $_POST['temperature'] : ''; ?>" required><br>
					</div> -->

					<!-- Salinity -->
					<!-- <div class="simulation_cases_label">
					<label for="salinity">Salinity (in g/L)</label><br>
					</div>
					<div class="simulation_cases">
					<input class="case" type="number" min="0" step="0.001" max="30" name="salinity"  placeholder="<?php #echo isset($_POST['salinity']) ? htmlspecialchars($_POST['salinity'], ENT_QUOTES) : htmlspecialchars("ex: 0 g/L..."); ?>"
					value="<?php #echo isset($_POST['salinity']) ? $_POST['salinity'] : ''; ?>" required><br>
					</div> -->

					<!-- V1 -->
					<!-- <div class="simulation_cases_label">
					<label for="volume1">Volume V1 (between 0 and 1)</label><br>
					</div>
					<div class="simulation_cases">
					<input class="case" type="number" min="0" step="0.01" max="1" name="volume1"  placeholder="<?php #echo isset($_POST['volume1']) ? htmlspecialchars($_POST['volume1'], ENT_QUOTES) : htmlspecialchars("ex: 0.5 ..."); ?>"
					value="<?php #echo isset($_POST['volume1']) ? $_POST['volume1'] : ''; ?>" required ><br>
					</div> -->

					<!-- Volume of the mixture -->
					<div class="simulation_cases_label">
					<label for="">Volume of the mixture (in mL) <redStar>*</redStar></label><br>
					</div>
					<div class="simulation_cases">
					<input class ="case" type="number" min="0" step="0.01" max="50000" name="volumebecher" placeholder="<?php echo isset($_POST['volumebecher']) ? htmlspecialchars($_POST['volumebecher'], ENT_QUOTES) : htmlspecialchars('ex: 40 mL ...'); ?>"
					value="<?php echo isset($_POST['volumebecher']) ? $_POST['volumebecher'] : ''; ?>" required><br>
					</div>

					<!-- Grey line -->
					<div id="result_line"></div>

					<div class="simulation_cases_label">
						<p>Please select parameters to display : </p>
					</div>
					<div class="output_display">
						<div class="checkbox">
							<div>
								<input type="checkbox" value="mixture_results" name="mixtureResults" <?php echo (isset($_POST['mixtureResults']) && $_POST['mixtureResults'] === 'mixture_results') ? 'checked' : 'checked'; ?>>
							</div>
							<div class="checkboxLabel">
								<label for="mixture_results">Recipe for the mixture</label>
							</div>
							<div>
								<input type="checkbox" value="cole_cole_results" name="colecoleResults" <?php echo (isset($_POST['colecoleResults']) && $_POST['colecoleResults'] === 'cole_cole_results') ? 'checked' : 'checked'; ?>>
							</div>
							<div class="checkboxLabel">
								<label for="cole_cole_results">Table of the dialectric properties</label>
							</div>
						</div>
					</div>

					<!-- Submit button -->
					<div class="submit_button">
					<input id="bouttton" type="submit" value="Display results" name="boutonColeCole" >
					</div>
				</form>
			</div>
		</div>


<?php if(isset($_POST["boutonColeCole"])): ?>
	<!-- Si on appui sur le boutton "Display results", cette partie apparaît -->

	<!-- Inclusion de la partie qui calcul la référence -->
	<?php include("manager/calculcolecole.php"); ?>
	<!-- Inclusion de la partie qui calcul l'optimisation -->
	<?php include("manager/optimInput.php"); ?>
	<!-- Inclusion de la partie qui calcul la recette -->
	<?php include("manager/masse.php"); ?>

	<?php if(isset($_POST["mixtureResults"])): ?>
		<!-- Si la case "Recipe for the mixture" est cochée, cette partie apparaît -->

		<!-- Partie recette -->
	<div id="phrase_mixture">
		<?php if ($input_volumebecher>1000): ?>
			<?php  $input_volumebecher=$input_volumebecher/1000;?>
			For a mixture of <redStar> <?= $input_volumebecher; ?>  L</redStar>, please use:
		<?php else: ?>
			For a mixture of <redStar> <?= $input_volumebecher; ?>  mL</redStar>, please use:
		<?php endif ?>
<?php for($i=0;$i<3;$i++){
	$recipe_array[$i]= floatval($recipe_array[$i]);
} ?>

			<?php if ($recipe_array[0]>1000): ?>
				<?php  $recipe_array[0]=$recipe_array[0]/1000;?>
				<br><br>NaCl mass: <redStar><?= number_format($recipe_array[0], 3, ".", " "); ?> kg</redStar><br>
			<?php else: ?>
				<br><br>NaCl mass: <redStar><?= number_format($recipe_array[0], 1, ".", " "); ?> g</redStar><br>
			<?php endif ?>

			<?php if ($recipe_array[1]>1000): ?>
				<?php  $recipe_array[1]=$recipe_array[1]/1000;?>
				TritonX100 mass: <redStar><?= number_format($recipe_array[1], 3, ".", " "); ?> kg</redStar><br>
			<?php else: ?>
				TritonX100 mass: <redStar><?= number_format($recipe_array[1], 1, ".", " "); ?> g</redStar><br>
			<?php endif ?>

			<?php if ($recipe_array[2]<0){$recipe_array[2]=0;} ?>
				<?php if ($recipe_array[2]>1000): ?>
				<?php  $recipe_array[2]=$recipe_array[2]/1000;?>
				Water mass: <redStar><?= number_format($recipe_array[2], 3, ".", " "); ?> kg</redStar><br><br>
			<?php else: ?>
				Water mass: <redStar><?= number_format($recipe_array[2], 1, ".", " "); ?> g</redStar><br><br>
			<?php endif ?>

				Quadratic error: <redStar><?= number_format($recipe_array[3], 2, ".", " "); ?> %</redStar><br>

	</div>
	<br>

	<!-- Protocole experimental -->
	<div class="paragraph_exp">
		<h4>Experimental Protocol</h4>
		<ul>
			<li>Tar the balance with an empty beaker.</li>
			<li>Add successively the masses of NaCl and water and tare the balance between each step.</li>
			<li>Stir the solution with a magnetic bar - when the salt is dissolved, tare the balance.</li>
			<li>Add the salted water to the beaker of TritonX-100. Note that, the TritonX- 100 is very viscous at room temperature, then it must be heated first separately, in a 45 ° C water bath.</li>
			<li>Place the beaker in a water bath at 45° C and stir the solution with a magnetic bar. The bath water must cover all the mixture. Note that the 40-60% solutions of TritonX-100 are gelled at room temperature, it is therefore necessary to increase the temperature to 45 ° C to obtain homogeneous mixtures in all cases.</li>
			<li>Once the solution is homogeneous, pour it into an airtight container and keep the sample safe from light.</li>
		</ul>
	</div>
	<br>
	<?php endif ?>


	<?php if(isset($_POST["colecoleResults"])): ?>
	<div id="resultsTables">
		<!-- Affichage des tableaux -->

		<!-- Tableau de référence -->
		<div class="tables" >
			<h3>Reference Table</h3>
				<table class="table">
					<thead>
						<tr>
							<!-- Titre des colones -->
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
									<td><?= number_format($frequence_array[$i], 2, ".", " "); ?></td>
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

		<div class="tables">
			<!-- Tableau de l'optimisation -->
			<h3>Mixture Table</h3>
			<table class="table">
				<thead>
					<!-- Titre des colones -->
					<tr>
						<th>Frequence (GHz)</th>
						<th>&#949;'</th>
						<th>&#963; (S/m)</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tableau_output2 as $tableau2): ?>
						<?php foreach($tableau_output2 as $sigma2): ?>
						<?php endforeach ?>
						<?php $i = 0; ?>
						<?php foreach($tableau2 as $espilon2): ?>
						<tr>
								<td><?= number_format($frequence_array[$i], 2, ".", " "); ?></td>
								<td><?= $espilon2; ?></td>
								<td><?= $sigma2[$i]; ?></td>
								<?php $i++; ?>
								<?php if ($i == count($frequence_array)) {break;}?>
						</tr>
						<?php endforeach ?>
						<?php break; ?>
					<?php endforeach ?>
				</tbody>
			</table>
			</div>
		</div>

		<!-- Affichage des graphiques -->
	<div id="graphs">
		<div>
			<?php echo "<img src='image/temp/graph1.png' />"; ?>
		</div>
		<div>
			<?php echo "<img src='image/temp/graph2.png' />"; ?>
		</div>
	</div>
	<?php endif ?>

<?php endif ?>

	<!-- Commande PHP qui inclut le code du fichier footer -->
	<?php include("layout/footer.html"); ?>


</body>
</html>
