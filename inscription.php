<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_POST['forminscription']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mail = htmlspecialchars($_POST['mail']);		
	$mail2 = htmlspecialchars($_POST['mail2']);
	$mdp = htmlspecialchars($_POST['mdp']);
	$mdp2 = htmlspecialchars($_POST['mdp2']);
	if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
	{
		
		$pseudolength = strlen($pseudo);
		if($pseudolength <= 50)
		{
			if($mail == $mail2)
			{
			if(filter_var($mail, FILTER_VALIDATE_EMAIL))
				{
				$reqmail = $bdd->prepare("SELECT * FROM membre WHERE mail = ?");
  				$reqmail->execute(array($mail));
				$mailexist = $reqmail->rowCount();
				if($mailexist == 0)
				{
					if($mdp == $mdp2)
					{
						$insertmbr = $bdd->prepare("INSERT INTO membre(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
						$insertmbr->execute(array($pseudo, $mail, $mdp));
						$erreur = "Compte créé! <a href=\"connexion.php\">Me connecter</a>";
						$lastid = $bdd ->lastInsertId();

						if(exif_imagetype($_FILES['avatar']['tmp_name']) == 2){
							$chemin = 'avatar/'.$lastid.'.jpg';
							move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
							}
							else
							{
							$message = 'votre image doit etre au format jpg';
							}
						}
					}
					else
					{
					$erreur = "Vos mots de passes different";
					}
				}
				else
				{
					$erreur = "Adresse mail deja utilisée!";
				}	
			}
		}
			else
			{
				$erreur = "Vos emails sont different!";
			}
		}
		else
		{
			$erreur = "Votre pseudo est trop long";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent etre remplis!";
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
		<h2>Inscription</h2>
		<br/><br/><br/>
		<form method="POST" action="">
			<table>
			<tr>
				<td align="right">
					<label for="pseudo">Pseudo :</label>
				</td>
				<td>
					<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mail">email :</label>
				</td>
				<td>
					<input type="email" placeholder="Votre email" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>"/>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mail2">Confirmer :</label>
				</td>
				<td>
					<input type="email" placeholder="Votre email" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mdp">Motde passe :</label>
				</td>
				<td>
					<input type="password" placeholder="Votre Mot de Passe" id="mdp" name="mdp"/>
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for="mdp2">Confirmer :</label>
				</td>
				<td>
					<input type="password" placeholder="Votre Mot de Passe" id="mdp2" name="mdp2"/>
				</td>
			</tr>
			<tr>
				<td align="right">
							<label>Image :</label>
						</td>
						<td>
							<input type="file" name="avatar">
						</td>
					</tr>
			<td>
				<br>

			<input type="submit" value="Je m'inscris" name="forminscription"/>
			</td>
			</tr>
			</table>

		</form>
		<br>
		<br>
		<?php
			if(isset($erreur))
			{
				echo '<font color="red">'.$erreur."</font>";
			}
		?>
	</div>

</body>
</html>