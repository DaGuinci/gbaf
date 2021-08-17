<?php $title = 'Modification du compte';?>

<?php ob_start(); ?>
	<div id="suscribeForm">
	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf">
	<h1>Modifier les informations de votre compte :</h1>
	<form action="./index.php?action=sendModif" method="post">
		<p>Nom :</p>
		<input type="text" name="name" value="<?= $user['nom'] ?>" required />
		<p>Prénom :</p>
		<input type="text" name="firstName" value="<?= $user['prenom'] ?>" required />
		<p>Nom d'utilisateur :</p>
		<input type="text" name="userName" value="<?= $user['username'] ?>"required />
		<p>Question secrète :</p>
		<input type="text" name="secretQuestion" value="<?= $user['question'] ?>"required />
		<p>Réponse à la question secrète :</p>
		<input type="text" name="answer" value="<?= $user['reponse'] ?>"required />
		<p>Modification du mot de passe<em>(optionnel) :</em></p>
		<input type="password" name="newPass"/>
		<p>Confirmation du nouveau mot de passe :</p>
		<input type="password" name="newPassConfirm"/>
		<p>Mot de passe <strong>(obligatoire) :</strong></p>
		<input type="password" name="pass" required />
		<input class="button" type="submit" value="Valider" />
	</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('headerView.php');
require ('template.php'); ?>

