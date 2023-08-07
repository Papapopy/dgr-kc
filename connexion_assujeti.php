

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>www.dgr-kc.cd</title>
	<meta name="keywords" content="torrent9, torrent 9, torrent9 site, torrent9 gratuit, torrent9 films, torrent francais, french torrent, torrents french, tracker fr">
	<meta name="description" content="">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/torrent1.css">
	<link rel="stylesheet" type="text/css" href="css/torrent2.css">
    <link rel="stylesheet" type="text/css" href="css/torrent3.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel="stylesheet" />    
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
                                <a href="#" title="Nos impots">Nos impots</a>
                            </li>
                            <li>
                                <a href="drop.html" title="Statistiques">Statistiques</a>
                            </li>
                            <li>
                                <a href="#" title="Télé-declarations">Télé-declarations</a>
                            </li>
                            <li>
                                <a href="contact.php" title="Contact">Contact</a>
                            </li>
                            <li>
                                <a href="#" title="Apropos">Apropos</a>
                            </li>                         
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
<body>
<section class="home1" id="home1">
        <div class="home-text1 container1">
            <h2 class="home-title1"></h2>
            <span class="home-subtitle1"></span>
        </div>
    </section>
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
                <a href="inscription_assujeti.php">s'inscrire!</a>
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
</body>



<br><br>
<br><br>
<footer>
    <div class="footer container">
        <p>&#169;copyright: Bur.InfoDGRKC@2023</p>
        <div class="social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-youtube'></i></a>
            <a href="info@dgr-kc.cd"><i class='bx bxl-gmail'></i></a>
        </div>
    </div>
</footer>
</html>