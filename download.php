<?php
$file = $_GET['id'] .".pdf";
header("content-disposition: attachment; filename=" .urldecode($file));
$fb = fopen($file, "r");
while (!feof($fb)) {
	echo fread($fb, 8192);
	flush();
}
fclose($fb);
?>