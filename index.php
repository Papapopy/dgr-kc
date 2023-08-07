<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root','');

$articles = $bdd->query('SELECT * FROM article1 ORDER BY id DESC LIMIT 4');
if(isset($_GET['recherche']) AND !empty($_GET['recherche'])){
$recherche = htmlspecialchars($_GET['recherche']);
$articles = $bdd->query('SELECT * FROM article1 WHERE titre LIKE "%'.$recherche.'%" ORDER BY id DESC');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>www.dgr-kc.cd</title>
	<meta name="keywords" content="dgr-kc, dgrkc, Kongo central, Recettes provinciale, direction générale des recettes, impots, taxes, vignettes, vignette">
	<meta name="description" content="">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/torrent1.css">
	<link rel="stylesheet" type="text/css" href="css/torrent2.css">
    <link rel="stylesheet" type="text/css" href="css/torrent3.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link href='/static/css/css_style.css' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/css/font.min.css">
    <link href="css/styletorrent.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel="stylesheet" />
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="//e.dtscout.com/e/?v=1a&amp;pid=5200&amp;site=1&amp;l=https%3A%2F%2Fwww.torrent9.site%2F&amp;j=https%3A%2F%2Fwww.google.com%2F" async="" type="text/javascript"></script>
	<script src="//e.dtscout.com/e/?v=1a&amp;pid=5200&amp;site=1&amp;l=https%3A%2F%2Fwww.torrent9.site%2F&amp;j=https%3A%2F%2Fwww.google.com%2F" async="" type="text/javascript"></script>
	<script src="//e.dtscout.com/e/?v=1a&amp;pid=5200&amp;site=1&amp;l=https%3A%2F%2Fwww.torrent9.site%2F&amp;j=https%3A%2F%2Fwww.google.com%2F" async="" type="text/javascript"></script>
	<script type="text/javascript" async="" src="//s10.histats.com/js15_as.js"></script>
</head>
<header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="logo">
                            <a href="index.php"><img src="images/logo2.png" alt="Torrent9" style="width: 125px"></a>
                        </div>
                    </div>
                    <div class="col-sm-9" style="padding-right:15px;padding-left:15px;">
                        <div class="main-search">
                            <form action="" method="GET" id="rechercher" name="rechercher">
                                <ul>
                                    <li class="col-sm-7" style="padding: 30px; margin:0">
                                        <input type="text" class="form-control top-main-search" placeholder="Votre recherche ici..." name="recherche" />
                                    </li>
                                    <li class="col-sm-3" style="padding: 30px; margin:0">
                                        <input type="submit" value="Rechercher" class="top-search-btn" style="border:0px" />
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="navigation">
            <div class="container">
                <nav class="navbar navbar-default torent9-nav" style="border:0">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="actualite.php" title="Actualités">Actualités</a>
                            </li>
                            <li>
                                <a href="document.php" title="Documentations">Documentations</a>
                            </li>
                            <li>
                                <a href="impot.php" title="Nos impots">Nos impots</a>
                            </li>
                            <li>
                                <a href="consulter_stat.php" title="Statistiques">Statistiques</a>
                            </li>
                            <li>
                                <a href="expolog/login.php" title="Télé-declarations">Télé-declarations</a>
                            </li>
                            <li>
                                <a href="contact.php" title="Contact">Contact</a>
                            </li>
                            <li>
                                <a href="apropos.php" title="Apropos">Apropos</a>
                            </li>                         
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <div class="left-ad" style="max-width:600px; margin:20px auto 0 auto;padding-bottom:0;">
        <center>
            <pre><big><strong>Bienvenue dans Notre Site Officiel</strong></big></pre>
        </center>
    </div>
</div>
        <section>
            <div class="content-main">
                <div class="content-inner-section">
                    <div class="container">
                        <div class="content-inner">
                            <div class="breadcrumb-top">
                               
                                <block name="style">
                            </div>
                            <div class="row cus-row">
                                <div class="col-sm-4 cus-col content-right-col hidden-xs hidden-sm">
                                    <div style="margin-bottom:20px;">
                                        
                                    </div>
                                    <div class="top-links">
                                        <div class="right-title">
                                            <h2>A la Une</h2>
                                        </div>
                                        <div class="top-links-area" style="background-color:#f7f7f7;text-align:center">
                                            <?php if($articles->rowCount() > 0) { ?>
                                            <div class="row">
                                                <?php while($a = $articles->fetch()) {?>
                                                <div class="col-xs-6" style="padding:8px; min-height:260px">
                                                    <a href="post_page.php?id=<?= $a['id'] ?>">
                                                        <img width="152px" height="202px" src="miniature/<?= $a['id'] ?>.jpg" >
                                                    </a>
                                                    <a href="post_page.php?id=<?= $a['id'] ?>" style="font-weight:bold;color:#000; font-size:12px;padding-top:5px"><?= $a['titre'] ?></a><br>
                                                        <?= $a['date_time_publication'] ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php 
                                        } 
                                            else {?> 
                                                Aucun resultat trouvé pour: <?= $recherche ?>...
                                            <?php } ?>
                                        </div>
                                        <div style="padding-top:15px;padding-bottom:15px;">                           
                                            <div class="" style="padding-top:15px;padding-bottom:15px">
                                                <center></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 cus-col content-left-col">
                                    <div class="left-ad">
                                        <center></center>
                                    </div>
                                    <div class="left-tab-section">
                                        
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered cust-table -table">
                                                <label>Ouverture des travaux de la Conférence des Directeurs de la DGRKC</label>
                                                <div class="grid">
                                                    
                                                    <iframe width="700px" height="455px" 
                                                  src="https://www.youtube.com/embed/JciJ_iKvjxs"
                                                  frameborder="0"
                                                  allow="autoplay; encrypted-media"
                                                  allowfullscreen></iframe>
                                                </div>
                                                <label>Fermeture des travaux de la Conférence des Directeurs de la DGRKC</label>
                                                <div class="grid">
                                                    <iframe width="700px" height="455px" 
                                                    src="https://www.youtube.com/embed/9UsAgb2Gx0g"
                                                    frameborder="0"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen></iframe>
                                                </div>
                                            </table>
                                        </div>                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </body>
            <footer>
                <div class="footer container">
                    <p>&#169;copyright: Bur.InfoDGRKC@2023</p>
                        <div class="social">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-youtube'></i></a>
                            <a href="info@dgr-kc.cd"><i class='bx bxl-gmail'></i></a>
                            <a href="inscription_user.php"><i class='bx bxl-user'></i></a> 
                        </div>
                </div>
            </footer>
</html>