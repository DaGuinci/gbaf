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
	return $partnerInfo;
}