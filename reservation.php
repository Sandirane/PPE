<?php session_start(); ?>
<?php
if(isset($_SESSION['user_id']))
{
?>
<!DOCTYPE html>
<?php
include('PDO.php');
$thisPage = 'reservation';
?>
<html>
    <head>
		<title>Reservation</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" type="text/css" href="calendar.css" />
    </head>
    <body>
<?php
if(isset($_POST['valider']))
{
	if($_POST['nb_personnes'] != '' && $_POST['hebergement_type'] != '' && $_POST['reservation_date'] != '' && $_POST['reservation_date2'] != '' && $_POST['pension'] != '')
	{
		$c = new Connexion();
		$c->ajouter_reservation($_POST['reservation_date'], $_POST['reservation_date2'], $_POST['nb_personnes'], $_POST['reservation_menage'], "0", $_SESSION['user_id'], $_POST['hebergement_type'], date('Y-m-d'));
		
		// Inscription réussi
		header('Location: reservation.php');		// On est redirigé vers la page de réservation (actualisation de la page)
		exit();
	}
}
?>
<!-- Entête de la page -->
<div id="entete">
    <?php include('include/entete.php'); ?>
    
	<?php include('include/menu.php'); ?>
</div>
<div id="contenu">
    <h1>Réservation</h1>
	<?php
        // Appel au script du calendrier
        require_once("calendar.php");
        // Parametrage
        $params = array("LANGUAGE_CODE" => "fr", "FIRST_WEEK_DAY" => 1, "USE_SESSION" => true);
        // Affichage
        Calendar($params);
        ?>
        
    <form action="reservation.php" method="post">
        <table border="0" align="center" width="60%">
            <tr>
                <td>Nombre de personnes :</td>
                <td>
                    <select name="nb_personnes">
						<option value=""></option>
                    <?php
                    for ($i=1;$i<10;$i++)
					{
						if(isset($_POST['nb_personnes']) && $_POST['nb_personnes'] == $i)
						{
							echo "<option value='".$i."' selected='selected'>".$i."</option>";
						}
						else
						{
							echo "<option value='".$i."'>".$i."</option>";
						}
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Type de logement :</td>
                <td>
                    <select name="hebergement_type">
                        <option value=""></option>
                        <?php
						$c = new Connexion();
						$result = $c->type_hebergement();
						
						echo $result;
						?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date :</td>
                <td>Du <input type="text" name="reservation_date" id="reservation_date" maxlength="10" readonly="readonly" placeholder="jj/mm/aaaa" value="<?php if(isset($_POST['reservation_date'])){echo $_POST['reservation_date'];}else{echo '';} ?>" />
				<br/>
				Au <input type="text" name="reservation_date2" id="reservation_date2" maxlength="10" readonly="readonly" placeholder="jj/mm/aaaa" value="<?php if(isset($_POST['reservation_date2'])){echo $_POST['reservation_date2'];}else{echo '';} ?>" /></td>
            </tr>
            <tr>
                <td>Type de pension :</td>
                <td>
					<input type="radio" name="pension" value="1" />Pension complète
                    <br/>
					<input type="radio" name="pension" value="0" />Demi-pension
				</td>
            </tr>
            <tr>
                <td>Menage en fin de semaine :</td>
                <td><input type="checkbox" name="reservation_menage" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="valider" value="Reserver" /></td>
        </table>
    </form>
</div>
<!-- Pied de page de la page -->
<div id="piedpage">
	<?php include('include/piedpage.php'); ?>
</div>
    </body>
</html>
<?php
}
else
{
	header('Location: index.php');
	exit();
}
?>