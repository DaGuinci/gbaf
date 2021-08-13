<?php $title = 'Récupération de mot de passe'; ?>

<?php ob_start(); ?>

	<div class="connectForm">
	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf">
	<h1>Reinitialisation de votre mot de passe</h1>
	<form action="./index.php?action=sendPassInit" method="post">
		<input type="hidden" name="userName" value="<?=$userName?>"/>
		<p>Mot de passe :</p>
		<input type="password" name="pass" required />
		<p>Confirmation du mot de passe :</p>
		<input type="password" name="passConfirm" required />
		<input id="connectButton" type="submit" value="Valider" />
	</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
