<?php session_start(); ?>
<?php
if(isset($_SESSION['user_id']))
{
$thisPage = 'profil';
?>
<!DOCTYPE html>

<html>
    <head>
	<title>Profil</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<!-- Entête de la page -->
<div id="entete">
        <?php include('include/entete.php'); ?>
    
	<?php include('include/menu.php'); ?>
</div>
<div id="contenu">
    <h1>Profil</h1>
    <form method="post" action="profil.php">     
		<table width="50%" align="left">
			<tr>
				<td style="text-align: right;"><label>Ancien mot de passe : </label></td>
				<td><input type="password" name="user_mdp" /></td>
			</tr>
			<tr>
				<td style="text-align: right;"><label>Nouveau mot de passe : </label></td>
				<td><input type="password" name="user_mdp1"/></td>
			</tr>
			<tr>
				<td style="text-align: right;"><label>Confirmer le nouveau mot de passe : </label></td>
				<td><input type="password" name="user_mdp2"/></td>
			</tr>
			<tr>
				<td colspan="2"><br/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Changer de mot de passe" name="new_mdp" /></td>
			</tr>
		</table>
        <?php if(isset($erreur)){echo $erreur;} ?>
 <!--fin formulaire -->
    </form>

        <?php
        if(isset($_POST['new_mdp'])) { // condifition si l'utilisateur a clic sur le boutton changer mot de passe
            
            if($_POST['user_mdp'] != '' AND $_POST['user_mdp1'] != '' AND $_POST['user_mdp2'] != '') { // condition si l'utilisateur à remplie tous les champs
                
                if($_SESSION['user_mdp'] == sha1($_POST['user_mdp'])) { // si l'ancien mot de passe est correcte
                    
                    if($_POST['user_mdp1'] == $_POST['user_mdp2']) { // si le les nouveaux mot de passe sont identique
                        
                        $_SESSION['user_mdp'] = sha1($_POST['user_mdp1']);
                        
                        // requete sql preparer
                        require('PDO.php');
                        $c=new Connexion();
                        $c->modifierMDP($_SESSION['user_id'], $_SESSION['user_mdp']);
                        
                        echo 'Mot de passe modifié'; // message de reussite
                        $erreur = "<br/><br/><br/><br/><div style='font-size: 30px; text-align: center; color: red;'>L'email ou le mot de passe est incorrect !</div>";
                        
                    }
                    else { echo 'Les nouveaux mot de passe ne sont pas identique'; } //sinon erreur
                    
                }
                else { echo 'Mauvais mot de passe'; } // sinon erreur
                
            }
            else { echo'Merci de remplir tous les champs'; } //sinon erreur
            
        }
        
        
        
        ?>
        
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