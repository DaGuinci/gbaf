<?php
require ('dbConnect.php');

function getPartnersList(){
	$db=dbConnect();
	$data = $db->query('SELECT * FROM acteur');
	$partnersList=$data->fetchAll();
	foreach ($partnersList as $partner) {
		$firstLine=cutFirstLine($partner['description'],85);
		$partner['firstLine']=$firstLine;
		$newList[]=$partner;
		}
	return $newList;
}

function cutFirstLine($text, $max){
	if (strlen($text)>=$max) {
		$max=strpos($text,' ',90);
		$firstLine=substr($text,0,$max);
	}
	$firstLine .= ' (...)';
	return $firstLine;
}

function getPartnerInfo($id){
	$db=dbConnect();
	$data = $db->prepare('SELECT * FROM acteur WHERE id_acteur=:id');
	$data->execute(array(
	'id'=>$id));
	$partnerInfo=$data->fetch();
	$data->closeCursor();
	return $partnerInfo;
}

function getComments($partnerId){
	$db=dbConnect();
	$data=$db->prepare('SELECT
    post.*,DATE_FORMAT(date_add, "%d/%m/%Y") AS date_add,
    acount.prenom
	FROM
    post
    INNER JOIN acount ON acount.id_user=post.id_user
    WHERE id_acteur=:id');
	$data->execute(array(
	'id'=>$partnerId));
	$comments=$data->fetchAll();
	return $comments;
	/*
	$data=$db->prepare('SELECT *, DATE_FORMAT(date_add, "%d/%m/%Y") AS date_add FROM post WHERE id_acteur=:id');
	$data->execute(array(
	'id'=>$partnerId));
	$comments=$data->fetchAll(PDO::FETCH_ASSOC);
	foreach ($comments as $comment) {
		$getAuthor=$db->prepare('SELECT username FROM acount WHERE id_user=:user');
		$getAuthor->execute(array('user'=>$comment['id_user']));
		$author=$getAuthor->fetch(PDO::FETCH_ASSOC);
		$author=$author['username'];
		$comment['author']=$author;
		$commentsList[]=$comment;
	}
		echo "<pre>";
		var_dump($comments);
		echo "</pre>";
	$data->closeCursor();
	return $commentsList;*/
}

function createComment($userId, $partnerId, $comment){
	$db=dbConnect();
	$req=$db->prepare('INSERT INTO post(id_user, id_acteur, date_add, post) VALUES(:userId, :partnerId, CURDATE(), :post)');
	$req->execute(array(
	'userId'=> $userId,
	'partnerId' => $partnerId,
	'post' => $comment));
	$req->closeCursor();
}

function createVote($userId,$partnerId,$vote){
	$db=dbConnect();
	$req=$db->prepare('INSERT INTO vote(id_user, id_acteur,vote) VALUES(:userId, :partnerId, :vote)');
	$req->execute(array(
	'userId'=> $userId,
	'partnerId' => $partnerId,
	'vote' => $vote));
	$req->closeCursor();
}

function votesCount($partnerId,$vote){
	$db=dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbr FROM vote WHERE id_acteur = :partnerId AND vote=:vote');
	$req->execute(array(
	'partnerId'=>$partnerId,
	'vote'=>$vote));
	$reponse=$req->fetch();
	return $reponse['nbr'];
}

function commented($partnerId,$userId){
	$db=dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbr FROM post WHERE id_acteur = :partnerId AND id_user=:userId');
	$req->execute(array(
	'partnerId'=>$partnerId,
	'userId'=>$userId));
	$reponse=$req->fetch();
	return $reponse['nbr'];
}

function voted($partnerId,$userId){
	$db=dbConnect();
	$req = $db->prepare('SELECT COUNT(*) AS nbr FROM vote WHERE id_acteur = :partnerId AND id_user=:userId');
	$req->execute(array(
	'partnerId'=>$partnerId,
	'userId'=>$userId));
	$reponse=$req->fetch();
	return $reponse['nbr'];
}

