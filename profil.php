<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
$getid = intval($_GET['id']);
$requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
$requser->execute(array($getid));
$userinfo = $requser->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil</title>
	<link rel="stylesheet" href="css/drop1.css">
	<link rel="stylesheet" href="css/drop2.css">

</head>
<body>
	<header>
	<div align="center" class="d-flex justify-content-right w-450 align-items-right vh-100">
		<div class="shadow w-350 p-3 text-right">
		<h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
		<?php 
		if(!empty($userinfo['avatar']))
		{
		 ?>
		 <img src="membres/avatars/<?php echo $userinfo['avatar']; ?>" width="120" />
		 <?php
		}
		?>
		<br/>
		Pseudo = <?php echo $userinfo['pseudo']; ?>
		<br/>
		Mail = <?php echo $userinfo['mail']; ?>

		<br/>
		<?php
		if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
		{
		?>
		<a href="editionprofil.php">Editer mon profil</a><br/>
		<a href="inscription_user.php">Se deconnecté!</a>
		<?php 
		}
		?>
		</div>
	</div>
	</header>
	<br/>
	<br/>



	<div class="box" class=" d-flex justify-content-center align-items-center vh-150 ">
        <div class="dropdown" class="shadow w-500 w-550 p-3 text-right">Statistiques
            <span class="left-icon"></span>
            <span class="right-icon"></span>
            <div class="items">
               <a href="#" style="--i:1;"><span></span>Recette_Journalière</a>
               <a href="recetterecouvree.php" style="--i:2;"><span></span>Recettes_Mensuelles</a>
               <a href="listestat.php" style="--i:3;"><span></span>Recettes_Annuelles</a>
            </div>
        </div>
    </div>

	<div class="box1">
        <div class="dropdown1"><a href="redaction.php" style="color: white;"><span></span>Editer Article</a></div>
    </div>
    <div class="box">
        <div class="dropdown"><a href="insertpdf.php" style="color: white;"><span></span>Ajouter Doucuments</a></div>
    </div><br>
    <div class="box">
        <div class="dropdown"><a href="tdb.html" style="color: white;"><span></span>Monitoring</a></div>
    </div>


	<script src="drop.js"></script>
</body>
</html>
<?php
}
?>