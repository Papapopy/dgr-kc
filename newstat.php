<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');

if(isset($_POST['submit']))
{
	$assignation = htmlspecialchars($_POST['assignation']);
	$reali = htmlspecialchars($_POST['reali']);		
	$mois = htmlspecialchars($_POST['mois']);
	$observation = htmlspecialchars($_POST['observation']);
	if(!empty($_POST['assignation']) AND !empty($_POST['reali']) AND !empty($_POST['mois']) AND !empty($_POST['observation']))
	{
		$insertmbr = $bdd->prepare("INSERT INTO month(assignation, realisation, mois, observation) VALUES(?, ?, ?, ?)");
		$insertmbr->execute(array($assignation, $reali, $mois, $observation));
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
	 rel="stylesheet" 
	 integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
	integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title></title>
</head>
<body>

	<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
		Recette Mensuelle
	</nav>
	<div class="container">
		<div class="text-center mb-4">
			<h3>Ajouter Nouvelle</h3>
			<p class="text-muted">Completez les champs</p>
		</div>

		<div class="container d-flex justify-content-center">
			<form action="" method="post" style="width:50vw; min-width: 300px;">
				<div class="row">
					<div class="col">
						<label class="form-label">Mois en cours:</label>
						<input type="month" name="mois" class="form-control">
					</div>
					<div class="col">
						<label class="form-label">Assignation:</label>
						<input type="text" name="assignation" class="form-control">
					</div>
					<div class="col">
						<label class="form-label">Realisé:</label>
						<input type="text" name="reali" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label class="form-label">Observation:</label>
						<textarea name="observation" class="form-control"></textarea>
						<br>
					</div>
				</div>
				<div>
					<button type="submit" class="btn btn-success" name="submit">Sauvegarder</button>
					<a href="#" class="btn btn-danger">Fermer</a>
				</div>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>