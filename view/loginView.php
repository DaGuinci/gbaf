<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

	<div id=connectForm>
	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf">
	<h1>Se connecter</h1>
	<form action="./controller/userController.php" method="post">
		<p>Nom d'utilisateur :</p>
		<input type="text" name="userName"/>
		<p>Mot de passe :</p>
		<input type="password" name="pass"/>
		<input class="button" type="submit" value="Valider" />
	</form>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
