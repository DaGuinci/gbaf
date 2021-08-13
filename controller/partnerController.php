<?php
require('./model/partnerModel.php');

function listPartners(){
	$partnersList=getPartnersList();
	require('./view/partnersListView.php');
}

function partnerInfo($id) {
	$partner=getPartnerInfo($id);
	require('./view/partnerView.php');
}
