<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
	<div id=suscribeForm>
	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf">
	<h1>Formulaire d'inscription :</h1>
	<form action="./index.php?action=sendNewUser" method="post">
		<p>Nom :</p>
		<input type="text" name="firstName"/>
		<p>Prénom :</p>
		<input type="text" name="name"/>
		<p>Nom d'utilisateur :</p>
		<input type="text" name="userName"/>
		<p>Mot de passe :</p>
		<input type="password" name="pass"/>
		<p>Confirmation du mot de passe :</p>
		<input type="password" name="passConfirm"/>
		<p>Question secrète :</p>
		<input type="text" name="secretQuestion"/>
		<p>Réponse à la question secrète :</p>
		<input type="text" name="answer"/>
		<input class="button" type="submit" value="Valider" />
	</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>


