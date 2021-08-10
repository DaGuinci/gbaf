<?php

function dbConnect() {
	try {
		$db = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'gbaf', 'Lunaire32+23', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	
	return $db;
}