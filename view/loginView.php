<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

	<div class="connectForm">
	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf">
	<h1>Se connecter</h1>
	<form action="./index.php?action=logUser" method="post">
		<p>Nom d'utilisateur :</p>
		<input type="text" name="userName"/>
		<p>Mot de passe :</p>
		<input type="password" name="pass"/>
		<input id="connectButton" type="submit" value="Valider" />
	</form>
	<em>Pas encore membre ?</em>
	<a href="./index.php?action=suscribe">Cliquez ici pour vous inscrire.</a>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
