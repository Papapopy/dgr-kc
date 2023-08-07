<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Display PDF</title>
</head>
<body>
	<div class="div1">
		<?php
		include 'db.php';

		$sql="SELECT pdf from pdf_file";
		$query=mysqli_query($con,$sql);
		while ($info=mysqli_fetch_array($query)){
			?>
		<embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="1300" height="1000">

		<?php 
			}
			?>
	</div>
</body>
</html>