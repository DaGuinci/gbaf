<?php
require('./model/modelInfo.php');

function listPartners(){
	$partnersList=getPartnersList();
	require('./view/partnersListView.php');
}
$partnersList=getPartnersList();
//print_r($partnersList);
