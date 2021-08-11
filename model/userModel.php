<?php
include_once ('./model/dbConnect.php');

function verifUserName($userName){
	$db=dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbr FROM acount WHERE username = ?');
	$req->execute(array($userName));
	$reponse=$req->fetch();
	return $reponse['nbr'];
	$req->closeCursor();
}

function addUser($firstName, $name, $userName, $pass, $secretQuestion, $answer) {
	$pass=password_hash($pass, PASSWORD_DEFAULT);
	$db=dbConnect();
	$req=$db->prepare('INSERT INTO acount(nom, prenom, username, password, question, reponse) VALUES(:firstName, :name, :userName, :pass, :question, :reponse)');
	$req->execute(array(
	'firstName'=> $firstName,
	'name' => $name,
	'userName' => $userName,
	'pass' => $pass,
	'question' => $secretQuestion,
	'reponse' => $answer));
	$req->closeCursor();
}

function keyHole($userName, $pass) {
	$db = dbConnect();
	$req = $db->prepare('SELECT password FROM acount WHERE username= :username');
	$req->execute(array(
	'username'=> $userName));
	$resultat=$req->fetch();
	$isPasswordCorrect = password_verify($pass, $resultat['password']);
	return $isPasswordCorrect;
}

function getUserInfo($userName) {
	$db = dbConnect();
	$req = $db->prepare('SELECT id_user,nom,prenom,username,password
	FROM acount WHERE username= :username');
	$req->execute(array(
	'username'=> $userName));
	$resultat=$req->fetch();
	return $resultat;
}