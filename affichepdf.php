<div>
	<?php
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			include("db.php");
			$sql = "SELECT pdf from pdf_file WHERE id=$id";
			$result = mysqli_query($con, $sql);
			$a = mysqli_fetch_array($result);
		?>
		
 		<?php
		}
	?>
</div>

<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root','');
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
$getid = intval($_GET['id']);
$requser = $bdd->prepare('SELECT * FROM pdf_file WHERE id = ?');
$requser->execute(array($getid));
$a = $requser->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lecture PDF</title>
</head>
<body>
	<header>
	<div align="center">
		
		<embed type="application/pdf" src="pdf/<?php echo $a['pdf'] ; ?>" width="1300" height="1000">
	
		
		<?php
		if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
		{
		?>
		<a href="editionprofil.php">Editer mon profil</a><br/>
		<a href="deconnexion.php">Se deconnecté!</a>
		<?php 
		}
		?>
	</div>
	</header>
	<br/>
	
</body>
</html>
<?php
}
?>