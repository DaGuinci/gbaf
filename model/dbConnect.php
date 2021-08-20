<?php

function dbConnect() {
	$passFile = fopen('DBlog.txt', 'r');
	$id=trim(fgets($passFile));
	$pass=trim(fgets($passFile));

	try {
		$db = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', $id, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	
	return $db;
}