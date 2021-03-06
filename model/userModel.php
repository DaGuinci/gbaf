<?php
include_once ('./model/dbConnect.php');

function verifUserName($userName){
	$db=dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbr FROM gbafacount WHERE username = ?');
	$req->execute(array($userName));
	$reponse=$req->fetch();
	return $reponse['nbr'];
	$req->closeCursor();
}

function addUser($firstName, $name, $userName, $pass, $secretQuestion, $answer) {
	$pass=password_hash($pass, PASSWORD_DEFAULT);
	$userHashed=hash('sha256', $userName);
	$db=dbConnect();
	$req=$db->prepare('INSERT INTO gbafacount(nom, prenom, username, password, question, reponse) VALUES(:firstName, :name, :userName, :pass, :question, :reponse)');
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
	$req = $db->prepare('SELECT password FROM gbafacount WHERE username= :username');
	$req->execute(array(
	'username'=> $userName));
	$resultat=$req->fetch();
	$isPasswordCorrect = password_verify($pass, $resultat['password']);
	return $isPasswordCorrect;
}

function getUserInfo($userName) {
	$db = dbConnect();
	$req = $db->prepare('SELECT id_user,nom,prenom,username,password,question,reponse
	FROM gbafacount WHERE username= :username');
	$req->execute(array(
	'username'=> $userName));
	$resultat=$req->fetch();
	return $resultat;
}

function userModify($id, $firstName, $name, $userName, $secretQuestion, $answer){
	$db=dbConnect();
	$req=$db->prepare('UPDATE gbafacount SET nom=:name, prenom=:firstName, username=:userName,
	question = :newQuestion, reponse = :reponse WHERE id_user = :userId');
	$req->execute(array(
	'name' => $name,
	'firstName'=> $firstName,
	'userName' => $userName,
	'newQuestion' => $secretQuestion,
	'reponse' => $answer,
	'userId'=>$id));
	$req->closeCursor();
}

function passModify($id, $newPass){
	$pass=password_hash($newPass, PASSWORD_DEFAULT);
	$db=dbConnect();
	$req=$db->prepare('UPDATE gbafacount SET password=:pass WHERE id_user=:userId');
	$req->execute(array(
	'userId'=>$id,
	'pass'=> $pass));
	$req->closeCursor();
}

function returnQuestion($userName){
	$db = dbConnect();
	$req = $db->prepare('SELECT question FROM gbafacount WHERE username= :username');
	$req->execute(array(
	'username'=> $userName));
	$resultat=$req->fetch();
	$question=$resultat['question'];
	return $question;
}

function getAnswer($userName){
	$db = dbConnect();
	$req = $db->prepare('SELECT reponse FROM gbafacount WHERE username= :username');
	$req->execute(array(
	'username'=> $userName));
	$answer=$req->fetch();
	$answer=$answer['reponse'];
	return $answer;
}

function userPassModify($userName, $newPass){
	$pass=password_hash($newPass, PASSWORD_DEFAULT);
	$db=dbConnect();
	$req=$db->prepare('UPDATE gbafacount SET password=:pass WHERE username=:userName');
	$req->execute(array(
	'userName'=>$userName,
	'pass'=> $pass));
	$req->closeCursor();
}