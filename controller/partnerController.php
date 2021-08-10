<?php
require('./model/partnerModel.php');

function listPartners(){
	$partnersList=getPartnersList();
	require('./view/headerView.php');
	require('./view/partnersListView.php');
}
