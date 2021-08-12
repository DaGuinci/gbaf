<?php
session_start();
require('/var/www/html/public/gbaf/controller/partnerController.php');
require('controller/userController.php');
//print_r($_SESSION['id']);

switch ($_GET['action']) {
	case 'listPartners':
	if (isset($_SESSION['id'])) {
		listPartners();}
	else {loginPage();}
		break;

	case 'login':
		loginPage();
		break;

	case 'logUser':
		logUser($_POST['userName'],$_POST['pass']);
		if (isset($_SESSION['id'])) {
			listPartners();}
		break;

	case 'userModifyForm':
		userModifyForm();
		break;

	case 'sendModif':
		modifyProcess($_SESSION['id'],$_POST['firstName'],$_POST['name'],
		$_POST['userName'],$_POST['secretQuestion'],$_POST['answer'],$_POST['newPass'],
		$_POST['newPassConfirm'],$_POST['pass']);
		break;

	case 'logOut':
		$_SESSION=array();
		loginPage();
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
			loginPage();
		}
		break;
}