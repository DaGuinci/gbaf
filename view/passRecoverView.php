<?php $title = 'Récupération de mot de passe'; ?>

<?php ob_start(); ?>


	<img src="./public/images/logoGbaf.png" alt="Logo du Gbaf" class="logoForm" />
	<h1>Reinitialisation de votre mot de passe</h1>
	<form action="./index.php?action=passRecover" method="post">
		<p>Nom d'utilisateur :</p>
		<input type="text" name="userName"/>
		<input class="button" type="submit" value="Valider" />
	</form>


<?php $content = ob_get_clean(); ?>

<?php require ('template.php'); ?>
