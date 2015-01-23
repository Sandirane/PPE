<?php include 'include/config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
		<title>Profil Admin</title>
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
    <h1>Profil Admin</h1>
	<?php
        if(isset($_POST["modifierUser"]))
		{
			$user_nom = $_POST["user_nom"];
			$user_prenom = $_POST["user_prenom"];
			$user_email = $_POST["user_email"];
			$user_tel = $_POST["user_tel"];
			$user_rue = $_POST["user_rue"];
			$user_cp = $_POST["user_cp"];
			$user_ville = $_POST["user_ville"];
			$user_admin = $_POST["user_admin"];
			$id = $_GET['id'];


                        $c->modifierUser($_GET['id']);
			
        } 
                    
                    $result = $c->afficherUser($_GET['id']);
        ?>
	
    <form method="post">
        <table border="0" width="50%" align="center">
            <tr>
				<td>Nom :</td>
                <td><input type="text" name="user_nom" value="<?php echo $result['user_nom'];?>" /></td>
            </tr>
            <tr>
				<td>Prénom :</td>
                <td><input type="text" name="user_prenom" value="<?php echo $result['user_prenom'];?>" /></td>
            </tr>
            <tr>
				<td>Email :</td>
                <td><input type="text" name="user_email" value="<?php echo $result['user_email'];?>" /></td>
            </tr>
            <tr>
				<td>Tél. :</td>
                <td><input type="text" name="user_tel" value="<?php echo $result['user_tel'];?>" /></td>
            </tr>
            <tr>
				<td>Rue :</td>
                <td><input type="text" name="user_rue" value="<?php echo $result['user_rue'];?>" /></td>
            </tr>
            <tr>
				<td>Code postal :</td>
                <td><input type="text" name="user_cp" value="<?php echo $result['user_cp'];?>" /></td>
            </tr>
            <tr>
				<td>Ville :</td>
                <td><input type="text" name="user_ville" value="<?php echo $result['user_ville'];?>" /></td>
            </tr>
            <tr>
				<td>Admin :</td>
                <td><input type="text" name="user_admin" value="<?php echo $result['user_admin'];?>" /></td>
            </tr>
			<tr>
				<td colspan="2"><br/></td>
            </tr>
			<tr>
				<td></td>
                <td><input type="submit" value="Modifier" name="modifierUser" /></td>
            </tr>
        </table>
    </form>
</div>
<!-- Pied de page de la page -->
<div id="piedpage">
	<?php include('include/piedpage.php'); ?>
</div>
    </body>
</html>
