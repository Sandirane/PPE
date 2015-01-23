<?php
// Connexion à la base de données
include('../PDO.php');
$c = new Connexion();

$c->deleteUser($_GET['id']);
header('Location: ../admin.php');
?>
