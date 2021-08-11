<?php
session_start();
require ('./model/userModel.php');

function login(){
	require('./view/headerView.php');
	require('./view/loginView.php');
}

function logUser($userName,$pass) {
	$checkPass=FALSE;
	$checkPass=keyHole($userName,$pass);
	if ($checkPass==TRUE) {
		$user=getUserInfo($userName);
		$_SESSION['id']=$user['id_user'];
		$_SESSION['userName']=$user['username'];
		$_SESSION['firstName']=$user['nom'];
		$_SESSION['name']=$user['prenom'];
		listPartners();
	}
	
	else {
		ob_start(); ?>
		<div id="message">Couple identifiant / mot de passe incorrect;
			<a href="./index.php?action=login" class="retryButton" >Se connecter</a>
		</div>
		<?php $content = ob_get_clean();
		require('./view/template.php');
	}
}

function suscribe() {
	require('./view/suscribeView.php');
}

function suscribeProcess($firstName, $name, $userName, $pass,$passConfirm,
$secretQuestion, $answer) {
	if ($pass == $passConfirm) {
		$isUserNameDispo=verifUserName($userName);
		if ($isUserNameDispo==0) {
			addUser($firstName,$name,$userName,$pass,$secretQuestion,$answer);
			$title = 'Inscription';
			ob_start();?>
			<div id="message">Votre compte a bien été créé
			<a href="./index.php?action=login" class="retryButton" >Se connecter</a>
			</div>
			<?php $content = ob_get_clean();
			require('./view/template.php');
		}
		else {
			ob_start(); ?>
		<div id="message">
		Nom d'utilisateur non disponible
 		<a href="./index.php?action=suscribe" class="retryButton" >Réessayer</a>
 		</div>
		<?php $content = ob_get_clean();
		require('./view/template.php');
		}
	}
	else {
		ob_start(); ?>
	<div id="message">Mots de passe différents
	<a href="./index.php?action=suscribe" class="retryButton" >Réessayer</a>
	</div>
	<?php $content = ob_get_clean();
	require('./view/template.php');
	}
}