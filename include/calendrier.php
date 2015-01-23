<?php
require("include/calendrier/class.mois.inc.php");

if(isset($_GET['annee']) && isset($_GET['mois']))
{
    if($_GET['mois'] == '13')
    {
        $annee = $_GET['annee'] +1;
        $mois = '1';
    }
    else
    {
        $annee = $_GET['annee'];
        $mois = $_GET['mois'] + 1;
    }
}
else
{
	$annee = date('Y');
        $mois = date('m');
}

//Affichage du calendrier du mois en cours
$mois= new mois($mois, $annee, $_SESSION['user_id']);
$mois->afficher_calendrier_mois();

echo 	'<table>
			<tr>
				<td class="anneeprec">
					<a href="reservation.php?annee='.($annee).'&mois='.($mois - 1).'">
						<img src="images/prec.png" alt="' . $annee . '" style="border:none;" />
					</a>
				</td>
				<td class="anneesuiv">
					<a href="reservation.php?annee='.($annee).'&mois='.($mois + 1).'">
						<img src="images/suiv.png" alt="' . $annee . '" style="border:none;" />
					</a>
				</td>
			</tr>
		</table>';
?>