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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/log.css"> 
    <title>LogIn</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form"  method="POST">
                    <h2 class="title">Se Connecter!</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="nom utilisateur" name="mailconnect">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mot de passe" name="mdpconnect">
                    </div>
                    <input type="submit" value="Vailder" class="btn solid" name="formconnexion">

                    <br>
                    <p class="social-text">Ou Se Connecter via</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <br>
                    </div>
                    <div align="center">
                    	<?php
							if(isset($erreur))
						{
							echo '<font color="red">'.$erreur."</font>";
						}
						?>
                    </div>
                </form>

                <form action="" class="sign-up-form" method="POST">
                    <h2 class="title">S'inscrire!</h2>
                    <a href="expolog/php/signup.php" class="btn btn-warning"><i class="fa-solid fa-user-plus"></i></a>
                    <p>Cliquer sur Bouton bleu</p>
                    <p>Pour se créer de compte.</p>
                    <br>
                    <p class="social-text">Ou Nous suivre sur</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Nouveau ici?</h3>
                    <p>Veillez créer un compte!</p>
                    <button class="btn transparent" id="sign-up-btn">Créer un compte!</button>
                </div>
                <img src="images/sign_up.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Avez-vous un compte?</h3>
                    <p>Connectez-vous!</p>
                    <button class="btn transparent" id="sign-in-btn">Connectez-vous!</button>
                </div>
                <img src="images/working.svg" class="image" alt="">
            </div>
        </div>
    </div>
    <script src="js/log.js"></script>
    <script src="js/main.js"></script>
</body>
</html>