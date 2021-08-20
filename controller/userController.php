<?php
session_start();
require ('./model/userModel.php');

function loginPage(){
	require('./view/headerView.php');
	require('./view/loginView.php');
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
		
		if ($stayLogged=="checked"){
			createCookie($userName,$pass);}
	}
	
	else {
		ob_start(); ?>
		<div id="message">Couple identifiant / mot de passe incorrect;
			<a href="./index.php?action=login" class="retryButton" >Réessayer</a>
		</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function subscribe() {
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
			<div id="message">Votre compte a bien été créé
			<a href="./index.php" class="retryButton" >Accueil</a>
			</div>
			<?php $content = ob_get_clean();
			require('./view/headerView.php');
			require('./view/template.php');
		}
		else {
			ob_start(); ?>
		<div id="message">
		Nom d'utilisateur non disponible
 		<a href="./index.php?action=subscribe" class="retryButton" >Réessayer</a>
 		</div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
		}
	}
	else {
		ob_start(); ?>
	<div id="message">Mots de passe différents
	<a href="./index.php?action=subscribe" class="retryButton" >Réessayer</a>
	</div>
	<?php $content = ob_get_clean();
	require('./view/headerView.php');
	require('./view/template.php');
	}
}

function userModifyForm(){
	$user=getUserInfo($_SESSION['userName']);
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
				<div id="message">Votre compte a été mis à jour
				<a href="./index.php" class="retryButton" >Retour à l'accueil</a></div>
				<?php $content = ob_get_clean();
				require('./view/headerView.php');
				require('./view/template.php');
			}
		elseif (!empty($newPass)AND($newPass!=$newPassConfirm)) {
			ob_start(); ?>
				<div id="message">Nouveaux mots de passe différents
				<a href="./index.php?action=userModifyForm" class="retryButton" >
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
		<div id="message">Votre compte a été mis à jour
		<a href="./index.php" class="retryButton" >Retour à l'accueil</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
		}
	}
	
	else {
	ob_start(); ?>
		<div id="message">Mot de passe incorrect
		<a href="./index.php?action=userModifyForm" class="retryButton" >Réessayer</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function passRecoverForm(){
	require('./view/passRecoverView.php');
}

function passQuestion($userName){
	$question=returnQuestion($userName);
	if(!empty($question)){
	require('./view/passQuestionView.php');}
	else{
		ob_start(); ?>
		<div id="message">Identifiant inconnu
		<a href="./index.php?action=forgotPass" class="retryButton" >Réessayer</a></div>
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
		<div id="message">Réponse incorrecte
		<a href="./index.php?action=passRecover" class="retryButton" >Réessayer</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}

function passInit($userName){
	require('./view/passInitFormView.php');
}

function passInitProcess($userName,$pass,$passConfirm){
	if($pass==$passConfirm){
	userPassModify($userName,$pass);
	ob_start(); ?>
		<div id="message">Votre compte a été mis à jour
		<a href="./index.php" class="retryButton" >Retour à l'accueil</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');}
	else{
		ob_start(); ?>
		<div id="message">Mots de passe différents
		<a href="./index.php?action=passInit" class="retryButton" >Réessayer</a></div>
		<?php $content = ob_get_clean();
		require('./view/headerView.php');
		require('./view/template.php');
	}
}