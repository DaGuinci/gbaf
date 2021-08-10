<?php
require ('./model/userModel.php');

function loginForm() {
	require('./view/headerView.php');
	require('./view/loginView.php');
}

function suscribe() {
	require('./view/suscribeView.php');
}

function suscribeReturn($firstName, $name, $userName, $pass,$passConfirm,
$secretQuestion, $answer) {
	if ($pass == $passConfirm) {
		$isUserNameDispo=verifUserName($userName);
		if ($isUserNameDispo==0) {
			addUser($firstName,$name,$userName,$pass,$secretQuestion,$answer);
			$title = 'Inscription';
			ob_start();?>
			<h1>Ok, compte créé</h1>
			<?php $content = ob_get_clean();
			require('./view/template.php');
		}
		else {
			echo "Nom d'utilisateur déjà utilisé, réessayez.";
		}
	}
	else {
		echo "Mots de passe différents, réessayez.";
	}
}

function getUserInfo() {
	
}
