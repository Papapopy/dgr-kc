<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre;charset=utf8', 'root','');

$recettes = $bdd->query('SELECT * FROM month ORDER BY id DESC');

?>
<!DOCTYPE html>
<html lang="fr">
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
		<?php 
		if(isset($_GET['msg'])){
			$msg = $_GET['$msg'];
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  '.$msg.' 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
	}
	?>
		<a href="newstat.php" class="btn btn-dark mb-3">Créer</a>

<table class="table table-hover text-center" >
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Assignation</th>
      <th scope="col">Realisation</th>
      <th scope="col">Mois</th>
      <th scope="col">Observation</th>
      <th scope="col">Validé</th>
    </tr>
  </thead>
  <tbody>
  		<?php while ($a = $recettes->fetch()) { ?>
  		 		<tr>
      				<th><?= $a['id'] ?></th>
      				<td><?= $a['assignation'] ?></td>
      				<td><?= $a['realisation'] ?></td>
      				<td><?= $a['mois'] ?></td>
      				<td><?= $a['observation'] ?></td>
      				<td>
      					<a href="#" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>

      					<a href="#" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
      				</td>
    			</tr>
  			<?php
  			}
  		?>
  </tbody>
</table>
	</div>
	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>