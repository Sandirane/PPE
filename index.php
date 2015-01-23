<?php session_start(); ?>
<!DOCTYPE html>
<?php
include('PDO.php');
$thisPage = 'accueil';
?>
<html>
    <head>

	<title>Accueil</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="include/jsDiaporama_1.js"></script>
        <script type="text/javascript" src="include/Jquery.js"></script>

    
    </head>
    <body onload="setInterval(changeimg,5000)">
<!-- Entête de la page -->
<div id="entete">
        <?php include('include/entete.php'); ?>
        <?php include('include/menu.php'); ?>
</div>

<div id="contenu">
    <h1>Accueil</h1>
    <?php include('include/diaporama.php'); ?>
    <div id="contenu" style="overflow: auto" >
    <img align="left" width="35%" src="images/kanoe.jpg">
    <h4>Animations</h4>
    <p>En toute saison, le centre dispose : d'une bibliothèque adultes et enfants, de télévisions, d'un piano et d'une salle de fitness. Selon les semaines, peuvent être organisés, des soirées dansantes, des spectacles assurés par des intervenants extérieurs (chansons, danses folkloriques, théâtre, magie, cirque, diaporama, expositions), du cinéma, des concerts …</br>Pendant les vacances scolaires, des activités manuelles (arts plastiques...) ou des ateliers (danses, musique, remise en forme, théâtre...) sont organisés.
    </p>
    <img align="right" width="35%" src="images/vtt.jpeg">
    </br>
    <p>En été, le centre dispose d'un terrain de sport (basket ball, volley, handball...) et d'un parc de VTT que peuvent louer les participants.</br>En hiver, location de matériel (ski, raquette, chaussures de randonnée) avec un partenaire.Pour les participants aux colloques, le centre peut proposer des randonnées encadrées par des professionnels.
    </p>
    </div>
</div>
<!-- Pied de page de la page -->
<div id="piedpage">
	<?php include('include/piedpage.php'); ?>
</div>
    </body>
</html>