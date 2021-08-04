<?php
require ('dbConnect.php');

function getPartnersList(){
	$db=dbConnect();
	$data = $db->query('SELECT * FROM acteur');
	$partnersList=$data->fetchAll();
	return $partnersList;
}

