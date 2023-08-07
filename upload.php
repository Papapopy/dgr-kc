<?php include("db.php");

if(isset($_POST['submit'])) {
$filename = $_FILES["file"]["name"];
$tempname = $_FILES["file"]["tmp_name"];
$folder= "Videos/". $filename;
move_uploaded_file($tempname, $folder);
$sql= "INSERT INTO 'video'('name') VALUES('$folder')";
if(!mysql_query($con,$sql))
{
	echo "data not insert";
}
else 
{
	echo "data insert";
}

}

?>

<form method="POST" enctype="multipart/form-data">
	<input type="file" name="file" id="file">
	<input type="submit" name="submit" value="submit">


</form>