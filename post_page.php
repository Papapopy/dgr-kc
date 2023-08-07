<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root','');

if(isset($_GET['id']) AND !empty($_GET['id']))
{
	$get_id = htmlspecialchars($_GET['id']);
	$article = $bdd->prepare('SELECT * FROM article1 WHERE id = ?');
	$article->execute(array($get_id));

	if($article->rowCount() == 1)
	{
		$article = $article->fetch();
		$titre = $article['titre'];
		$id = $article['id'];
		$contenu = $article['contenu'];
		$date_time_publication = $article['date_time_publication'];
	}
	else
	{
		die('article inexistant');
	}

}else
	die('Erreur')
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel="stylesheet">
</head>
<body>
	<header>
		<div class="nav container">
		<a href="index.php" class="logo">DGR-KC<span>.CD</span></a>
		</div>
	</header>
	<section class="post-header">
		<div class="header-content post-container">
			<a href="index.php" class="back-home">Acceuil</a>
			<h1 class="header-title"><?= $titre ?></h1>
			<img src="miniature/<?= $id ?>.jpg" alt="" class="header-img" style="width: 450px; height: 450px;"/>
		</div>
	</section>
	
	<section class="post-content post container">
		<div align="center">
		<h2 class="sub-heading"><?= $titre ?></h2>
		<p class="post-text"><?= $contenu ?></p><br><br>
		</div>
	</section>

	<div class="share post-container">
		<span class="share-title">Partager cet article</span>
		<div class="social">
			<a href="#"><i class='bx bxl-facebook'></i></a>
			<a href="#"><i class='bx bxl-twitter'></i></a>
			<a href="#"><i class='bx bxl-instagram'></i></a>
		</div>
	</div>

	<div class="footer container">
		<p>&#169;copyright: @DGRKC2023</p>
		<div class="social">
			<a href="#"><i class='bx bxl-facebook'></i></a>
			<a href="#"><i class='bx bxl-twitter'></i></a>
			<a href="#"><i class='bx bxl-instagram'></i></a>
		</div>
		
	</div>

<script 
src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfkSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="js/main.js"></script>
</body>
</html>