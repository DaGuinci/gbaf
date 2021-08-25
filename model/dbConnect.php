<?php

function dbConnect() {
	$lines=file(__DIR__.'/../../DBlog.conf');
	$dbconf=[];
	foreach($lines as $line){
		list($key,$value)=explode('=',$line,2);
		$dbconf[$key]=trim($value);
	}

	try {
		$db = new PDO($dbconf['database_server'], $dbconf['database_user'],$dbconf['database_password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
	
	return $db;
}
