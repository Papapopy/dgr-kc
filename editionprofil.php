<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');
if(isset($_SESSION['id']))
{
	$requser = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();

	if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
	{
		$newpseudo = htmlspecialchars($_POST['newpseudo']);
		$insertpseudo = $bdd->prepare("UPDATE membre SET pseudo = ? WHERE id = ?");
		$insertpseudo->execute(array($newpseudo, $_SESSION['id']));
		header('Location: profil.php?id='.$_SESSION['id']);
	}

	if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
	{
		$newmail = htmlspecialchars($_POST['newmail']);
		$insertmail = $bdd->prepare("UPDATE membre SET mail = ? WHERE id = ?");
		$insertmail->execute(array($newmail, $_SESSION['id']));
		header('Location: profil.php?id='.$_SESSION['id']);
	}
	if(isset($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
	{
		$mdp1 = htmlspecialchars($_POST['newmdp1']);
		$mdp2 = htmlspecialchars($_POST['newmdp2']);

		if($mdp1 == $mdp2)
		{
			$insertmdp = $bdd->prepare("UPDATE membre SET motdepasse = ? WHERE id = ?");
			$insertmdp->execute(array($mdp1, $_SESSION['id']));
			header('Location: profil.php?id='.$_SESSION['id']);
		}
		else
		{
			$msg = "Vos deux mots de passe different!";
		}
	}

	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
	{
		$tailleMax = 2097152;
		$extensionsValides = array('jpg','jpeg','png');
		if($_FILES['avatar']['size'] <= $tailleMax)
		{
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			if(in_array($extensionUpload, $extensionsValides))
			{ 
				$chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
				if($resultat)
				{
					$updateavatar = $bdd->prepare('UPDATE membre SET avatar = :avatar WHERE id = :id');
					$updateavatar->execute(array('avatar' => $_SESSION['id'].".".$extensionUpload,
						'id' => $_SESSION['id']
					));
					header('Location: profil.php?id='.$_SESSION['id']); 
				}
				else
				{
					$msg = "Erreur d'importation";
				}
			}
			else
			{
				$msg = "Mauvais format de photo";
			}
		}
		else
		{
			$msg = "Votre ne doit pas depasser 2 Mega";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div align="center">
		<h2>Edition de profil</h2>
		<form method="POST" action="" enctype="multipart/form-data">
			<table>
			<tr>
				<td align="right">
					<label>Pseudo : </label>
				</td>
				<td>
					<input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>"/>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label>eMail :</label>
				</td>
				<td>
					<input type="mail" name="newmail" placeholder="email" value="<?php echo $user['mail']; ?>">
				</td>
			</tr>
			<tr>
				<td>
					<label>Mot de passe : </label>
				</td>
				<td>
					<input type="password" name="newmdp1" placeholder="Mot de passe">
				</td>
			</tr>
			<tr>
				<td>
					<label>Confirmation : </label>
				</td>
				<td>
					<input type="password" name="newmdp2" placeholder="Confirmer">
				</td>
			</tr>	
			<tr>
				<td align="right">
					<label>Photo : </label>
				</td>
				<td>
					<input type="file" name="avatar">
				</td>
			</tr>		
			<br>
			<tr>
				<td></td>
			<td>
				<br>

			<input type="submit" value="Valider" name="">
			</td>
			</tr>
			</table>
		</form>
		<?php if(isset($msg)) { echo $msg;}?>
	</div>

</body>
</html>
<?php
}
else
{
	header("Location: connexion.php");
}
?>