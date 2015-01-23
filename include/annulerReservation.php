<?php

// Connexion à la base de données
include('../PDO.php');
$c = new Connexion();

$c->annulerReservation($_GET['id']);
header('Location: ../admin.php');
?>
