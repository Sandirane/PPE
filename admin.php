
<!DOCTYPE html>
<?php
include('include/config.php');
?>
<html>
    <head>
	<title>Back Office</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
	function change_onglet(name)
	{
		document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
		document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
		document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
		document.getElementById('contenu_onglet_'+name).style.display = 'block';
		anc_onglet = name;
	}
	</script>
    </head>
    <body style="width: 1000px;">
<!-- Entête de la page -->
<div id="entete">
    <?php include('include/entete.php'); ?>
    
	<?php include('include/menu.php'); ?>
</div>
<div class="systeme_onglets">
	<div class="onglets">
		<span class="onglet_0 onglet" id="onglet_admin_utilisateurs" onClick="javascript:change_onglet('admin_utilisateurs');">Gestion des utilisateurs</span>
		<span class="onglet_0 onglet" id="onglet_admin_reservations" onClick="javascript:change_onglet('admin_reservations');">Gestion des réservations</span>
	</div>
	<div id="contenu">
		<div class="contenu_onglets">
			<div class="contenu_onglet" id="contenu_onglet_admin_utilisateurs">
				<h1>Gestion des utilisateurs</h1>
				<?php
				$reponse = $c->query("SELECT * FROM user");
				?>
				<table id="tableau" border="1" width="100%" style="font-size: 12px; text-align: center;">
							<tr>
								<th width="12%">Prénom</th>
								<th width="12%">Nom</th>
								<th width="20%">Email</th>
								<th width="11%">Tél</th>
								<th width="18%">Rue</th>
								<th width="6%">CP</th>
								<th width="16%">Ville</th>
								<th width="4%">Admin</th>
								<th></th>
							</tr>
						<?php
						while($donnees = $reponse->fetch())
						{
						?>
							<tr>
								<td><?php echo $donnees['user_prenom'];?></td>
								<td><?php echo $donnees['user_nom'];?></td>
								<td><?php echo $donnees['user_email'];?></td>
								<td><?php echo $donnees['user_tel'];?></td>
								<td><?php echo $donnees['user_rue'];?></td>
								<td><?php echo $donnees['user_cp'];?></td>
								<td><?php echo $donnees['user_ville'];?></td>
								<td><?php echo $donnees['user_admin'];?></td>
								<td>
									<input type="button" name="modifier" value="Modifier" onclick="location.href='profilAdmin.php?id=<?php echo $donnees['user_id'];?>'" style="width: 85px;" />
									<input type="button" name="supprimer" value="Supprimer" onclick="if(confirm('Voulez-vous vraiment supprimer cette utilisateur ?')){location.href='include/deleteUser.php?id=<?php echo $donnees['user_id'];?>'}" style="width: 85px;" />
								</td>
							</tr>
						<?php
						}
						?>
				</table>
			</div>
			<div class="contenu_onglet" id="contenu_onglet_admin_reservations">
				<h1>Gestion des reservations</h1>
				<?php
				$reponse = $c->query("SELECT * FROM reservation, user WHERE user_id = reservation_user_id");
                                
				?>

				<table id="tableau" border="1" width="100%" style="font-size: 12px; text-align: center;">
						<tr>
							<th width="20%">Date arrivée</th>
							<th width="20%">Date départ</th>
							<th width="11%">Nb pers</th>
							<th width="14%">Menage</th>
							<th width="6%">etat</th>
							<th width="19%">Utilisateur</th>
							<th></th>
						</tr>
					<?php
					while($donnees = $reponse->fetch())
                                        
					{
					?>
						<tr>
							<td><?php echo date_inverse($donnees['reservation_date_arrivee']);?></td>
							<td><?php echo date_inverse($donnees['reservation_date_depart']);?></td>
							<td><?php echo $donnees['reservation_nb_personnes'];?></td>
							<td><?php echo $donnees['reservation_menage'];?></td>
                                                        <td><?php if ($donnees['reservation_etat']=='0'){echo '<div style="color:red;">'.$donnees['reservation_etat'].'</div>';}
                                                        else {echo '<div style="color:green;">'.$donnees['reservation_etat'].'</div>';}?></td>
							<td><?php echo $donnees['user_nom'];?></td>
                                                        <td>
                                                            <?php
                                                            if($donnees['reservation_etat']=='0')
                                                            {
                                                            ?>
                                                                <input type="button" name="ValiderEtat" value="Valider" onclick="if(confirm('Voulez-vous vraiment valider cette réservation ?')){location.href='include/reservationEtat.php?id=<?php echo $donnees['reservation_id'];?>'}" style="width: 85px;" />
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                                <input type="button" name="AnnulerEtat" value="Annuler" onclick="if(confirm('Voulez-vous vraiment annuler cette réservation ?')){location.href='include/annulerReservation.php?id=<?php echo $donnees['reservation_id'];?>'}" style="width: 85px;" />
                                                            <?php
                                                            }
                                                            ?>
<input type="button" name="supprimer" value="Supprimer" onclick="if(confirm('Voulez-vous vraiment supprimer cette réservation ?')){location.href='include/deleteReservation.php?id=<?php echo $donnees['reservation_id']; ?>'}" style="width: 85px;" /></td>
						</tr>
					<?php
					}
                                        $c->etatReservation($donnees['resevation_etat']);
					?>

				</table>
			</div>
		</div>
	</div>
</div>
<!-- Pied de page de la page -->
<div id="piedpage">
	<?php include('include/piedpage.php'); ?>
</div>
    </body>
</html>
<script type="text/javascript">
	var anc_onglet = 'admin_utilisateurs';
	change_onglet(anc_onglet);
</script>
