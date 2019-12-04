<?php
	$host="localhost";
	$user=""; //Username
	$pw=""; //Password
	$db=""; //Database name

	$koneksi=mysql_connect($host,$user,$pw) or die ("Failed Connection");
	mysql_select_db($db, $koneksi) or die ("Failed to choose database");
	
?>
