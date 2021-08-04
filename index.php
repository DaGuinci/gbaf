<?php
require('/var/www/html/public/gbaf/controller/controllerInfo.php');
//require('controller/controllerUser.php');

switch ($_GET['action']) {
	case 'listPartners':
		listPartners();
		break;

	default:
		listPartners();
		break;
}