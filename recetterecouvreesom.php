<?php
$con = mysqli_connect("localhost","root","","espace_membre");
if(!$con){
	die("Connexion echouée:".mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Recettes Jounalieres</title>
	<meta name="keywords" content="torrent9, torrent 9, torrent9 site, torrent9 gratuit, torrent9 films, torrent francais, french torrent, torrents french, tracker fr">
	<meta name="description" content="">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/torrent1.css">
	<link rel="stylesheet" type="text/css" href="css/torrent2.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
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
                                <a href="actualite.php" title="Actualité">Actualité</a>
                            </li>
                            <li>
                                <a href="#" title="Documentations">Documentations</a>
                            </li>
                            <li>
                                <a href="statistique.php" title="Statistiques">Statistiques</a>
                            </li>
                            <li>
                                <a href="#" title="Procedures">Procedures</a>
                            </li>
                            <li>
                                <a href="#" title="Télé-declarations">Télé-declarations</a>
                            </li>
                            <li>
                                <a href="#" title="Contact">Contact</a>
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
	<div class="container">
		<h2 style="text-align: center;">Recettes Recouvrées Par Jour</h2>
			<table class="table table-striped table-bordered">
				<div class="container">
				<thead class="thead-dark">
					<tr>
						<th>Date</th>
						<th>Rawbank</th>
						<th>Fbnbank</th>
						<th>Bgfibank</th>
						<th>Accessbank</th>
						<th>Ecobank</th>
						<th>Sofibanque</th>
						<th>Equitybank</th>
						<th>Total</th>
						<th>Cumule</th>
					</tr>
				</thead>
				</div>
				<tbody>
					<?php
					$result = $con->query("SELECT * FROM recettesynt ORDER BY date1 ASC");
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()){?>
							<tr>
								<td><?php echo $row['date1']; ?></td>
								<td><?php echo $row['rawbank']; ?></td>
								<td><?php echo $row['fbnbank']; ?></td>
								<td><?php echo $row['bgfibank']; ?></td>
								<td><?php echo $row['accessbank']; ?></td>
								<td><?php echo $row['ecobank']; ?></td>
								<td><?php echo $row['sofibanque']; ?></td>
								<td><?php echo $row['equitybank']; ?></td>
								<td><?php echo $row['total']; ?></td>
								<td><?php echo $row['cumul']; ?></td>
							</tr>
							<?php
						}
					}
					else{?>
						<tr>
							<td colspan="7">Données pas trouvées!</td>
						</tr>		
				</tbody>
			<?php } ?>
			</table>
			<div class="container">
			<?php
			$results = mysqli_query($con, "SELECT sum(total) FROM recettesynt") or die(mysqli_error());
			while($rows = mysqli_fetch_array($results)){?>
				<tr>
					<td">Total Général: <?php echo $rows['sum(total)']; ?></td>
				</tr>
			<?php
			}
			?>
		</div>
		</div>
	</div>
</body>
</html>