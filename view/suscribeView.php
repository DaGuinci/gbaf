<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
	<div id="suscribeForm">
	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf">
	<h1>Formulaire d'inscription :</h1>
	<form action="./index.php?action=sendNewUser" method="post">
		<p>Nom :</p>
		<input type="text" name="firstName" required />
		<p>Prénom :</p>
		<input type="text" name="name" required />
		<p>Nom d'utilisateur :</p>
		<input type="text" name="userName" required />
		<p>Mot de passe :</p>
		<input type="password" name="pass" required />
		<p>Confirmation du mot de passe :</p>
		<input type="password" name="passConfirm" required />
		<p>Question secrète :</p>
		<input type="text" name="secretQuestion" required />
		<p>Réponse à la question secrète :</p>
		<input type="text" name="answer" required />
		<input class="button" type="submit" value="Valider" />
	</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('headerView.php');
require ('template.php'); ?>


