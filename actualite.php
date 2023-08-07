<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root','');

$articles = $bdd->query('SELECT * FROM article1 ORDER BY date_time_publication DESC');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/style2.css" />
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel="stylesheet" />
</head>
<body>
	<header>
		<div class="nav container">
		<a href="index.php" class="logo">DGR-KC<span>.CD</span></a>
		<a href="connexion.php" class="login">Admin</a>
		</div>
	</header>
	<section class="home" id="home">
		<div class="home-text container">
			<h2 class="home-title">Bienvenu</h2>
			<span class="home-subtitle">Découvrez l'Actualité de la DGR/KC</span>
		</div>
		
	</section>
	<section class="post container">
		<div class="post-box">
			<ul>
			<?php while ($a = $articles->fetch()) { ?>
			 <a href="post_page.php?id=<?= $a['id'] ?>"><img src="miniature/<?= $a['id'] ?>.jpg" class="post-img"/></a><br/>
			<h2 class="category"><?= $a['categorie'] ?></h2>
			<a href="post_page.php?id=<?= $a['id'] ?>" class="post-title"><?= $a['titre'] ?></a>
			<span class="post-date"><?= $a['date_time_publication'] ?></span>
			<p class="post-description"><?= $a['resume'] ?></p>
			<div class="profile">
				<img src="miniature/12.jpg" alt="" class="profile-img">
				<span class="profile-name">Direction Generale</span>
			</div>
			<?php } ?>			
			</ul>
			<br/>	
	</section>
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
crossorigin="anonymous">
</script>
<script src="js/main.js"></script>
</body>
</html>