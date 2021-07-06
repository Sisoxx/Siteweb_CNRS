<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Calculateur en ligne</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
</head>


	<?php include("layout/header.html");?>


<body>

	<span id="sl_play" class="sl_command">&nbsp;</span>
	<span id="sl_pause" class="sl_command">&nbsp;</span>
	<span id="sl_i1" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i2" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i3" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i4" class="sl_command sl_i">&nbsp;</span>

	<section id="slideshow">

		<a class="play_commands pause" href="#sl_pause" title="Maintain paused">Pause</a>
		<a class="play_commands play" href="#sl_play" title="Play the animation">Play</a>

		<div class="container">
			<div class="c_slider"></div>
			<div class="slider">
				<figure>
					<img src="image/emerald_home.jpg" alt="" width="640" height="310" />
				</figure><!--
				--><figure>
					<img src="image/Fantôme Tête.png" alt="" width="640" height="310" />
				</figure><!--
				--><figure>
					<img src="image/camera1.jpg" alt="" width="640" height="310" />
				</figure><!--
				--><figure>
					<img src="image/Modèles têtes.png" alt="" width="640" height="310" />
				</figure>
			</div>
		</div>

		<span id="timeline"></span>

	</section>

<section>
	<div id="txtexplication">
	<h1>Topic presentation</h1> <br>
	<h4>Introduction</h4>
	<p>During the last decades, microwave imaging has attracted remarkable attention for biomedical applications mainly due to the significant contrast between the dielectric properties of normal and abnormal tissues. Compared to the other conventional imaging modalities, such as X–ray mammography, microwave imaging is an attractive approach in several aspects, namely its non–ionizing nature, low cost, and compactness of the equipment associated with its hardware system.
		This is the reason why, at the present time, there are dozens of research teams around the world working on bio-medical applications of microwave imaging. This is evidenced by the emergence of several COST and particularly, MiMed. The latter gave rise to several projects; among them, the European project “EMERALD” (ElectroMagnetic Imaging for a novel genERation of medicAL Devices) has started. EMERALD is a multidisciplinary project involving 27 partners across the Europe. It offers a unique opportunity for interactions between clinicians, researchers and instrumentation
		developers. <br>
		Newly designed devices require multiple tests under a controlled environment before moving to human clinical test. This paper is mainly concerned with the conception, development, and realization of the biological phantoms dedicated to test the devices developed in the project and particularly is well suited to a remote teamwork of electrical engineers, taking into account the European context. To be more specific, we show that the method proposed in the previous work seems to be suitable for the production of liquid mixtures mimicking any a priori type of biological tissue over a wide range of frequencies. <br>
		This work will also include a close collaboration with clinicians involved in the EMERALD project, particularly those from Lariboisière and La Salpêtrière Hospitals.
		This communication first reviews the manufacturing method of the biological phantoms and underlines the interest of using it in the frame of a project such as EMERALD. Then, discussions as well as numerical results show that liquid mixtures based on Triton X-100 and salted water solutions, are suitable to mimic any kind of biological tissues used in the frequency range of the EMERALD’s project. Finally an example of simulations performed with the Microwave Studio Software, from the STL format file of a head phantom, shows the interest of developping phantoms whose shapes are provided from STL format files.
	</p>
	<h4>TRITON X-100 AND SALTED WATER SOLUTIONS</h4>
	<p>Used in the framework on the EMERALD project, the manufacturing process has to be easily reproducible by an electrical engineer in a non-specific environment (no hood), and without drastic precautions. Following our previous works, the phantoms such as the breast and head are composed of 3D printed cavities filled up with liquid binary mixtures of Triton X-100 (TX-100, a non-ionic surfactant) and salted water. Those liquid mixtures are adjustable in time therefore their use in the manufacturing process, provide stable phantoms over time.</p>
	<h5>Experimental Protocol</h5>
	<ul>
		<li>Tar the balance with an empty beaker.</li>
		<li>Add successively the masses of NaCl and water and tare the balance between each step.</li>
		<li>Stir the solution with a magnetic bar - when the salt is dissolved, tare the balance.</li>
		<li>Add the mass of TritonX-100. Note that, the TritonX- 100 is very viscous at room temperature, then it must be heated first separately, in a 45 ° C water bath.</li>
		<li>Place the beaker in a water bath at 45° C and stir the solution with a magnetic bar. The bath water must cover all the mixture. Note that the 40-60% solutions of TritonX-100 are gelled at room temperature, it is therefore necessary to increase the temperature to 45 ° C to obtain homogeneous mixtures in all cases.</li>
		<li>Once the solution is homogeneous, pour it into an airtight container and keep the sample safe from light.</li>
	</ul>
	</div>
</section>




<footer>
	<?php include("layout/footer.html"); ?>
</footer>

</body>
</html>
