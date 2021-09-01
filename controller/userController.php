<?php
session_start();
include_once ('./model/userModel.php');

function loginPage(){
	if ($_COOKIE['status']==1){
		logWithCookie();
		listPartners();
	}
	
	else{
		require('./view/headerView.php');
		require('./view/loginView.php');}
}

function logUser($userName,$pass,$stayLogged) {
	$checkPass=FALSE;
	$checkPass=keyHole($userName,$pass);
	if ($checkPass==TRUE) {
		$user=getUserInfo($userName);
		$_SESSION['id']=$user['id_user'];
		$_SESSION['userName']=$user['username'];
		$_SESSION['firstName']=$user['prenom'];
		$_SESSION['name']=$user['nom'];
		$_SESSION['question']=$user['question'];
		$_SESSION['answer']=$user['reponse'];
		$_SESSION['isConnected']=TRUE;
		
		if ($stayLogged=="checked"){
			$userHashed=hash('sha256', $userName);
			$isConnected=TRUE;
			createCookie($userHashed,$isConnected);}
	}
	
	else {
		ob_start(); ?>
		<div class="message">
		<p>Couple identifiant / mot de passe incorrect</p>
			<a href="./index.php?action=loginPage" class="button" >Réessayer</a>
		</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function logWithCookie() {
	$userName=getCookieName($_COOKIE['user']);
	$user=getUserInfo($userName);
		$_SESSION['id']=$user['id_user'];
		$_SESSION['userName']=$user['username'];
		$_SESSION['firstName']=$user['prenom'];
		$_SESSION['name']=$user['nom'];
		$_SESSION['question']=$user['question'];
		$_SESSION['answer']=$user['reponse'];
		$_SESSION['isConnected']=TRUE;
}

function logUserOut() {
	session_destroy();
	$_COOKIE=array();
	$emptyName='';
	$isConnected=FALSE;
	createCookie($emptyName,$isConnected);
	require('./view/headerView.php');
	require('./view/logOutView.php');
}

function subscribe() {
	require('./view/headerView.php');
	require('./view/subscribeView.php');
}

function subscribeProcess($firstName, $name, $userName, $pass,$passConfirm,
$secretQuestion, $answer) {
	if ($pass == $passConfirm) {
		$isUserNameDispo=verifUserName($userName);
		if ($isUserNameDispo==0) {
			addUser($firstName,$name,$userName,$pass,$secretQuestion,$answer);
			$title = 'Inscription';
			logUser($userName,$pass,'');
			ob_start();?>
			<div class="message"><p>Votre compte a bien été créé</p>
			<a href="./index.php" class="button" >Accueil</a>
			</div>
			<?php $content = ob_get_clean();
			require('./view/headerView.php');
			require('./view/template.php');
		}
		else {
			ob_start(); ?>
		<div class="message">
		<p>Nom d'utilisateur non disponible</p>
 		<a href="./index.php?action=subscribe" class="button" >Réessayer</a>
 		</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
		}
	}
	else {
		ob_start(); ?>
	<div class="message"><p>Mots de passe différents</p>
	<a href="./index.php?action=subscribe" class="button" >Réessayer</a>
	</div>
	<?php $content = ob_get_clean();
	require('./view/headerView.php');
	require('./view/template.php');
	}
}

function userModifyForm(){
	$user=getUserInfo($_SESSION['userName']);
	require('./view/headerView.php');
	require('./view/userModifyView.php');
}

function modifyProcess($id,$firstName,$name,$userName,$secretQuestion,$answer,
$newPass,$newPassConfirm,$pass){
	$checkPass=FALSE;
	$checkPass=keyHole($_SESSION['userName'],$pass);
	if ($checkPass==TRUE) {
		if (!empty($newPass)AND($newPass==$newPassConfirm)) {
			userModify($id,$firstName,$name,$userName,
			$secretQuestion,$answer);
			passModify($id,$newPass);
			logUser($userName,$newPass,'');
			ob_start(); ?>
				<div class="message"><p>Votre compte a été mis à jour</p>
				<a href="./index.php" class="button" >Retour à l'accueil</a></div>
				<?php $content = ob_get_clean();
				require('./view/headerView.php');
				require('./view/template.php');
			}
		elseif (!empty($newPass)AND($newPass!=$newPassConfirm)) {
			ob_start(); ?>
				<div class="message"><p>Nouveaux mots de passe différents</p>
				<a href="./index.php?action=userModifyForm" class="button" >
				Réessayer</a>
				</div>
			<?php $content = ob_get_clean();
			require('./view/headerView.php');
			require('./view/template.php');
		}
		else{
		userModify($id,$firstName,$name,$userName,$secretQuestion,$answer);
		logUser($userName,$pass,'');
		ob_start(); ?>
		<div class="message"><p>Votre compte a été mis à jour</p>
		<a href="./index.php" class="button" >Retour à l'accueil</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
		}
	}
	
	else {
	ob_start(); ?>
		<div class="message"><p>Mot de passe incorrect</p>
		<a href="./index.php?action=userModifyForm" class="button" >Réessayer</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function passRecoverForm(){
	require('./view/headerView.php');
	require('./view/passRecoverView.php');
}

function passQuestion($userName){
	$question=returnQuestion($userName);
	if(!empty($question)){
	require('./view/headerView.php');
	require('./view/passQuestionView.php');}
	else{
		ob_start(); ?>
		<div class="message"><p>Identifiant inconnu</p>
		<a href="./index.php?action=forgotPass" class="button" >Réessayer</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function answerVerif($userName, $userAnswer){
	$answer=getAnswer($userName);
	if ($answer==$userAnswer){passInit($userName);}
	else {
	ob_start(); ?>
		<div class="message"><p>Réponse incorrecte</p>
		<a href="./index.php?action=passRecover" class="button" >Réessayer</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function passInit($userName){
	require('./view/headerView.php');
	require('./view/passInitFormView.php');
}

function passInitProcess($userName,$pass,$passConfirm){
	if($pass==$passConfirm){
	userPassModify($userName,$pass);
	ob_start(); ?>
		<div class="message"><p>Votre compte a été mis à jour</p>
		<a href="./index.php" class="button" >Retour à l'accueil</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');}
	else{
		ob_start(); ?>
		<div class="message"><p>Mots de passe différents</p>
		<a href="./index.php?action=passInit" class="button" >Réessayer</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function termsConditions(){
	require('./view/headerView.php');
	require('./view/termsConditionsView.php');
}

function contactPage(){
	require('./view/headerView.php');
	require('./view/contactView.php');
}