<?php

$connect = new PDO("mysql:host=127.0.0.1;dbname=espace_membre", "root", "");

if(isset($_POST["year"]))
{
	$query = "SELECT * FROM chart_data WHERE year = '".$_POST["year"]."' 
	ORDER BY id ASC";

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach ($result as $row) 
	{
		$output[] = array(
			'month'			=> $row["month"],
			'profit'		=> floatval($row["profit"])
		);
	}
}

?>