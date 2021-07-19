<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>TMM GeePs Website</title>
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
					<img src="image/Modèles têtes.png" alt="" width="640" height="auto" />
				</figure>
			</div>
		</div>

		<span id="timeline"></span>

	</section>

<section>
	<div id="txtexplication">
	<h1>Topic presentation</h1> <br>
	<h4>INTRODUCTION</h4>
	<?php $num = 0 ?>
<<<<<<< HEAD
	<p>During the last decades, microwave imaging has attracted remarkable attention for biomedical applications mainly due to the significant contrast between the dielectric properties of normal and abnormal tissues. Compared to the other conventional imaging modalities, such as X–ray mammography, microwave imaging is an attractive approach in several aspects, namely its non–ionizing nature, low cost, and compactness of the equipment associated with its hardware system.
		This is the reason why, at the present time, there are multiple research teams around the world working on bio-medical applications of microwave imaging. This is evidenced by the emergence of several COST and particularly, MiMed. The latter gave rise to several projects; among them, the European project “EMERALD” (ElectroMagnetic Imaging for a novel genERation of medicAL Devices) has started. EMERALD is a multidisciplinary project involving 27 partners across the Europe. It offers a unique opportunity for interactions between clinicians, researchers and instrumentation
		developers.
		Newly designed devices require multiple tests under a controlled environment before moving to human clinical test. This website is mainly concerned with the development and realization of the biological phantoms dedicated to test the microwaving imaging devices and particularly is well suited to a remote developement. To be more specific,the website allows the user to produce liquid mixtures mimicking any type of biological tissue [<?php $num++; echo $num; ?>] referenced in the Gabriel database [<?php $num++; echo $num; ?>], at least over a range of frequencies [1 to 5 GHz]. The database has been extended thanks to data from literature [<?php $num++; $colon = $num; echo $num; ?>][<?php $num++; echo $num; ?>]. Moreover, from this website you can download .stl files corresponding to the printed head phantoms and to their numerical version which can be used for electromagnetic simulations<br>

	</p>
	<h4>TRITON X-100 AND SALTED WATER SOLUTIONS</h4>
	<p>Used in the framework on the EMERALD project, the manufacturing process has to be easily reproducible by an electrical engineer in a non-specific environment (no hood), and without drastic precautions. Following our previous works [<?php $num++; $colonPat = $num; echo $num; ?>][<?php $num++; echo $num; ?>], the phantoms such as the breast, head [<?php $num++; echo $num; ?>] and thorax [<?php $num++; echo $num; ?>] are composed of 3D printed cavities filled up with liquid binary mixtures of Triton X-100 (TX-100, a non-ionic surfactant) and salted water. Those liquid mixtures are adjustable in time therefore their use in the manufacturing process, provide stable phantoms over time. Moreover, the TritonX's and salt's concentrations are given by a Gauss-Newton algorithm [<?php $num++; echo $num; ?>] based on a binary law (Bottcher [<?php $num++; echo $num; ?>] or Krasczewski [<?php $num++; echo $num; ?>]). The algorithm used as reference values provided from the database. </p>
=======
	<p>During the last decades, microwave imaging has attracted remarkable attention for biomedical applications mainly due to the significant contrast between
		the dielectric properties of normal and abnormal tissues. Compared to the other conventional imaging modalities, such as X–ray mammography, microwave imaging
		is an attractive approach in several aspects, namely its non–ionizing nature, low cost, and compactness of the equipment associated with its hardware system.
		This is the reason why, at the present time, there are multiple research teams around the world working on bio-medical applications of microwave imaging.
		This is evidenced by the emergence of several COST and particularly, MiMed. The latter gave rise to several projects; among them, the European
		project “EMERALD” (ElectroMagnetic Imaging for a novel genERation of medicAL Devices) has started. EMERALD is a multidisciplinary project involving 27 partners
		across the Europe. It offers a unique opportunity for interactions between clinicians, researchers and instrumentation
		developers.
		Newly designed devices require multiple tests under a controlled environment before moving to human clinical test. This website is mainly concerned with
		the development and realization of the biological phantoms dedicated to test the microwaving imaging devices and particularly is well suited to a remote developement.
		To be more specific,the website allows the user to produce liquid mixtures mimicking any type of biological tissue <a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a> referenced
		in the Gabriel database <a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a>, at least over a range of frequencies [1 to 5 GHz]. The database has been extended thanks to data from
		literature <a href="url" target="_blank">[<?php $num++; $colon = $num; echo $num; ?>]</a><a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a>. Moreover, from this website you can download .stl files corresponding
		to the printed head phantoms and to their numerical version which can be used for electromagnetic simulations<br>

	</p>
	<h4>TRITON X-100 AND SALTED WATER SOLUTIONS</h4>
	<p>Used in the framework on the EMERALD project, the manufacturing process has to be easily reproducible by an electrical
		 engineer in a non-specific environment (no hood), and without drastic precautions. Following our previous
		 works <a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a><a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a>, the phantoms
		 such as the breast, head <a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a> and thorax <a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a> are composed
		 of 3D printed cavities filled up with liquid binary mixtures of Triton X-100 (TX-100, a non-ionic surfactant) and salted water. Those liquid
		 mixtures are adjustable in time therefore their use in the manufacturing process, provide stable phantoms over time. Moreover, the TritonX's and
		 salt's concentrations are given by a Gauss-Newton algorithm <a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a> based on a binary law (Bottcher <a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a>
		 or Krasczewski <a href="url" target="_blank">[<?php $num++; echo $num; ?>]</a>). The algorithm used as reference values provided from the database. </p>
>>>>>>> dbfd060ee63e967dadc82533c98191a0a6229716
	</div>
</section>




<footer>
	<?php include("layout/footer.html"); ?>
</footer>

</body>
</html>
