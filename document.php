<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root','');

$document = $bdd->query('SELECT * FROM pdf_file ORDER BY id DESC');
?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>documentations</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styletorrent.css" rel="stylesheet">
        
    </head>
    <body>
        <header>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="z-index:1000;color:#dedede;background:#2e2e2e;font-size:30px">
                <i class="fa fa-bars"></i>
            </button>
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="images/logo2.png" alt="Torrent9" style="width: 125px" alt="Torrent">
                                </a>
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
		<body>

	<center>
		<h2 style="color: #d7385e;">Nos Documents</h2>
		<br>
    </center>
    <center>
        <table class="table">
            <thead class="table-light">
                <th>Titre</th>
            </thead>
            <tbody>
                <?php while($a = $document->fetch()) {?>
                <tr>
                    <td><?php echo $a["pdf"]; ?></td>
                    <td><a href="affichepdf.php?id=<?= $a['id'] ?>" class="btn btn-info">Lire</a></td>
                    <td><a href="download.php?id=<?= $a['id'] ?>" class="btn btn-warning">Télécharger</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>

    
    
</body>
</html>