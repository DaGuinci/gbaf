<?php
require('/var/www/html/public/gbaf/controller/partnerController.php');
require('controller/userController.php');

switch ($_GET['action']) {
	case 'listPartners':
		listPartners();
		break;
		
	case 'loginForm':
		loginForm();
		break;
		
	case 'suscribe':
		suscribe();
		break;
	
	case 'sendNewUser':
		if (isset($_POST['firstName'],$_POST['name'],$_POST['userName'],
		$_POST['pass'],$_POST['passConfirm'],$_POST['secretQuestion'],$_POST['answer'])){
			suscribeReturn($_POST['firstName'],$_POST['name'],$_POST['userName'],
			$_POST['pass'],$_POST['passConfirm'],$_POST['secretQuestion'],$_POST['answer']);
		}
		else {
			echo "le formulaire contient des errurs, réessayez.";
			suscribe();
		}
		break;

	default:
		suscribe();
		break;
}