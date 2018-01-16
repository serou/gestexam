<?php
	$localhost = 'mysql:host=localhost;dbname=h_php;charset=utf8';
	$user = 'root';
	$password = '';

	$bdd = new PDO($localhost, $user, $password);
   	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
