<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_POST['formconnexion']))
{
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = htmlspecialchars($_POST['mdpconnect']);
	if(!empty($mailconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM membre WHERE mail = ? AND motdepasse = ?");
		$requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: profil.php?id=".$_SESSION['id']);
		}
		else
		{
			$erreur = "email ou mot de passe incorrecte";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent etre remplis!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/style3.css" />
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel="stylesheet" />
	<title></title>
</head>
<body>
<header>
		<div class="nav container">
		<a href="index.php" class="logo">DGR-KC<span>.CD</span></a>
		</div>
</header>
<section class="home1" id="home1">
		<div class="home-text1 container1">
			<h2 class="home-title1"></h2>
			<span class="home-subtitle1"></span>
		</div>
	</section>
<br/>
<br/>
	<div align="center">
		<h2>Connexion</h2>
		<br/><br/>
		<form method="POST" action="" class="">
				<td align="center">
				<input type="mail" name="mailconnect" placeholder="email" />
				</td><br/>
				<td align="center">
				<input type="password" name="mdpconnect" placeholder="Mot de passe" />					
				</td><br><br>
				<input type="submit" name="formconnexion" value="Se connecter" class="login" />
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
<script 
src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfkSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous">
</script>
<script src="js/main.js"></script>
</body>
</html>