<!--------- Menu --------->
<div id="menu">
	<table border="0" id="menu" width="100%">
<?php
if (!isset($_SESSION['user_id']))
{
?>
    <tr>
		<td width="33%"><a href="index.php" class="type" <?php if(isset($thisPage) && $thisPage == 'accueil'){echo 'id="currentpage"';} ?>><img src="images/accueil.gif" height="22" width="22" style="vertical-align: middle" /> Accueil</a></td>
        <td> | </td>
        <td width="33%"><a href="connexion.php" class="type" <?php if(isset($thisPage) && $thisPage == 'connexion'){echo 'id="currentpage"';} ?>><img src="images/connexion.ico" height="22" width="22" style="vertical-align: middle" /> Connexion</a></td>
        <td> | </td>
        <td width="33%"><a href="inscription.php" class="type" <?php if(isset($thisPage) && $thisPage == 'inscription'){echo 'id="currentpage"';} ?>><img src="images/inscription.gif" height="22" width="22" style="vertical-align: middle" /> Inscription</a></td>
    </tr>
<?php
}
else	// si aucune session est active
{
?>
    <tr>
        <td width="25%"><a href="index.php" class="type" <?php if(isset($thisPage) && $thisPage == 'accueil'){echo 'id="currentpage"';} ?>><img src="images/accueil.gif" height="22" width="22" style="vertical-align: middle" /> Accueil</a></td>
        <td> | </td>
        <td width="25%"><a href="profil.php" class="type" <?php if(isset($thisPage) && $thisPage == 'profil'){echo 'id="currentpage"';} ?>><img src="images/profil.gif" height="22" width="22" style="vertical-align: middle" /> Profil</a></td>
        <td> | </td>
        <td width="25%"><a href="reservation.php" class="type" <?php if(isset($thisPage) && $thisPage == 'reservation'){echo 'id="currentpage"';} ?>><img src="images/reservation.gif" height="22" width="22" style="vertical-align: middle" /> Reservation</a></td>
        <td> | </td>
        <td width="25%"><a href="deconnexion.php" class="type"><img src="images/deconnexion.ico" height="22" width="22" style="vertical-align: middle" /> Deconnexion</a></td>
    </tr>
<?php
}
?>			
	</table>
</div>
<br/>
<!------------------------>
