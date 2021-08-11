<?php
session_start();
require('/var/www/html/public/gbaf/controller/partnerController.php');
require('controller/userController.php');

switch ($_GET['action']) {
	case 'listPartners':
		listPartners();
		break;
		
	case 'login':
		login();
		break;
	
	case 'logUser':
		logUser($_POST['userName'],$_POST['pass']);
		break;
		
	case 'logOut':
		session_destroy();
		login();
		break;
		
	case 'suscribe':
		suscribe();
		break;
	
	case 'sendNewUser':
		suscribeProcess($_POST['firstName'],$_POST['name'],$_POST['userName'],
		$_POST['pass'],$_POST['passConfirm'],$_POST['secretQuestion'],$_POST['answer']);
		break;

	default:
		if (isset($_SESSION['id']) AND isset($_SESSION['userName'])) {
			listPartners();
		}
		else {
			login();
		}
		break;
}
