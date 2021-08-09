<?php
require('./model/modelInfo.php');

function listPartners(){
	$partnersList=getPartnersList();
	require('./view/headerView.php');
	require('./view/partnersListView.php');
}
