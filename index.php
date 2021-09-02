<?php
//session_start();
require('controller/partnerController.php');
require('controller/userController.php');

switch ($_GET['action']) {
	case 'listPartners':
		if ($_SESSION['isConnected']==TRUE AND !empty($_SESSION['id'])) {
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
		logUserOut();
		break;

	case 'subscribe':
		subscribe();
		break;

	case 'sendNewUser':
		subscribeProcess($_POST['firstName'],$_POST['name'],$_POST['userName'],
		$_POST['pass'],$_POST['passConfirm'],$_POST['secretQuestion'],$_POST['answer']);
		break;
		
	case 'forgotPass':
		passRecoverForm();
		break;
	
	case 'passRecover':
		passQuestion($_POST['userName']);
		break;
	
	case 'passAnswer':
		answerVerif($_POST['userName'],$_POST['answer']);
		break;
		
	case 'sendPassInit':
		passInitProcess($_POST['userName'],$_POST['pass'],$_POST['passConfirm']);
		break;
		
	case 'partnerPage':
		partnerInfo($_GET['id']);
		break;
	
	case 'comment':
		commentForm($_GET['id']);
		break;
	
	case 'sendNewComment':
		if (!isset($_POST['vote'])){
			addCommentOnly($_POST['partnerId'],$_POST['comment']);
		}
		
		else{
		addNewComment($_POST['partnerId'],$_POST['vote'],$_POST['comment']);
		}
		break;

	case 'vote':
		addVote($_GET['partnerId'],$_SESSION['id'],$_GET['vote']);
		break;
	
	case 'termsConditions':
		termsConditions();
		break;
		
	case 'contact':
		contactPage();
		break;
	
	default:
		if ($_SESSION['isConnected']==TRUE){
			listPartners();
		}
		else {
			loginPage();
		}
		break;
}

