<?php
// Connexion à la base de données
include('../PDO.php');
$c = new Connexion();

$c->etatReservation($_GET['id']);
header('Location: ../admin.php');
?>
