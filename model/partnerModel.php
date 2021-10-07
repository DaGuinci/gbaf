<?php
require ('dbConnect.php');

function getPartnersList(){
	$db=dbConnect();
	$request=<<<END
	SELECT
		a.*,
		CONCAT(LEFT(a.description,85),' (...)') AS shortDescription
	FROM
		gbafacteur a
END;
	
	$data = $db->query($request);
	$partnersList=$data->fetchAll();
	return $partnersList;
}

function getPartnerInfo($id){
	$db=dbConnect();
	$data = $db->prepare('SELECT * FROM gbafacteur WHERE id_acteur=:id');
	$data->execute(array(
	'id'=>$id));
	$partnerInfo=$data->fetch();
	$data->closeCursor();
	return $partnerInfo;
}

function getComments($partnerId){
	$db=dbConnect();
	$data=$db->prepare('SELECT
    gbafpost.*,DATE_FORMAT(date_add, "%d/%m/%Y") AS date_add,
    gbafacount.prenom
	FROM
    gbafpost
    INNER JOIN gbafacount ON gbafacount.id_user=gbafpost.id_user
    WHERE id_acteur=:id');
	$data->execute(array(
	'id'=>$partnerId));
	$comments=$data->fetchAll();
	return $comments;
}

function createComment($userId, $partnerId, $comment){
	$db=dbConnect();
	$req=$db->prepare('INSERT INTO gbafpost(id_user, id_acteur, date_add, post) VALUES(:userId, :partnerId, CURDATE(), :post)');
	$req->execute(array(
	'userId'=> $userId,
	'partnerId' => $partnerId,
	'post' => $comment));
	$req->closeCursor();
}

function createVote($userId,$partnerId,$vote){
	$db=dbConnect();
	$req=$db->prepare('INSERT INTO gbafvote(id_user, id_acteur,vote) VALUES(:userId, :partnerId, :vote)');
	$req->execute(array(
	'userId'=> $userId,
	'partnerId' => $partnerId,
	'vote' => $vote));
	$req->closeCursor();
}

function votesCount($partnerId,$vote){
	$db=dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbr FROM gbafvote WHERE id_acteur = :partnerId AND vote=:vote');
	$req->execute(array(
	'partnerId'=>$partnerId,
	'vote'=>$vote));
	$reponse=$req->fetch();
	return $reponse['nbr'];
}

function commented($partnerId,$userId){
	$db=dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbr FROM gbafpost WHERE id_acteur = :partnerId AND id_user=:userId');
	$req->execute(array(
	'partnerId'=>$partnerId,
	'userId'=>$userId));
	$reponse=$req->fetch();
	return $reponse['nbr'];
}

function voted($partnerId,$userId){
	$db=dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbr FROM gbafvote WHERE id_acteur = :partnerId AND id_user=:userId');
	$req->execute(array(
	'partnerId'=>$partnerId,
	'userId'=>$userId));
	$reponse=$req->fetch();
	return $reponse['nbr'];
}

